<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of trade_card
 * The function __construct controls the flow of the code by calling for the correct constructor based on the number of arguments passed into the class allowing for multiple constructors
 * To use generate a constructor with the desired attributes. Add the number of attributes to the end of the construct function.
 *  EX. public function __construct3(){} A constructor that takes three arguments and instantiates the object
 * @author Kyle Fisk 
 */
class trade_request {
    
    private  $ID, $trade_recipient_card, $trade_recipient_deck, $trade_initiator_id, $trade_initiator_card1, $trade_initiator_card2, $trade_initiator_deck1, $trade_initiator_deck2;
    
    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

//    public function __construct#($ID, $trade_recipient_card, $trade_recipient_deck, $trade_initiator_id, $trade_initiator_card1, $trade_initiator_card2, $trade_initiator_deck1, $trade_initiator_deck2) {
//        $this->ID = $ID;
//        $this->trade_recipient_card = $trade_recipient_card;
//        $this->trade_recipient_deck = $trade_recipient_deck;
//        $this->trade_initiator_id = $trade_initiator_id;
//        $this->trade_initiator_card1 = $trade_initiator_card1;
//        $this->trade_initiator_card2 = $trade_initiator_card2;
//        $this->trade_initiator_deck1 = $trade_initiator_deck1;
//        $this->trade_initiator_deck2 = $trade_initiator_deck2;
//    }use this as a template to instantiate the object with desired variables, remove as needed

    public function __construct3($trade_recipient_card, $trade_recipient_deck, $trade_initiator_id) {
        $this->trade_recipient_card = $trade_recipient_card;
        $this->trade_recipient_deck = $trade_recipient_deck;
        $this->trade_initiator_id = $trade_initiator_id;
    }
    
    public function __construct8($ID, $trade_recipient_card, $trade_recipient_deck, $trade_initiator_id, $trade_initiator_card1, $trade_initiator_deck1, $trade_initiator_card2, $trade_initiator_deck2) {
    $this->ID = $ID;
    $this->trade_recipient_card = $trade_recipient_card;
    $this->trade_recipient_deck = $trade_recipient_deck;
    $this->trade_initiator_id = $trade_initiator_id;
    $this->trade_initiator_card1 = $trade_initiator_card1;
    $this->trade_initiator_card2 = $trade_initiator_card2;
    $this->trade_initiator_deck1 = $trade_initiator_deck1;
    $this->trade_initiator_deck2 = $trade_initiator_deck2;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getTrade_recipient_card() {
        return $this->trade_recipient_card;
    }

    public function getTrade_recipient_deck() {
        return $this->trade_recipient_deck;
    }

    public function getTrade_initiator_id() {
        return $this->trade_initiator_id;
    }

    public function getTrade_initiator_card1() {
        return $this->trade_initiator_card1;
    }

    public function getTrade_initiator_card2() {
        return $this->trade_initiator_card2;
    }

    public function getTrade_initiator_deck1() {
        return $this->trade_initiator_deck1;
    }

    public function getTrade_initiator_deck2() {
        return $this->trade_initiator_deck2;
    }

    public function setID($ID): void {
        $this->ID = $ID;
    }

    public function setTrade_recipient_card($trade_recipient_card): void {
        $this->trade_recipient_card = $trade_recipient_card;
    }

    public function setTrade_recipient_deck($trade_recipient_deck): void {
        $this->trade_recipient_deck = $trade_recipient_deck;
    }

    public function setTrade_initiator_id($trade_initiator_id): void {
        $this->trade_initiator_id = $trade_initiator_id;
    }

    public function setTrade_initiator_card1($trade_initiator_card1): void {
        $this->trade_initiator_card1 = $trade_initiator_card1;
    }

    public function setTrade_initiator_card2($trade_initiator_card2): void {
        $this->trade_initiator_card2 = $trade_initiator_card2;
    }

    public function setTrade_initiator_deck1($trade_initiator_deck1): void {
        $this->trade_initiator_deck1 = $trade_initiator_deck1;
    }

    public function setTrade_initiator_deck2($trade_initiator_deck2): void {
        $this->trade_initiator_deck2 = $trade_initiator_deck2;
    }


}
