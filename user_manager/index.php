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
    if($_SESSION['user']==null){
        $_SESSION=array();
    }else{
    $user=$_SESSION['user'];
    $userName= $user->getFirstName()." ".$user->getLastName();
    }
 
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
    $error_message = "";
    require_once '../index.php';
}elseif ($controllerChoice=='register_user') {
    $firstName= filter_input(INPUT_POST, 'inputFirstName');
    $lastName=filter_input(INPUT_POST, 'inputLastName');
    $email=filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST, 'inputPassword');
    $userRoleId=1; 
    $user = new User(ucfirst(strtolower($firstName)), ucfirst(strtolower($lastName)), $email, $password, $userRoleId);
    $ID=user_db::insertUserData($user);
    if($ID > 0){
    $user->setId($ID);
    $user=user_db::userLogin($email,$password);
    $_SESSION['user'] = $user;
    $userName= $user->getFirstName()." ".$user->getLastName();
    include 'user_home.php';
    }else{
        $error_message = "An error occured while trying to register your new account.<br>Please try again.";
        require_once '../index.php';
    }
}elseif ($controllerChoice=='user_login') {
    $email=filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST, 'inputPassword');  
    $user=user_db::userLogin($email,$password);
    $remember = filter_input(INPUT_POST, 'rememberInput');
    if($user != false){
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
    }else{
        $error_message = "Login error please check your credetials and try again";
        require_once '../index.php';
    }
    
    
}else if($controllerChoice=='user_logout'){   
    $_SESSION = array();
    session_destroy();
    $error_message = "You have sucessfully been logged out";
    require_once '../index.php';
}elseif ($controllerChoice=='edit_user') {
    if(utility::getUserRoleIdFromSession() == 2 ){
        $userId = filter_input(INPUT_POST, 'editUserId');
        $firstName= filter_input(INPUT_POST, 'editFirstName');
        $lastName=filter_input(INPUT_POST, 'editLastName');
        $email=filter_input(INPUT_POST, 'editEmail', FILTER_VALIDATE_EMAIL);
        $password=filter_input(INPUT_POST, 'editPassword');
        $user = new User(ucfirst(strtolower($firstName)), ucfirst(strtolower($lastName)), $email, $password, 2);
        $user->setID($userId);
        user_db::updateUser($user);
        $_SESSION['user'] = $user;
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }else{
        $email=filter_input(INPUT_POST, 'editEmail', FILTER_VALIDATE_EMAIL);
        $password=filter_input(INPUT_POST, 'editPassword');
        if(user_db::validateUser($email, $password)){
            $userId = filter_input(INPUT_POST, 'editUserId');
            $firstName= filter_input(INPUT_POST, 'editFirstName');
            $lastName=filter_input(INPUT_POST, 'editLastName'); 
            $user = new User(ucfirst(strtolower($firstName)), ucfirst(strtolower($lastName)), $email, $password, 1);
            $user->setID($userId);
            user_db::updateUser($user);
            $_SESSION['user'] = $user;
            $userName= $user->getFirstName()." ".$user->getLastName();
            include 'user_home.php';
        }else{
            $_SESSION['user'] = $user;
            $userName= $user->getFirstName()." ".$user->getLastName();
            include 'user_home.php';
        }
    }
    
}elseif ($controllerChoice=='user_home') {
    require_once 'user_home.php';
}elseif ($controllerChoice=='view_user_admin') {
    if(utility::getUserRoleIdFromSession() == 2 ){
        $users = user_db::getAllUsers();
        require_once 'view_user_admin.php';
    }else{
        $user = $_SESSION['user'];
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }

}elseif ($controllerChoice=='search_user_list_admin') {
    if(utility::getUserRoleIdFromSession() == 2 ){
        $search_input = filter_input(INPUT_POST, 'search_name');
        $searchInput = trim($search_input);
        $last_name = (strpos($searchInput, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $searchInput);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $searchInput ) );
        $users = user_db::searchUserFriends($first_name, $last_name);
        require_once 'view_user_admin.php';
    }else{
        $user = $_SESSION['user'];
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }
}elseif ($controllerChoice=='edit_user_admin') {
    if(utility::getUserRoleIdFromSession() == 2 ){
        $userId = filter_input(INPUT_POST, 'editUserId');
        $firstName= filter_input(INPUT_POST, 'editFirstName');
        $lastName=filter_input(INPUT_POST, 'editLastName');
        $email=filter_input(INPUT_POST, 'editEmail', FILTER_VALIDATE_EMAIL);
        $password=filter_input(INPUT_POST, 'editPassword');
        $user = new User(ucfirst(strtolower($firstName)), ucfirst(strtolower($lastName)), $email, $password, 1);
        user_db::updateUser($user);
        $users = user_db::getAllUsers();
        require_once 'view_user_admin.php';
    }else{
        $user = $_SESSION['user'];
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }
}elseif ($controllerChoice=='deactivate_user_admin') {
    if(utility::getUserRoleIdFromSession() == 2 ){
        $userId = filter_input(INPUT_POST, 'editUserId');
        user_db::deactivateUser($userId);
        $users = user_db::getAllUsers();
        require_once 'view_user_admin.php';
    }else{
        $user = $_SESSION['user'];
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }
    
}elseif ($controllerChoice=='activate_user_admin') {
    if(utility::getUserRoleIdFromSession() == 2 ){
        $userId = filter_input(INPUT_POST, 'editUserId');
        user_db::activateUser($userId);
        $users = user_db::getAllUsers();
        require_once 'view_user_admin.php';
    }else{
        $user = $_SESSION['user'];
        $userName= $user->getFirstName()." ".$user->getLastName();
        include 'user_home.php';
    }
}
