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
    
    private $id, $name, $description, $deckTypeID, $attributeId, $attributeId2, $attributeId3, $attributeId4, $attributeId5, $cardPicture, $active;
    
    public function __construct($id, $name, $description, $deckTypeID, $attributeId, $attributeId2, $attributeId3, $attributeId4, $attributeId5, $cardPicture, $active) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->deckTypeID = $deckTypeID;
        $this->attributeId = $attributeId;
        $this->attributeId2 = $attributeId2;
        $this->attributeId3 = $attributeId3;
        $this->attributeId4 = $attributeId4;
        $this->attributeId5 = $attributeId5;
        $this->cardPicture = $cardPicture;
        $this->active = $active;
    }
    
    

    public function getId() {
        return $this->id;
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

    public function getAttributeId() {
        return $this->attributeId;
    }

    public function getAttributeId2() {
        return $this->attributeId2;
    }

    public function getAttributeId3() {
        return $this->attributeId3;
    }

    public function getAttributeId4() {
        return $this->attributeId4;
    }

    public function getAttributeId5() {
        return $this->attributeId5;
    }

    public function getCardPicture() {
        return $this->cardPicture;
    }

    public function getActive() {
        return $this->active;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setDeckTypeID($deckTypeID): void {
        $this->deckID = $deckTypeID;
    }

    public function setAttributeId($attributeId): void {
        $this->attributeId = $attributeId;
    }

    public function setAttributeId2($attributeId2): void {
        $this->attributeId2 = $attributeId2;
    }

    public function setAttributeId3($attributeId3): void {
        $this->attributeId3 = $attributeId3;
    }

    public function setAttributeId4($attributeId4): void {
        $this->attributeId4 = $attributeId4;
    }

    public function setAttributeId5($attributeId5): void {
        $this->attributeId5 = $attributeId5;
    }

    public function setCardPicture($cardPicture): void {
        $this->cardPicture = $cardPicture;
    }

    public function setActive($active): void {
        $this->active = $active;
    }


}
            
    
    