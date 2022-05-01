<?php
/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of card_db
 *
 * @author Kyle Fisk 
 */

class card_db {
    
    public static function getAllPokemonCards($pageNumber) {
        
        $ch = Database::pokemonApiCall();
        
        curl_setopt($ch, CURLOPT_URL, 'https://api.pokemontcg.io/v2/cards?page='.$pageNumber.'&pageSize=10');
        $allCards = curl_exec($ch); 
        curl_close($ch);
        $arr = json_decode($allCards, true);
        
        $pokemonCards = array();
        
        foreach ($arr['data'] as $c){
            if(empty($c['attacks'])){
                $card = new card($c['id'], $c['name'] , 1, $c['hp'], new card_attribute('None', 'None', 'None'), $c['images']['small']);
            }else{
                $card = new card($c['id'], $c['name'] , 1, $c['hp'],
                    new card_attribute($c['attacks'][0]['name'], $c['attacks'][0]['text'], 
                    $c['attacks'][0]['damage']), $c['images']['small']);
            }
            
            
            $pokemonCards[] = $card;
        }
        
        return $pokemonCards;
    }
    
    public static function getPokemonCardById($cardID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Get a single card based on the ID:
        curl_setopt($ch, CURLOPT_URL, 'https://api.pokemontcg.io/v2/cards/'.$cardID);

        $singleCard = curl_exec($ch);
        curl_close($ch);

        $cardarr = json_decode($singleCard, true);
        
        if(empty($cardarr['data']['attacks'])){
                $card = new card($cardarr['data']['id'], $cardarr['data']['name'] , 1, $cardarr['data']['hp'], new card_attribute('None', 'None', 'None'), $cardarr['data']['images']['small']);
        }else{
            $card = new card($cardarr['data']['id'], $cardarr['data']['name'] , 1, $cardarr['data']['hp'],
                new card_attribute($cardarr['data']['attacks'][0]['name'], $cardarr['data']['attacks'][0]['text'], 
                $cardarr['data']['attacks'][0]['damage']), $cardarr['data']['images']['small']);
        }
        
        return $card;
    }
    
}
