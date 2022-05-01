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
        $query_deck_type = 'SELECT ID, name FROM deck_type
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
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function createNewDeck($deck){
        $db = Database::getDB();
        $query_deck_insert = 'INSERT INTO deck
                              (userID, name, description, deckTypeID)
                              VALUES
                              (:userID, :name, :description, :deckTypeID)';
        try{
            $statement = $db->prepare($query_deck_insert);
            $statement->bindValue(':userID', $deck->getUserID());
            $statement->bindValue(':name', $deck->getName());
            $statement->bindValue(':description', $deck->getDescription());
            $statement->bindValue(':deckTypeID', $deck->getDeckTypeID());
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function getUserDecks($userId) {
        $db = Database::getDB();
        $query_get_decks = 'SELECT ID, userID, name, description,
                            deckTypeID, active
                            FROM deck
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
                                      $row['deckTypeID'],
                                      $row['active']);
                $user_deck->setID($row['ID']);

                $user_decks[]=$user_deck;
            }
            return $user_decks;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }

    public static function getDeck($deckID) {
        $db = Database::getDB();
        $query_get_deck = 'SELECT ID, userID, name, description,
                           deckTypeID, active
                           FROM deck
                           WHERE ID = :deckID';
        try{
            $statement = $db->prepare($query_get_deck);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
            $row = $statement->fetch();

            $deck = new Deck($row['userID'],
                             $row['name'],
                             $row['description'],
                             $row['deckTypeID'],
                             $row['active']);
            $deck->setID($row['ID']);

            return $deck;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
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
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function deleteCardFromDeckCardTable($cardID, $deckID){
        $db = Database::getDB();
        $query_delete_deck = 'DELETE FROM deck_card
                              WHERE cardID = :cardID
                              AND deckID = :deckID';
        try{
            $statement = $db->prepare($query_delete_deck);
            $statement->bindValue(':cardID', $cardID);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
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
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function updateDeck($deckID, $deckName, $deckDescription){
        $db = Database::getDB();
        $query = 'UPDATE deck
                  SET name = :name,
                      description = :description
                  WHERE ID = :deckID';
        try{
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $deckName);
            $statement->bindValue(':description', $deckDescription);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage(); 
            Database::display_db_error($error_message);
        }
    }
    
//    public static function getCardsByDeckType($deckTypeID) {
//        $db = Database::getDB();
//        $query_get_cards = 'SELECT c.ID AS cardID, c.name AS cardName, c.description AS cardDescription, 
//                            c.deckTypeID AS cardDeckTypeID, c.attributeID, ca1.name AS a1Name,
//                            ca1.description AS a1Description, ca1.value AS a1Value, c.attributeID2, ca2.name AS a2Name,
//                            ca2.description AS a2Description, ca2.value AS a2Value, c.attributeID3, ca3.name AS a3Name,
//                            ca3.description AS a3Description, ca3.value AS a3Value, c.attributeID4, ca4.name AS a4Name,
//                            ca4.description AS a4Description, ca4.value AS a4Value, c.attributeID5, ca5.name AS a5Name,
//                            ca5.description AS a5Description, ca5.value AS a5Value, c.cardPicture, c.active FROM card c
//                            LEFT JOIN card_attribute ca1 ON c.attributeID = ca1.ID
//                            LEFT JOIN card_attribute ca2 ON c.attributeID2 = ca2.ID
//                            LEFT JOIN card_attribute ca3 ON c.attributeID3 = ca3.ID
//                            LEFT JOIN card_attribute ca4 ON c.attributeID4 = ca4.ID
//                            LEFT JOIN card_attribute ca5 ON c.attributeID5 = ca5.ID 
//                            WHERE c.deckTypeID = :deckTypeID';
//        try{
//            $statement = $db->prepare($query_get_cards);
//            $statement->bindValue(':deckTypeID', $deckTypeID);
//            $statement->execute();
//
//            $cards = array();
//
//            foreach ($statement as $row) {
//                $card = new card($row['cardID'],
//                                 $row['cardName'],
//                                 $row['cardDescription'],
//                                 $row['cardDeckTypeID'],
//                                 $row['attributeID'],
//                                 $ca1 = new card_attribute($row['attributeID'],
//                                         $row['a1Name'], $row['a1Description'],$row['a1Value']),
//                                 $row['attributeID2'],
//                                 $ca2 = new card_attribute($row['attributeID2'],
//                                         $row['a2Name'], $row['a2Description'],$row['a2Value']),
//                                 $row['attributeID3'],
//                                 $ca3 = new card_attribute($row['attributeID3'],
//                                         $row['a3Name'], $row['a3Description'],$row['a3Value']),
//                                 $row['attributeID4'],
//                                 $ca4 = new card_attribute($row['attributeID4'],
//                                         $row['a4Name'], $row['a4Description'],$row['a4Value']),
//                                 $row['attributeID5'],
//                                 $ca5 = new card_attribute($row['attributeID5'],
//                                         $row['a5Name'], $row['a5Description'],$row['a5Value']),
//                                 $row['cardPicture'],
//                                 $row['active']);
//
//                $cards[]=$card;
//            }
//
//            return $cards;
//        }catch (PDOException $e) {
//            $error_message = $e->getMessage();
//            Database::display_db_error($error_message);
//        }
//    }
    
//    public static function getCardByCardId($cardID){
//        $db = Database::getDB();
//        $query_get_card =   'SELECT c.ID AS cardID, c.name AS cardName, c.description AS cardDescription, 
//                            c.deckTypeID AS cardDeckTypeID, c.attributeID, ca1.name AS a1Name,
//                            ca1.description AS a1Description, ca1.value AS a1Value, c.attributeID2, ca2.name AS a2Name,
//                            ca2.description AS a2Description, ca2.value AS a2Value, c.attributeID3, ca3.name AS a3Name,
//                            ca3.description AS a3Description, ca3.value AS a3Value, c.attributeID4, ca4.name AS a4Name,
//                            ca4.description AS a4Description, ca4.value AS a4Value, c.attributeID5, ca5.name AS a5Name,
//                            ca5.description AS a5Description, ca5.value AS a5Value, c.cardPicture, c.active FROM card c
//                            LEFT JOIN card_attribute ca1 ON c.attributeID = ca1.ID
//                            LEFT JOIN card_attribute ca2 ON c.attributeID2 = ca2.ID
//                            LEFT JOIN card_attribute ca3 ON c.attributeID3 = ca3.ID
//                            LEFT JOIN card_attribute ca4 ON c.attributeID4 = ca4.ID
//                            LEFT JOIN card_attribute ca5 ON c.attributeID5 = ca5.ID 
//                            WHERE c.ID = :cardID';
//
//                           
//        try{
//            $statement = $db->prepare($query_get_card);
//            $statement->bindValue(':cardID', $cardID);
//            $statement->execute();
//            $row = $statement->fetch();
//
//            $card = new card($row['cardID'],
//                                 $row['cardName'],
//                                 $row['cardDescription'],
//                                 $row['cardDeckTypeID'],
//                                 $row['attributeID'],
//                                 $ca1 = new card_attribute($row['attributeID'],
//                                         $row['a1Name'], $row['a1Description'],$row['a1Value']),
//                                 $row['attributeID2'],
//                                 $ca2 = new card_attribute($row['attributeID2'],
//                                         $row['a2Name'], $row['a2Description'],$row['a2Value']),
//                                 $row['attributeID3'],
//                                 $ca3 = new card_attribute($row['attributeID3'],
//                                         $row['a3Name'], $row['a3Description'],$row['a3Value']),
//                                 $row['attributeID4'],
//                                 $ca4 = new card_attribute($row['attributeID4'],
//                                         $row['a4Name'], $row['a4Description'],$row['a4Value']),
//                                 $row['attributeID5'],
//                                 $ca5 = new card_attribute($row['attributeID5'],
//                                         $row['a5Name'], $row['a5Description'],$row['a5Value']),
//                                 $row['cardPicture'],
//                                 $row['active']);
//            return $card;
//        }catch (PDOException $e) {
//            $error_message = $e->getMessage();
//            Database::display_db_error($error_message);
//        }
//    }
    
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
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
       
    public static function getCardsInDeck($deckID){
        $db = Database::getDB();
        $query_get_cards = 'SELECT cardID 
                            FROM deck_card
                            WHERE deckID = :deckID';
        try{
            $statement = $db->prepare($query_get_cards);
            $statement->bindValue(':deckID', $deckID);
            $statement->execute();

            $cards = array();

            foreach ($statement as $row) {
                $cards[] = card_db::getPokemonCardById($row['cardID']);
            }
            return $cards;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
}
