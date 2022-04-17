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
    
    public static function  getUserRoleIdFromSession(){
       $roleID = 0;
       // Look at the session and see if we are
       // 0: Not Logged in
       // 1: End User
       // 2: Administrator
      
       // See if we have a session
       if(isset($_SESSION['user'])){
           $roleID = $_SESSION['user']->getUserRoleID();
           // 1: End User, 2: Administroat
          
       }
       return $roleID;        
   }
   public static function getDeckImage($deckTypeID) {
       $deckImage = null;
       
       if($deckTypeID == 1){
           $deckImage = "pokemon_card_backside_in_high_resolution_by_atomicmonkeytcg_dah43cy-fullview";
       }
       return $deckImage;
   }
   
   public static function createEmailCookie(){
        $name = 'email';
        $value = filter_input(INPUT_POST, 'inputEmail');
        $expire = strtotime('+1 year');
        $path = '/';
        setcookie($name,$value,$expire,$path);
    }
    public static function createPasswordCookie(){
        $name = 'password';
        $value = filter_input(INPUT_POST, 'inputPassword');
        $expire = strtotime('+1 year');
        $path = '/';
        setcookie($name,$value,$expire,$path);
    }

    public static function createRememberCookie() {
        $name = 'remember';
        $value = true;
        $expire = strtotime('+1 year');
        $path = '/';
        setcookie($name,$value,$expire,$path);
    }

}
