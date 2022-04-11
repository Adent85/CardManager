<?php

/* 
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */
require_once '../model/user_db.php';
require_once '../model/database.php';
require_once '../model/user.php';
require_once '../model/utility.php';

$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']==true  ) { 
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

if ($controllerChoice=='show_home_page') {
    require_once '../index.php';
}elseif ($controllerChoice=='register_user') {
    $firstName= filter_input(INPUT_POST, 'inputFirstName');
    $lastName=filter_input(INPUT_POST, 'inputLastName');
    $email=filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST, 'inputPassword');
    $userRoleId=1;
    $active = 1;  
    $user = new User($firstName, $lastName, $email, $password, $userRoleId, $active);
    $ID=user_db::insertUserData($user);
    if($ID > 0){
    $success_message = 'Your record was sucessfully inserted';
    $user->setId($ID);
    $user=user_db::userLogin($email,$password);
    $_SESSION['user'] = $user;
    $userName= $user->getFirstName()." ".$user->getLastName();
    include 'user_home.php';
    } 
}elseif ($controllerChoice=='user_login') {
    $email=filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST, 'inputPassword');  
    $user=user_db::userLogin($email,$password);
    $_SESSION['user'] = $user;
    $userName= $user->getFirstName()." ".$user->getLastName();
    require_once 'user_home.php';
}else if($controllerChoice=='user_logout'){   
    $name = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    setcookie($name, '', $expire, $path, $domain,
     $secure, $httponly);
    $_SESSION = array();
    session_destroy();
    $loggedin= false;
    require_once '../index.php';
}elseif ($controllerChoice=='edit_user') {
    $user = $_SESSION['user'];
    require_once 'edit_user.php';
}elseif ($controllerChoice=='user_home') {
    require_once 'user_home.php';
}
