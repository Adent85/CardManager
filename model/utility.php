<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of Utility
 *
 * @author Kyle Fisk 
 */
class utility {
    
    public static function  getUserIdFromSession(){
       $userID = 0;
       // Look at the session and see if we are
       // 0: Not Logged in
       // 1: End User
       // 2: Administrator
      
       // See if we have a session
       if(isset($_SESSION['user'])){
           $userID = $_SESSION['user']->getID();
           // 1: End User, 2: Administroat
          
       }
       return $userID;     
   }
   public static function getDeckImage($deckTypeID) {
       $deckImage = null;
       
       if($deckTypeID == 1){
           $deckImage = "pokemon_card_backside_in_high_resolution_by_atomicmonkeytcg_dah43cy-fullview";
       }
       return $deckImage;
   }
}
