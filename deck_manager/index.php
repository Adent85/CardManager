<?php
require_once '../model/database.php';
require_once '../model/utility.php';
require_once '../model/card_db.php';
require_once '../model/card_attribute.php';
require_once '../model/user_db.php';
require_once '../model/user.php';
require_once '../model/deck.php';
require_once '../model/card.php';
require_once '../model/deck_db.php';
require_once '../model/deck_type.php';

/* 
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 *  Pokemon::Options(['verify' => true]);
 *  Pokemon::ApiKey('1949bf3e-c0cd-43f7-8a01-651fcc936315');
 *  $pcards = Pokemon::Card()->all();
 */
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

 if (isset($_SESSION['user'])) { 
     $user=$_SESSION['user'];
     $userName= $user->getFirstName()." ".$user->getLastName();
     $loggedin = true;
   } else {
    }
    $controllerChoice = filter_input(INPUT_POST, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = filter_input(INPUT_GET, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = 'show_home_page';
}}
if($controllerChoice=='create_deck'){
    $deck_types = deck_db::getAllDeckTypes();
    require_once 'create_deck.php';
}elseif($controllerChoice=='insert_deck'){
    $userID = $user->getId();
    $deckName = filter_input(INPUT_POST, 'deckName');
    $deckDescription = filter_input(INPUT_POST, 'deckDescription');
    $deckTypeID = filter_input(INPUT_POST, 'selectedDeckTypeID');
    $active = 1;
    $deck = new Deck($userID, $deckName, $deckDescription, $deckTypeID, $active);
    deck_db::createNewDeck($deck);
    $user_decks=deck_db::getUserDecks($user->getID());
    require_once 'deck_list.php';
}elseif($controllerChoice=='view_decks'){
    $user_decks=deck_db::getUserDecks($user->getID());
    require_once 'deck_list.php';
}elseif($controllerChoice=='edit_deck'){
    $deck=deck_db::getDeck(filter_input(INPUT_POST, 'deck_id'));
    require_once 'edit_deck.php';
}elseif($controllerChoice=='update_deck'){
    if(utility::getUserRoleIdFromSession() == 2 ){
        deck_db::updateDeck(filter_input(INPUT_POST, 'deck_id'), filter_input(INPUT_POST, 'deckName'), filter_input(INPUT_POST, 'deckDescription'));
        $deck=deck_db::getDeck(filter_input(INPUT_POST, 'deck_id'));
        $user = user_db::getUserByID($deck->getUserID());
        $user_decks=deck_db::getUserDecks($user->getID());
        require_once 'deck_list.php';
    }else{
        deck_db::updateDeck(filter_input(INPUT_POST, 'deck_id'), filter_input(INPUT_POST, 'deckName'), filter_input(INPUT_POST, 'deckDescription'));
        $user_decks=deck_db::getUserDecks($user->getID());
        require_once 'deck_list.php';
    }
}elseif($controllerChoice=='delete_deck'){
    if(utility::getUserRoleIdFromSession() == 2 ){
        $deckID = filter_input(INPUT_POST, 'deck_id');
        $deck=deck_db::getDeck(filter_input(INPUT_POST, 'deck_id'));
        deck_db::deleteDeckFromDeckCardTable($deckID);
        deck_db::deleteDeck($deckID);
        $user = user_db::getUserByID($deck->getUserID());
        $user_decks=deck_db::getUserDecks($user->getID());
        require_once 'deck_list.php';
    }else{
        $deckID = filter_input(INPUT_POST, 'deck_id');
        deck_db::deleteDeckFromDeckCardTable($deckID);
        deck_db::deleteDeck($deckID);
        $user_decks=deck_db::getUserDecks($user->getID());
        require_once 'deck_list.php';
    }
}elseif($controllerChoice=='add_card_to_deck'){
    $pageNumber = 1;
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::getAllPokemonCards($pageNumber);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}elseif($controllerChoice=='add_card'){
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $cardID = filter_input(INPUT_POST, 'card_id');
    deck_db::addCardToDeck($deckID, $cardID);
    $deck=deck_db::getDeck($deckID);
    $cards=deck_db::getCardsInDeck($deckID);
    require_once 'view_deck.php';
}elseif($controllerChoice=='delete_card'){
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $cardID = filter_input(INPUT_POST, 'card_id');
    deck_db::deleteCardFromDeck($cardID, $deckID);
    $deck=deck_db::getDeck($deckID);
    $cards=deck_db::getCardsInDeck($deckID);
    require_once 'view_deck.php';
}elseif($controllerChoice=='view_deck'){
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $deck=deck_db::getDeck($deckID);
    $cards=deck_db::getCardsInDeck($deckID);
    require_once 'view_deck.php';
}elseif($controllerChoice=='view_decks_admin'){
    if(utility::getUserRoleIdFromSession() == 2 ){
        $userId = filter_input(INPUT_POST, 'deckUserId');
        $user = user_db::getUserByID($userId);
        $user_decks=deck_db::getUserDecks($userId);
        require_once 'admin_deck_list.php';
    }else{
        $user = $_SESSION['user'];
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }
}elseif($controllerChoice=='previous_page'){
    $pageNumber = filter_input(INPUT_POST, 'page_number');
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::getAllPokemonCards($pageNumber);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}elseif($controllerChoice=='to_page'){
    $pageNumber = filter_input(INPUT_POST, 'page_number');
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::getAllPokemonCards($pageNumber);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}elseif($controllerChoice=='next_page'){
    $pageNumber = filter_input(INPUT_POST, 'page_number');
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::getAllPokemonCards($pageNumber);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}
elseif ($controllerChoice=='search_cards') {
    $pageNumber = 1;
    $search_name = filter_input(INPUT_POST, 'search_name');
    $pokemonCards = card_db::searchPokemonCardsByName($pageNumber, $search_name);
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}elseif($controllerChoice=='previous_page_search'){
    $pageNumber = filter_input(INPUT_POST, 'page_number');
        $search_name = filter_input(INPUT_POST, 'search_name');
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::searchPokemonCardsByName($pageNumber, $search_name);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}elseif($controllerChoice=='to_page_search'){
    $pageNumber = filter_input(INPUT_POST, 'page_number');
        $search_name = filter_input(INPUT_POST, 'search_name');
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::searchPokemonCardsByName($pageNumber, $search_name);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}elseif($controllerChoice=='next_page_search'){
    $pageNumber = filter_input(INPUT_POST, 'page_number');
        $search_name = filter_input(INPUT_POST, 'search_name');
    $deckID = filter_input(INPUT_POST, 'deck_id');
    $pokemonCards = card_db::searchPokemonCardsByName($pageNumber, $search_name);
    $deck=deck_db::getDeck($deckID);
    require_once 'add_card.php';
}
