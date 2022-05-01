<?php
// Sample JSON call for PHP.

//$json = file_get_contents('https://api.pokemontcg.io/v2/cards/ex9-4');
//$objBig= json_decode($json);
//$obj = $objBig[0];
//echo $obj;

// URL to get a specific card:  https://api.pokemontcg.io/v2/cards/ex9-4
// URL to get all cards

// https://api.pokemontcg.io/v2/cards



// Get a single card based on the ID:   ex9-4
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Get a single card based on the ID:
curl_setopt($ch, CURLOPT_URL, 'https://api.pokemontcg.io/v2/cards/ex9-4');

$singleCard = curl_exec($ch);
curl_close($ch);

$cardObject = json_decode($singleCard);
echo '<br>The card name: '. $cardObject->data->name;
echo '<br><br> Now get all the cards';




// Get all the cards, this returns an array of 250 cards

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.pokemontcg.io/v2/cards');
$allCards = curl_exec($ch);
curl_close($ch);


$obj = json_decode($allCards);
//echo $obj->data->name;
foreach ($obj->data as $card){
    echo '<br>';
    echo $card->name . '</br>';
    echo $card->id . '</br>';
    echo $card->supertype . '</br>';
   // echo $card->level . '</br>';
    echo $card->hp . '</br>';
    
 
}

?>

