<?php

/*
 * 
 * Copyright Apr 3, 2022 Kyle Fisk
 * 
 */

/**
 * Description of card_attribute
 *
 * @author Kyle Fisk 
 */
class card_attribute {
    
    private $ID, $name, $description, $value;
    
    public function __construct($ID, $name, $description, $value) {
        $this->ID = $ID;
        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
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

    public function getValue() {
        return $this->value;
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

    public function setValue($value): void {
        $this->value = $value;
    }



}
