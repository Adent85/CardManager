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

if(filter_input(INPUT_COOKIE, 'email') != false && filter_input(INPUT_COOKIE, 'password') != false){
    $email = filter_input(INPUT_COOKIE, 'email');
    $password = filter_input(INPUT_COOKIE, 'password');
}else{
    $email = "";
    $password = "";
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
    $user = new User(ucfirst(strtolower($firstName)), ucfirst(strtolower($lastName)), $email, $password, $userRoleId, $active);
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
    $remember = filter_input(INPUT_POST, 'rememberInput');
    if(!empty($remember)){
        utility::createEmailCookie();
        utility::createPasswordCookie();
        utility::createRememberCookie();
    }else{
        $expire = strtotime('-1 year');
        setcookie('email', '', $expire, '/');
        setcookie('password', '', $expire, '/');
        setcookie('remember', '', $expire, '/');
    }
    $_SESSION['user'] = $user;
    $userName= $user->getFirstName()." ".$user->getLastName();
    require_once 'user_home.php';
}else if($controllerChoice=='user_logout'){   
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
