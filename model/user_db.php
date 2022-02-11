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
    public static function userLogin($email,$password){
        $db = Database::getDB();
        $queryUser = 'SELECT * FROM user
                      WHERE email = :email
                      AND password = :password';
        $statement = $db->prepare($queryUser);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if($row==false){
            $user = false;
            return $user;
        }else{
        $user = new User($row['firstName'], 
                         $row['lastName'], 
                         $row['email'],                           
                         $row['password'], 
                         $row['userRoleID'],
                         $row['active']);
        $user->setID($row['ID']);
//        $user->getActiveString();
        return $user;
        }
    }
    
    public static function insertUserData($user){
        $db = Database::getDB();
        $query = 'INSERT INTO user
                 (firstName, lastName, email, password, userRoleID)
              VALUES
                 (:first_name, :last_name, :email, :password, :user_role_id)';

        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $user->getFirstName());
        $statement->bindValue(':last_name', $user->getLastName());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());
        $statement->bindValue(':user_role_id', $user->getUserRoleId());
        $statement->execute();
        $ID= $db->lastInsertId(); 
        $statement->closeCursor();
        return $ID;
    }
}
