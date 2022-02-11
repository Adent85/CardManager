<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of card
 *
 * @author Kyle Fisk 
 */
class card {
    
    private $ID, $name, $description, $deckID, $attributeID, $attributeID2, $attributeID3, $attributeID4, $attributeID5, $cardPicture, $active;
    
    public function __construct($ID, $name, $description, $deckID, $attributeID) {
        $this->ID = $ID;
        $this->name = $name;
        $this->description = $description;
        $this->deckID = $deckID;
        $this->attributeID = $attributeID;
    }

    public function getID() {
        return $this->ID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDeckID() {
        return $this->deckID;
    }

    public function getAttributeID() {
        return $this->attributeID;
    }

    public function getAttributeID2() {
        return $this->attributeID2;
    }

    public function getAttributeID3() {
        return $this->attributeID3;
    }

    public function getAttributeID4() {
        return $this->attributeID4;
    }

    public function getAttributeID5() {
        return $this->attributeID5;
    }

    public function getCardPicture() {
        return $this->cardPicture;
    }

    public function getActive() {
        return $this->active;
    }

    public function setID($ID): void {
        $this->ID = $ID;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setDeckID($deckID): void {
        $this->deckID = $deckID;
    }

    public function setAttributeID($attributeID): void {
        $this->attributeID = $attributeID;
    }

    public function setAttributeID2($attributeID2): void {
        $this->attributeID2 = $attributeID2;
    }

    public function setAttributeID3($attributeID3): void {
        $this->attributeID3 = $attributeID3;
    }

    public function setAttributeID4($attributeID4): void {
        $this->attributeID4 = $attributeID4;
    }

    public function setAttributeID5($attributeID5): void {
        $this->attributeID5 = $attributeID5;
    }

    public function setCardPicture($cardPicture): void {
        $this->cardPicture = $cardPicture;
    }

    public function setActive($active): void {
        $this->active = $active;
    }


}
