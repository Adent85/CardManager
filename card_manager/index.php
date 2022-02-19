<?php
require_once '../model/database.php';
require_once '../model/utility.php';
require_once '../model/card_db.php';
/* 
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
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

if ($controllerChoice=='show_card_list') {
    $cards = card_db::getAllCards();
    require_once '/card_list.php';
}