<?php
require pokemon-tcg/pokemon-tcg-sdk-php;
Pokemon::Options(['verify' => true]);
Pokemon::ApiKey('1949bf3e-c0cd-43f7-8a01-651fcc936315');
/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of card_db
 *
 * @author Kyle Fisk 
 * https://dev.pokemontcg.io/
 * API Key:1949bf3e-c0cd-43f7-8a01-651fcc936315
 * https://github.com/PokemonTCG/pokemon-tcg-sdk-php.git
 */

class card_db {
    
    public static function getAllCards() {
        $cards = new Card(Pokemon::Card()->all());
        
        return $cards;
    }
}
