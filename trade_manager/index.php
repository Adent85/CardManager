<?php

/* 
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */
require_once '../model/user_db.php';
require_once '../model/database.php';
require_once '../model/user.php';
require_once '../model/user_db.php';
require_once '../model/utility.php';
require_once '../model/deck.php';
require_once '../model/card.php';
require_once '../model/card_attribute.php';
require_once '../model/deck_db.php';
require_once '../model/card_db.php';
require_once '../model/trade_card_db.php';
require_once '../model/trade_request.php';


$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

if (isset($_SESSION['user'])) { 
 $user=$_SESSION['user'];
 $userName= $user->getFirstName()." ".$user->getLastName();
 $loggedin = true;
}
    $controllerChoice = filter_input(INPUT_POST, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = filter_input(INPUT_GET, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = 'show_home_page';
}}

if ($controllerChoice=='view_decks_for_trade') {
    $friendId = filter_input(INPUT_POST, 'friend_id');
    $friend_decks=deck_db::getUserDecks($friendId);
    $userFriend = user_db::getUserByID($friendId);
    require_once 'view_friend_deck_list.php';
}elseif ($controllerChoice=='view_friend_deck') {
    $friend_deck_id = filter_input(INPUT_POST, 'friend_deck_id');
    $friend_deck=deck_db::getDeck($friend_deck_id);
    $friend_cards=deck_db::getCardsInDeck($friend_deck_id);
    require_once 'view_friend_deck.php';
}elseif ($controllerChoice == 'initiate_friend_card_trade'){
    $desired_friend_deck = deck_db::getDeck(filter_input(INPUT_POST, 'trade_friend_deck'));
    $desired_friend_card = card_db::getPokemonCardById(filter_input(INPUT_POST, 'trade_friend_card'));
    $purposed_trade = new trade_request($desired_friend_card, $desired_friend_deck, $user->getID());
    $_SESSION['trade_request'] = $purposed_trade;
    require_once 'card_trade.php';
}elseif ($controllerChoice == 'find_card_to_trade') {
    $user_decks=deck_db::getUserDecks($user->getID());
    require_once 'deck_list_trade.php';
}elseif ($controllerChoice == 'view_deck_trade') {
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $deck=deck_db::getDeck($deckID);
    $cards=deck_db::getCardsInDeck($deckID);
    require_once 'view_deck_trade.php';
}elseif ($controllerChoice == 'trade_card') {
    $purposed_trade = $_SESSION['trade_request'];
    if ($purposed_trade->getTrade_initiator_card1()!= null){
        $purposed_trade_deck2 = deck_db::getDeck(filter_input(INPUT_POST, 'deck_id'));
        $purposed_trade_card2 = card_db::getPokemonCardById(filter_input(INPUT_POST, 'card_id'));
        $purposed_trade->setTrade_initiator_card2($purposed_trade_card2);
        $purposed_trade->setTrade_initiator_deck2($purposed_trade_deck2);
    }else{
        $purposed_trade_deck1 = deck_db::getDeck(filter_input(INPUT_POST, 'deck_id'));
        $purposed_trade_card1 = card_db::getPokemonCardById(filter_input(INPUT_POST, 'card_id'));
        $purposed_trade->setTrade_initiator_card1($purposed_trade_card1);
        $purposed_trade->setTrade_initiator_deck1($purposed_trade_deck1);
    }
    $_SESSION['trade_request'] = $purposed_trade;
    require_once 'card_trade.php';
}elseif ($controllerChoice == 'find_card2_to_trade') {
    $user_decks=deck_db::getUserDecks($user->getID());
    require_once 'deck_list_trade.php';
}elseif ($controllerChoice == 'purpose_trade') {
    $purposed_trade = $_SESSION['trade_request'];
    trade_card_db::createNewTrade($purposed_trade);
    $purposed_trades = trade_card_db::getUserPurposedTrades($user->getID());
    foreach($purposed_trades as $pt){
        $userFriend = user_db::getUserByID($pt->getTrade_recipient_deck()->getUserID());
        if($pt->getTrade_initiator_card2()!=null){
            $pt->setTrade_initiator_card2(card_db::getPokemonCardById($pt->getTrade_initiator_card2()));
            $pt->setTrade_initiator_deck2(deck_db::getDeck($pt->getTrade_initiator_deck2()));
        }
    }
    require_once 'view_purposed_trades.php';
}elseif ($controllerChoice == 'view_purposed_trades') {
    $purposed_trades = trade_card_db::getUserPurposedTrades($user->getID());
    foreach($purposed_trades as $pt){
        $userFriend = user_db::getUserByID($pt->getTrade_recipient_deck()->getUserID());
        if($pt->getTrade_initiator_card2()!=null){
            $pt->setTrade_initiator_card2(card_db::getPokemonCardById($pt->getTrade_initiator_card2()));
            $pt->setTrade_initiator_deck2(deck_db::getDeck($pt->getTrade_initiator_deck2()));
        }
    }
    require_once 'view_purposed_trades.php';
}elseif($controllerChoice == 'view_incoming_trades'){
    $incoming_trades = trade_card_db::getUserIncomingTrades($user->getID());
    foreach($incoming_trades as $it){
        $userFriend = user_db::getUserByID($it->getTrade_initiator_id());
        if($it->getTrade_initiator_card2()!=null){
            $it->setTrade_initiator_card2(card_db::getPokemonCardById($it->getTrade_initiator_card2()));
            $it->setTrade_initiator_deck2(deck_db::getDeck($it->getTrade_initiator_deck2()));
        }
    }
    require_once 'view_incoming_trades.php';
}elseif($controllerChoice == 'cancel_trade'){
    $tradeID = filter_input(INPUT_POST, 'trade_id');
    trade_card_db::cancelTrade($tradeID);
    $purposed_trades = trade_card_db::getUserPurposedTrades($user->getID());
    foreach($purposed_trades as $pt){
        $userFriend = user_db::getUserByID($pt->getTrade_recipient_deck()->getUserID());
        if($pt->getTrade_initiator_card2()!=null){
            $pt->setTrade_initiator_card2(card_db::getPokemonCardById($pt->getTrade_initiator_card2()));
            $pt->setTrade_initiator_deck2(deck_db::getDeck($pt->getTrade_initiator_deck2()));
        }
    }
    require_once 'view_purposed_trades.php';
}elseif($controllerChoice == 'accept_trade_request'){
    
}elseif($controllerChoice == 'deny_trade_request'){
    
}
