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
require_once '../model/deck_db.php';


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
    include 'view_friend_deck.php';
}
