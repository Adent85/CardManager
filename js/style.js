/* 
 * 
 * Copyright Apr 2, 2022 Kyle Fisk
 * 
 */
import pokemon from 'pokemontcgsdk'

pokemon.configure({apiKey: '1949bf3e-c0cd-43f7-8a01-651fcc936315'});

pokemon.card.find('base1-4')
.then(card => {
console.log(card.name); // "Charizard"
});
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
    });  
    
});


