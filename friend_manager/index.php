<?php
require_once '../model/database.php';
require_once '../model/utility.php';
require_once '../model/user.php';
require_once '../model/user_db.php';
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
}
$controllerChoice = filter_input(INPUT_POST, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = filter_input(INPUT_GET, 'controllerRequest');
if ($controllerChoice == NULL) {
    $controllerChoice = 'show_home_page';
}}

if($controllerChoice=='view_users'){
    $users = user_db::getActiveUsers();
    $currentFriends = user_db::userFriends($user->getID());
    foreach ($users as $u => $val){
        if($val->getId()==$user->getID()){
            unset($users[$u]);
        }
    }
    foreach ($users as $u => $val){
        foreach ($currentFriends as $cf){
            if($val->getId()==$cf->getID()){
                unset($users[$u]);
            }
        }
    }
    require_once 'user_list.php';
}elseif($controllerChoice=='view_friends'){
    $currentFriends = user_db::userFriends($user->getID());
    require_once 'friend_list.php';
}elseif($controllerChoice=='remove_friend'){
    $friendId = filter_input(INPUT_POST, 'friend_id');
    user_db::removeFriend($friendId, $user->getID());
    $currentFriends = user_db::userFriends($user->getID());
    require_once 'friend_list.php';
}elseif($controllerChoice=='friend_request'){
    $friendRequests = user_db::getFriendRequests($user->getID());
    require_once 'request_list.php';
}elseif($controllerChoice=='request_friend'){
    $receiverId = filter_input(INPUT_POST,'receiver_id');
    user_db::sendFriendRequest($user->getID(), $receiverId);
    require_once '../user_manager/user_home.php';
}elseif($controllerChoice=='deny_friend_request'){
        $senderId =filter_input(INPUT_POST, 'request_response');
        user_db::denyFriendRequest($user->getID(), $senderId);
        $friendRequests = user_db::getFriendRequests($user->getID());
        if($friendRequests == null){
            $currentFriends = user_db::userFriends($user->getID());
            require_once 'friend_list.php';
        }else{
            $friendRequests = user_db::getFriendRequests($user->getID());
            require_once 'request_list.php';
        }
}elseif($controllerChoice=='accept_friend_request') {
        $senderId =filter_input(INPUT_POST, 'request_response');
        user_db::acceptFriendRequest($user->getId(), $senderId);
        $friendRequests = user_db::getFriendRequests($user->getID());
        if($friendRequests == null){
            $currentFriends = user_db::userFriends($user->getID());
            require_once 'friend_list.php';
        }else{
            $friendRequests = user_db::getFriendRequests($user->getID());
            require_once 'request_list.php';
        }
    
}
