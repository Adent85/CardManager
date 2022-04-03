<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of user
 *
 * @author Kyle Fisk 
 */
class user {
    
    private $id, $firstName, $lastName, $email, $password, $userRoleId, $active;
    
    public function __construct()// this function controls the flow of the code by calling for the correct constructor based on the number of arguments passed into the class
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    
    public function __construct3($id, $firstName, $lastName) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    public function __construct6($firstName, $lastName, $email, $password, $userRoleId, $active) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->userRoleId = $userRoleId;
        $this->active = $active;
    }
    
    public function getID() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUserRoleId() {
        return $this->userRoleId;
    }

    public function getActive() {
        return $this->active;
    }

    public function setID($id): void {
        $this->id = $id;
    }

    public function setFirstName($firstName): void {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName): void {
        $this->lastName = $lastName;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setUserRoleId($userRoleId): void {
        $this->userRoleId = $userRoleId;
    }

    public function setActive($active): void {
        $this->active = $active;
    }
            
}

