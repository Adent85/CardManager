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
            $statement->bindValue(':recipient_id', $trade_request->getTrade_recipient_deck().getUserID());
            $statement->bindValue(':recipient_card_id', $trade_request->getTrade_recipient_card().getId());
            $statement->bindValue(':recipient_deck_id', $trade_request->getTrade_recipient_deck().getId());
            $statement->bindValue(':initiator_card1_id', $trade_request->getTrade_initiator_card1().getId());
            $statement->bindValue(':initiator_deck1_id', $trade_request->getTrade_initiator_deck1().getId());
            $statement->bindValue(':initiator_card2_id', $trade_request->getTrade_initiator_card2().getId());
            $statement->bindValue(':initiator_deck2_id', $trade_request->getTrade_initiator_deck2().getId());
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }

    public static function getPurposedTrades($userID) {
        $db = Database::getDB();
        $query_purposed_trade = 'SELECT ID, initiator_id, recipient_card_id, recipient_deck_id, 
                               initiator_card1_id, initiator_deck1_id, initiator_card2_id, initiator_deck2_id, 
                               FROM trade_card
                               WHERE initiator_id = :userID';
        try{
            $statement = $db->prepare($query_purposed_trade);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $row = $statement->fetch();
            
            $tradeRequest = new trade_request($row['ID'],
                                              $row['recipient_card_id'],
                                              $row['recipient_deck_id'],
                                              $row['initiator_id'],
                                              $row[''],
                                              $row[''],
                                              $row[''],
                                              $row[''],
                                              $row['']);
            return $tradeRequest;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }

}
