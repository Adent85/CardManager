<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of deck
 *
 * @author Kyle Fisk 
 */
class deck {
    
    private $ID, $userID, $name, $description, $deckTypeID, $active;
    
    public function __construct($userID, $name, $description, $deckTypeID, $active) {
        $this->userID = $userID;
        $this->name = $name;
        $this->description = $description;
        $this->deckTypeID = $deckTypeID;
        $this->active = $active;
    }

    public function getID() {
        return $this->ID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDeckTypeID() {
        return $this->deckTypeID;
    }

    public function getActive() {
        return $this->active;
    }

    public function setID($ID): void {
        $this->ID = $ID;
    }

    public function setUserID($userID): void {
        $this->userID = $userID;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setDeckTypeID($deckTypeID): void {
        $this->deckTypeID = $deckTypeID;
    }

    public function setActive($active): void {
        $this->active = $active;
    }


}
