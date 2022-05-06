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
    $userList = utility::removeSingleVariableFromList(user_db::getActiveUsers(), $user->getID());//Removes current user from list
    $currentFriends = user_db::userFriends($user->getID());
    $users = utility::removeListFromList($userList, $currentFriends);//removes users current friends from list
    require_once 'user_list.php';
}elseif($controllerChoice=='view_friends'){
    $friends = user_db::userFriends($user->getID());
    $currentFriends = utility::removeSingleVariableFromList($friends, $user->getID());//Removes current user from list
    require_once 'friend_list.php';
}elseif($controllerChoice=='search_user_list'){
    $search_input = filter_input(INPUT_POST, 'search_name');
    $searchInput = trim($search_input);
    $last_name = (strpos($searchInput, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $searchInput);
    $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $searchInput ) );
    $userList = utility::removeSingleVariableFromList(user_db::searchUserFriends($first_name, $last_name), $user->getID());//Removes current user from list
    $currentFriends = user_db::userFriends($user->getID());
    $users = utility::removeListFromList($userList, $currentFriends);//removes users current friends from list
    if($users == null){
        $users = new user();
    }
    require_once 'user_list.php';
}elseif($controllerChoice=='remove_friend'){
    $friendId = filter_input(INPUT_POST, 'friend_id');
    user_db::removeFriend($friendId, $user->getID());
    $currentFriends = user_db::userFriends($user->getID());
    require_once 'friend_list.php';
}elseif($controllerChoice=='friend_request'){
    $friendRequests = array_unique(user_db::getFriendRequestsIncoming($user->getID()), SORT_REGULAR);
    require_once 'request_list.php';
}elseif($controllerChoice=='request_friend'){
    $receiverId = filter_input(INPUT_POST,'receiver_id');
    user_db::sendFriendRequest($user->getID(), $receiverId);
    require_once '../user_manager/user_home.php';
}elseif($controllerChoice=='deny_friend_request'){
        $senderId =filter_input(INPUT_POST, 'request_response');
        user_db::denyFriendRequest($user->getID(), $senderId);
        $friendRequests = array_unique(user_db::getFriendRequestsIncoming($user->getID()), SORT_REGULAR);
        if($friendRequests == null){
            $currentFriends = user_db::userFriends($user->getID());
            require_once 'friend_list.php';
        }else{
            $friendRequests = array_unique(user_db::getFriendRequestsIncoming($user->getID()), SORT_REGULAR);
            require_once 'request_list.php';
        }
}elseif($controllerChoice=='accept_friend_request') {
        $senderId =filter_input(INPUT_POST, 'request_response');
        user_db::acceptFriendRequest($user->getId(), $senderId);
        $friendRequests = array_unique(user_db::getFriendRequestsIncoming($user->getID()), SORT_REGULAR);
        if($friendRequests == null){
            $currentFriends = user_db::userFriends($user->getID());
            require_once 'friend_list.php';
        }else{
            $friendRequests = array_unique(user_db::getFriendRequestsIncoming($user->getID()), SORT_REGULAR);
            require_once 'request_list.php';
        }
    
}
