<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of user
 * The function __construct controls the flow of the code by calling for the correct constructor based on the number of arguments passed into the class allowing for multiple constructors
 * To use generate a constructor with the desired attributes. Add the number of attributes to the end of the construct function.
 *  EX. public function __construct3(){} A constructor that takes three arguments and instantiates the object
 * @author Kyle Fisk 
 */
class user {
    
    private $id, $firstName, $lastName, $email, $password, $userRoleId, $active, $activeString;
    
    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    
//    public function __construct#($id, $firstName, $lastName, $email, $password, $userRoleId, $active) {
//        $this->id = $id;
//        $this->firstName = $firstName;
//        $this->lastName = $lastName;
//        $this->email = $email;
//        $this->password = $password;
//        $this->userRoleId = $userRoleId;
//        $this->active = $active;
//    }use this as a template to instantiate the object with desired variables, remove as needed

    public function __construct3($id, $firstName, $lastName) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    public function __construct4($id, $firstName, $lastName, $userRoleId) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userRoleId = $userRoleId;
    }
    public function __construct5($firstName, $lastName, $email, $password, $userRoleId) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->userRoleId = $userRoleId;
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
    
    public function getActiveString() {
        return $this->activeString;
    }

    public function setActiveString($activeString): void {
        $this->activeString = $activeString;
    }

    public function activeString(): void{
        $active= $this->getActive();
        if($active == 0){
            $this->setActiveString("Disabled");
        }else{
            $this->setActiveString("Active");
        }
    }
}

