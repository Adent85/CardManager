<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of card
 * The function __construct controls the flow of the code by calling for the correct constructor based on the number of arguments passed into the class allowing for multiple constructors
 * To use generate a constructor with the desired attributes. Add the number of attributes to the end of the construct function.
 * EX. public function __construct3(){} A constructor that takes three arguments and instantiates the object
 * @author Kyle Fisk 
 */
class card {
    
    private $id, $name, $description, $deckTypeID, $attributeId, $attribute1, $attributeId2, $attribute2, $attributeId3, $attribute3, $attributeId4, $attribute4, $attributeId5, $attribute5, $cardPicture, $active;
    
    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    
//    public function __construct($id, $name, $description, $deckTypeID, $attributeId, $attribute1, $attributeId2, $attribute2, $attributeId3, $attribute3, $attributeId4, $attribute4, $attributeId5, $attribute5, $cardPicture, $active) {
//        $this->id = $id;
//        $this->name = $name;
//        $this->description = $description;
//        $this->deckTypeID = $deckTypeID;
//        $this->attributeId = $attributeId;
//        $this->attribute1 = $attribute1;
//        $this->attributeId2 = $attributeId2;
//        $this->attribute2 = $attribute2;
//        $this->attributeId3 = $attributeId3;
//        $this->attribute3 = $attribute3;
//        $this->attributeId4 = $attributeId4;
//        $this->attribute4 = $attribute4;
//        $this->attributeId5 = $attributeId5;
//        $this->attribute5 = $attribute5;
//        $this->cardPicture = $cardPicture;
//        $this->active = $active;
//    }use this as a template to instantiate the object with desired variables, remove as needed
    
    public function __construct4($id, $name, $description, $cardPicture) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->cardPicture = $cardPicture;
    }

    public function __construct11($id, $name, $description, $deckTypeID, $attributeId, $attributeId2, $attributeId3, $attributeId4, $attributeId5, $cardPicture, $active) {
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
        public function __construct16($id, $name, $description, $deckTypeID, $attributeId, $attribute1, $attributeId2, $attribute2, $attributeId3, $attribute3, $attributeId4, $attribute4, $attributeId5, $attribute5, $cardPicture, $active) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->deckTypeID = $deckTypeID;
        $this->attributeId = $attributeId;
        $this->attribute1 = $attribute1;
        $this->attributeId2 = $attributeId2;
        $this->attribute2 = $attribute2;
        $this->attributeId3 = $attributeId3;
        $this->attribute3 = $attribute3;
        $this->attributeId4 = $attributeId4;
        $this->attribute4 = $attribute4;
        $this->attributeId5 = $attributeId5;
        $this->attribute5 = $attribute5;
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

    public function getAttribute1() {
        return $this->attribute1;
    }

    public function getAttribute2() {
        return $this->attribute2;
    }

    public function getAttribute3() {
        return $this->attribute3;
    }

    public function getAttribute4() {
        return $this->attribute4;
    }

    public function getAttribute5() {
        return $this->attribute5;
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

    public function setAttribute1($attribute1): void {
        $this->attribute1 = $attribute1;
    }

    public function setAttribute2($attribute2): void {
        $this->attribute2 = $attribute2;
    }

    public function setAttribute3($attribute3): void {
        $this->attribute3 = $attribute3;
    }

    public function setAttribute4($attribute4): void {
        $this->attribute4 = $attribute4;
    }

    public function setAttribute5($attribute5): void {
        $this->attribute5 = $attribute5;
    }



}
            
    
    