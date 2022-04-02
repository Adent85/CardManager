<?php

/*
 * 
 * Copyright Feb 27, 2022 Kyle Fisk
 * 
 */

/**
 * Description of deck_type
 *
 * @author Kyle Fisk 
 */
class deck_type {
    
    private $ID, $name;
    
    public function __construct($ID, $name) {
        $this->ID = $ID;
        $this->name = $name;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getName() {
        return $this->name;
    }

    public function setID($ID): void {
        $this->ID = $ID;
    }

    public function setName($name): void {
        $this->name = $name;
    }



}
