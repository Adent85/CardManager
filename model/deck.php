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
    
    private $ID, $userID, $name, $description, $deckImage, $deckTypeID, $totalCards, $active;
    
    public function __construct($ID, $userID, $name, $description, $deckTypeID, $totalCards, $active) {
        $this->ID = $ID;
        $this->userID = $userID;
        $this->name = $name;
        $this->description = $description;
        $this->deckTypeID = $deckTypeID;
        $this->totalCards = $totalCards;
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

    public function getDeckImage() {
        return $this->deckImage;
    }

    public function getDeckTypeID() {
        return $this->deckTypeID;
    }

    public function getTotalCards() {
        return $this->totalCards;
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

    public function setDeckImage($deckImage): void {
        $this->deckImage = $deckImage;
    }

    public function setDeckTypeID($deckTypeID): void {
        $this->deckTypeID = $deckTypeID;
    }

    public function setTotalCards($totalCards): void {
        $this->totalCards = $totalCards;
    }

    public function setActive($active): void {
        $this->active = $active;
    }


}
