<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of trade_card_db
 *
 * @author Kyle Fisk 
 */
class trade_card_db {
    
    public static function createNewTrade($trade_request){
        if($trade_request->getTrade_initiator_card2() !=null){
            $db = Database::getDB();
            $query_trade_insert = 'INSERT INTO trade_card
                                  (initiator_id, recipient_id, recipient_card_id, recipient_deck_id, 
                                   initiator_card1_id, initiator_deck1_id, initiator_card2_id, initiator_deck2_id)
                                  VALUES
                                  (:initiator_id, :recipient_id, :recipient_card_id, :recipient_deck_id,
                                   :initiator_card1_id, :initiator_deck1_id, :initiator_card2_id, :initiator_deck2_id)';
            try{
                $statement = $db->prepare($query_trade_insert);
                $statement->bindValue(':initiator_id', $trade_request->getTrade_initiator_id());
                $statement->bindValue(':recipient_id', $trade_request->getTrade_recipient_deck()->getUserID());
                $statement->bindValue(':recipient_card_id', $trade_request->getTrade_recipient_card()->getId());
                $statement->bindValue(':recipient_deck_id', $trade_request->getTrade_recipient_deck()->getId());
                $statement->bindValue(':initiator_card1_id', $trade_request->getTrade_initiator_card1()->getId());
                $statement->bindValue(':initiator_deck1_id', $trade_request->getTrade_initiator_deck1()->getId());
                $statement->bindValue(':initiator_card2_id', $trade_request->getTrade_initiator_card2()->getId());
                $statement->bindValue(':initiator_deck2_id', $trade_request->getTrade_initiator_deck2()->getId());
                $statement->execute();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                Database::display_db_error($error_message);
            }
        }else{
            $db = Database::getDB();
            $query_trade_insert = 'INSERT INTO trade_card
                                  (initiator_id, recipient_id, recipient_card_id, recipient_deck_id, 
                                   initiator_card1_id, initiator_deck1_id)
                                  VALUES
                                  (:initiator_id, :recipient_id, :recipient_card_id, :recipient_deck_id,
                                   :initiator_card1_id, :initiator_deck1_id)';
            try{
                $statement = $db->prepare($query_trade_insert);
                $statement->bindValue(':initiator_id', $trade_request->getTrade_initiator_id());
                $statement->bindValue(':recipient_id', $trade_request->getTrade_recipient_deck()->getUserID());
                $statement->bindValue(':recipient_card_id', $trade_request->getTrade_recipient_card()->getId());
                $statement->bindValue(':recipient_deck_id', $trade_request->getTrade_recipient_deck()->getId());
                $statement->bindValue(':initiator_card1_id', $trade_request->getTrade_initiator_card1()->getId());
                $statement->bindValue(':initiator_deck1_id', $trade_request->getTrade_initiator_deck1()->getId());
                $statement->execute();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                Database::display_db_error($error_message);
            }
        }
    }
    
    public static function getUserPurposedTrades($userID) {
        $db = Database::getDB();
        $query_purposed_trade = 'SELECT ID, initiator_id, recipient_card_id, recipient_deck_id, 
                               initiator_card1_id, initiator_deck1_id, initiator_card2_id, initiator_deck2_id
                               FROM trade_card
                               WHERE initiator_id = :userID
                               AND request_status_id = 1';
        try{
            $statement = $db->prepare($query_purposed_trade);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            
            $purposed_trades = array();
            
            foreach ($statement as $row){
                $purposed_trade = new trade_request($row['ID'],
                                              card_db::getPokemonCardById($row['recipient_card_id']),
                                              deck_db::getDeck($row['recipient_deck_id']),
                                              $row['initiator_id'],
                                              card_db::getPokemonCardById($row['initiator_card1_id']),
                                              deck_db::getDeck($row['initiator_deck1_id']),
                                              $row['initiator_card2_id'],
                                              $row['initiator_deck2_id']);
                
                $purposed_trades[]=$purposed_trade;
            }
            
            return $purposed_trades;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function getUserPurposedTrade($tradeID) {
        $db = Database::getDB();
        $query_purposed_trade = 'SELECT ID, initiator_id, recipient_card_id, recipient_deck_id, 
                               initiator_card1_id, initiator_deck1_id, initiator_card2_id, initiator_deck2_id
                               FROM trade_card
                               WHERE ID = :tradeID
                               AND request_status_id = 2';
        try{
            $statement = $db->prepare($query_purposed_trade);
            $statement->bindValue(':tradeID', $tradeID);
            $statement->execute();
            $row = $statement->fetch();
            $purposed_trade = new trade_request($row['ID'],
                                                card_db::getPokemonCardById($row['recipient_card_id']),
                                                deck_db::getDeck($row['recipient_deck_id']),
                                                $row['initiator_id'],
                                                card_db::getPokemonCardById($row['initiator_card1_id']),
                                                deck_db::getDeck($row['initiator_deck1_id']),
                                                $row['initiator_card2_id'],
                                                $row['initiator_deck2_id']);
            
            return $purposed_trade;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function cancelTrade($tradeID) {
        $db = Database::getDB();
        $query_delete_trade = 'UPDATE trade_card
                               SET request_status_id = 4
                               WHERE ID = :tradeID';
        try{
            $statement = $db->prepare($query_delete_trade);
            $statement->bindValue(':tradeID', $tradeID);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function denyTrade($tradeID) {
        $db = Database::getDB();
        $query_delete_trade = 'UPDATE trade_card
                               SET request_status_id = 3
                               WHERE ID = :tradeID';
        try{
            $statement = $db->prepare($query_delete_trade);
            $statement->bindValue(':tradeID', $tradeID);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function acceptTrade($tradeID) {
        $db = Database::getDB();
        $query_delete_trade = 'UPDATE trade_card
                               SET request_status_id = 2
                               WHERE ID = :tradeID';
        try{
            $statement = $db->prepare($query_delete_trade);
            $statement->bindValue(':tradeID', $tradeID);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }

    public static function getUserIncomingTrades($userID) {
        $db = Database::getDB();
        $query_incoming_trade = 'SELECT ID, initiator_id, recipient_card_id, recipient_deck_id, 
                               initiator_card1_id, initiator_deck1_id, initiator_card2_id, initiator_deck2_id
                               FROM trade_card
                               WHERE recipient_id = :userID
                               AND request_status_id = 1';
        try{
            $statement = $db->prepare($query_incoming_trade);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            
            $incoming_trades = array();
            
            foreach ($statement as $row){
                $incoming_trade = new trade_request($row['ID'],
                                              card_db::getPokemonCardById($row['recipient_card_id']),
                                              deck_db::getDeck($row['recipient_deck_id']),
                                              $row['initiator_id'],
                                              card_db::getPokemonCardById($row['initiator_card1_id']),
                                              deck_db::getDeck($row['initiator_deck1_id']),
                                              $row['initiator_card2_id'],
                                              $row['initiator_deck2_id']);
                
                $incoming_trades[]=$incoming_trade;
            }
            
            return $incoming_trades;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    
    }

}
