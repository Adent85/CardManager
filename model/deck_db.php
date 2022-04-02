<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of deck_db
 *
 * @author Kyle Fisk 
 */
class deck_db {
    
    public static function getAllDeckTypes() {
        $db = Database::getDB();
        $query_deck_type = 'SELECT * FROM deck_type
                           WHERE active = 1';
        try{
            $statement = $db->prepare($query_deck_type);
            $statement->execute();

            $deck_types = array();

            foreach ($statement as $row) {
                $deck_type = new deck_type($row['ID'],$row['name']);

                $deck_types[] = $deck_type; 
            }
            return $deck_types;    
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function createNewDeck($deck){
        $db = Database::getDB();
        $query_deck_insert = 'INSERT INTO deck
                              (userID, name, description, deckImage, deckTypeID)
                              VALUES
                              (:userID, :name, :description, :deckImage, :deckTypeID)';
        try{
            $statement = $db->prepare($query_deck_insert);
            $statement->bindValue(':userID', $deck->getUserID());
            $statement->bindValue(':name', $deck->getName());
            $statement->bindValue(':description', $deck->getDescription());
            $statement->bindValue(':deckImage', $deck->getDeckImage());
            $statement->bindValue(':deckTypeID', $deck->getDeckTypeID());
            $statement->execute();
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function getUserDecks($userId) {
        $db = Database::getDB();
        $query_get_decks = 'SELECT * FROM deck
                            WHERE userID = :userID
                            AND active = true';
        try{
            $statement = $db->prepare($query_get_decks);
            $statement->bindValue(':userID', $userId);
            $statement->execute();

            $user_decks = array();

            foreach ($statement as $row) {
                $user_deck = new deck($row['userID'],
                                      $row['name'],
                                      $row['description'],
                                      $row['deckImage'],
                                      $row['deckTypeID'],
                                      $row['totalCards'],
                                      $row['active']);
                $user_deck->setID($row['ID']);

                $user_decks[]=$user_deck;
            }
            return $user_decks;
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }

    public static function getDeck($deckID) {
        $db = Database::getDB();
        $query_get_deck = 'SELECT * FROM deck
                           WHERE ID = :deckID';
        try{
            $statement = $db->prepare($query_get_deck);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
            $row = $statement->fetch();

            $deck = new Deck($row['userID'],
                             $row['name'],
                             $row['description'],
                             $row['deckImage'],
                             $row['deckTypeID'],
                             $row['totalCards'],
                             $row['active']);
            $deck->setID($row['ID']);

            return $deck;
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function deleteDeckFromDeckCardTable($deckID){
        $db = Database::getDB();
        $query_delete_deck = 'DELETE FROM deck_card
                              WHERE deckID = :deckID';
        try{
            $statement = $db->prepare($query_delete_deck);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function deleteCardFromDeckCardTable($cardID){
        $db = Database::getDB();
        $query_delete_deck = 'DELETE FROM deck_card
                              WHERE cardID = :cardID';
        try{
            $statement = $db->prepare($query_delete_deck);
            $statement->bindValue(':cardID', $cardID);
            $statement->execute();
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function deleteDeck($deckID){
        $db = Database::getDB();
        $query_delete_deck = 'DELETE FROM deck
                              WHERE ID = :deckID';
        try{
            $statement = $db->prepare($query_delete_deck);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function updateDeck($deck){
        $db = Database::getDB();
        $query = 'UPDATE deck
                  SET name = :name,
                      description = :description,
                      dateUpdated = :dateUpdated,
                  WHERE ID = :deckID';
        try{
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $deck->getName());
            $statement->bindValue(':description', $deck->getDescription());
            $statement->bindValue(':dateUpdated', new DateTime());
            $statement->bindValue(':deckID', $deck->getID());
            $statement->execute();
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function getCardsByDeckType($deckTypeID) {
        $db = Database::getDB();
        $query_get_cards = 'SELECT * FROM card
                           WHERE deckTypeID = :deckTypeID';
        try{
            $statement = $db->prepare($query_get_cards);
            $statement->bindValue(':deckTypeID', $deckTypeID);
            $statement->execute();

            $cards = array();

            foreach ($statement as $row) {
                $card = new card($row['ID'],
                                 $row['name'],
                                 $row['description'],
                                 $row['deckTypeID'],
                                 $row['attributeID'],
                                 $row['attributeID2'],
                                 $row['attributeID3'],
                                 $row['attributeID4'],
                                 $row['attributeID5'],
                                 $row['cardPicture'],
                                 $row['active']);

                $cards[]=$card;
            }

            return $cards;
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    
    public static function getCardByCardId($cardID){
        $db = Database::getDB();
        $query_get_card = 'SELECT * FROM card
                           WHERE ID = :cardID';
        try{
            $statement = $db->prepare($query_get_card);
            $statement->bindValue(':cardID', $cardID);
            $statement->execute();


            foreach ($statement as $row) {
                $card = new card($row['ID'],
                                      $row['name'],
                                      $row['description'],
                                      $row['deckTypeID'],
                                      $row['attributeID'],
                                      $row['attributeID2'],
                                      $row['attributeID3'],
                                      $row['attributeID4'],
                                      $row['attributeID5'],
                                      $row['cardPicture'],
                                      $row['active']);
            }
            return $card;
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
    public static function addCardToDeck($deckID,$cardID){
        $db = Database::getDB();
        $query_add_cards = 'INSERT into deck_card
                            (cardID, deckID)
                            VALUES
                            (:cardID,:deckID)';
        try{
            $statement = $db->prepare($query_add_cards);
            $statement->bindValue(':cardID', $cardID);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
       
    public static function getCardsInDeck($deckID){
        $db = Database::getDB();
        $query_get_cards = 'SELECT c.ID, c.name, c.description, c.deckTypeID, 
                            c.attributeID, c.attributeID2,c.attributeID3,
                            c.attributeID4,c.attributeID5, cardPicture, active 
                            FROM deck_card dc
                            JOIN card c 
                            ON c.ID = dc.cardID
                            WHERE dc.deckID = :deckID
                            AND c.active = 1';
        try{
            $statement = $db->prepare($query_get_cards);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();

            $cards = array();

            foreach ($statement as $row) {
                $cards[] = new card($row['ID'],
                                      $row['name'],
                                      $row['description'],
                                      $row['deckTypeID'],
                                      $row['attributeID'],
                                      $row['attributeID2'],
                                      $row['attributeID3'],
                                      $row['attributeID4'],
                                      $row['attributeID5'],
                                      $row['cardPicture'],
                                      $row['active']);
            }
            return $cards;
        }catch (PDOException $e) {
            display_db_error($e->getMessage);
        }
    }
}
