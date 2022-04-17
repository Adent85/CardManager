<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of user_db
 *
 * @author Kyle Fisk 
 */
class user_db {
    public static function userLogin($email,$passwordInput){//verifys user login information
        $db = Database::getDB();
        $queryUser = 'SELECT ID, firstName, lastName, password, userRoleID, active  FROM user
                      WHERE email = :email
                      AND active = 1';
        try{
            $statement = $db->prepare($queryUser);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $row = $statement->fetch();
            $hash = $row['password']; 
            if(password_verify($passwordInput, $hash)){
                $user = new User(0, $row['firstName'], 
                             $row['lastName'],                             
                             $row['userRoleID']);
                $user->setID($row['ID']);
                return $user;
            }else{
                $user = false;
                return $user;
            }
        }catch( PDOException $e){
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function insertUserData($user){//inserts new user 
        $db = Database::getDB();
        $hash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $query = 'INSERT INTO user
                 (firstName, lastName, email, password, userRoleID)
              VALUES
                 (:first_name, :last_name, :email, :password, :user_role_id)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':first_name', $user->getFirstName());
            $statement->bindValue(':last_name', $user->getLastName());
            $statement->bindValue(':email', $user->getEmail());
            $statement->bindValue(':password', $hash);
            $statement->bindValue(':user_role_id', $user->getUserRoleId());
            $statement->execute();
            $ID= $db->lastInsertId(); 
            return $ID;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
            
        }
    }
    
    public static function getActiveUsers(){
        $db = Database::getDB();
        $queryUser = 'SELECT ID, firstName , lastName, userRoleID FROM user
                      WHERE active = 1';
        try{
            $statement = $db->prepare($queryUser);
            $statement->execute();

            $users = array();

            foreach ($statement as $row) {
            $user = new User($row['ID'], 
                             $row['firstName'], 
                             $row['lastName'],                             
                             $row['userRoleID']);
            $users[]=$user;
            }
            return $users;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function getUserByID($friendID){
        $db = Database::getDB();
        $queryUser = 'SELECT ID, firstName, lastName FROM user
                      WHERE ID = :friendID';
        try{
            $statement = $db->prepare($queryUser);
            $statement->bindValue(':friendID', $friendID);
            $statement->execute();
            $row = $statement->fetch();
            
                $userFriend = new User($row['ID'],
                                 $row['firstName'], 
                                 $row['lastName']);
                return $userFriend;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    public static function userFriends($userId){
        $db = Database::getDB();
        $queryFriendList = 'SELECT u.ID, u.firstName, u.lastName FROM user u 
                            JOIN friend_list fl 
                            ON u.ID = fl.user_1_id
                            WHERE fl.user_2_id = :userId
                            UNION
                            SELECT u.ID, u.firstName, u.lastName FROM user u 
                            JOIN friend_list fl 
                            ON u.ID = fl.user_2_id
                            WHERE fl.user_1_id = :userId';
        try{
            $statement = $db->prepare($queryFriendList);
            $statement->bindValue(':userId', $userId);
            $statement->execute();

            $userFriends = array();

            foreach ($statement as $row) {
                $userFriends[] = new User($row['ID'],
                             $row['firstName'], 
                             $row['lastName']);   
            }

            return $userFriends;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }
    
    public static function removeFriend($friendId, $userId) {
        $db = Database::getDB();
        $queryRemoveFriend = 'DELETE FROM friend_list
                              WHERE user_1_id = :userId
                              AND user_2_id = :friendId 
                              OR user_1_id = :friendId
                              AND user_2_id = :userId';
        try{
            $statement = $db->prepare($queryRemoveFriend);
            $statement->bindValue(':userId', $userId);
            $statement->bindValue(':friendId', $friendId);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }

    public static function sendFriendRequest($userId , $receiverId){
        $db = Database::getDB();
        $queryRequestFriend = 'INSERT INTO friend_request
                               (sender_id, receiver_id, status)
                               VALUES
                               (:senderId, :receiverId, :status)';
        try{
            $statement = $db->prepare($queryRequestFriend);
            $statement->bindValue(':senderId', $userId);
            $statement->bindValue(':receiverId', $receiverId);
            $statement->bindValue(':status', 1);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
                
    }
    public static function getFriendRequests($userId){
        $db = Database::getDB();
        $queryFriendRequest = 'SELECT u.ID, u.firstName, u.lastName FROM friend_request fl
                               JOIN user u
                               ON u.ID = fl.sender_id
                               WHERE receiver_id = :userId
                               AND status = 1';
        try{
            $statement = $db->prepare($queryFriendRequest);
            $statement->bindValue(':userId', $userId);
            $statement->execute();

            $friendRequests = array();

            foreach ($statement as $row) {
                $friendRequests[] = new User($row['ID'],
                                   $row['firstName'], 
                                   $row['lastName']);
            }
            return $friendRequests;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
    }

    public static function denyFriendRequest($userId, $senderId) {
        $db = Database::getDB();
        $queryDenyFriendRequest = 'UPDATE friend_request
                                   SET status = 3
                                   WHERE sender_id = :senderId
                                   AND receiver_id = :userId';
        try{
            $statement = $db->prepare($queryDenyFriendRequest);
            $statement->bindValue(':senderId', $senderId);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }  
    }

    public static function acceptFriendRequest($userId, $senderId) {
        $db = Database::getDB();
        $queryDenyFriendRequest = 'UPDATE friend_request
                                   SET status = 2
                                   WHERE sender_id = :senderId
                                   AND receiver_id = :userId';
        try{
        $statement = $db->prepare($queryDenyFriendRequest);
        $statement->bindValue(':senderId', $senderId);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
            if($count>0){
                $queryAddFriend = 'INSERT INTO friend_list
                                   (user_1_id, user_2_id)
                                   VALUES
                                   (:userId, :senderId)';

                $statement2 = $db->prepare($queryAddFriend);
                $statement2->bindValue(':userId', $userId);
                $statement2->bindValue(':senderId', $senderId);
                $statement2->execute();
            }
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            Database::display_db_error($error_message);
        }
        
    }

    public static function searchUserFriends($first_name, $last_name) {
        $db = Database::getDB();
        if($last_name != null){
            $queryUser = 'SELECT ID, firstName , lastName FROM user
                          WHERE firstName like :first_name
                          AND lastName like :last_name';
            try{
                $statement = $db->prepare($queryUser);
                $statement->bindValue(':first_name', '%'.$first_name.'%');
                $statement->bindValue(':last_name', '%'.$last_name.'%');
                $statement->execute();

                $users = array();

                foreach ($statement as $row) {
                $user = new User($row['ID'], 
                                 $row['firstName'], 
                                 $row['lastName']);
                $users[]=$user;
                }
                return $users;
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                Database::display_db_error($error_message);
            }
        }else{
            $queryUser = 'SELECT ID, firstName , lastName FROM user
              WHERE firstName like :first_name';
            try{
                $statement = $db->prepare($queryUser);
                $statement->bindValue(':first_name', '%'.$first_name.'%');
                $statement->execute();
                
                
                $users = array();

                foreach ($statement as $row) {
                $user = new User($row['ID'], 
                                 $row['firstName'], 
                                 $row['lastName']);
                $users[]=$user;
                }
                return $users;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                Database::display_db_error($error_message);
            }
        }
    }
}
