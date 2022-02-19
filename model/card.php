<?php

/*
 * 
 * Copyright Jan 28, 2022 Kyle Fisk
 * 
 */

/**
 * Description of card
 *
 * @author Kyle Fisk 
 */
class card {
    
    private $id, $name, $supertype, $subtypes, $level, $hp, $types, $evolvesFrom,
            $evolvesTo, $rules, $ancientTrait, $abilities, $attacks, $weaknesses,
            $resistances, $retreatCost, $convertedRetreatCost, $set, $number, 
            $artist, $rarity, $flavorText, $nationalPokedexNumbers, $legalities,
            $regulationMark, $images, $tcgplayer, $cardmarket;
    
    public function __construct($id, $name, $supertype, $subtypes, $level, $hp, $types, $evolvesFrom, $evolvesTo, $rules, $ancientTrait, $abilities, $attacks, $weaknesses, $resistances, $retreatCost, $convertedRetreatCost, $set, $number, $artist, $rarity, $flavorText, $nationalPokedexNumbers, $legalities, $regulationMark, $images, $tcgplayer, $cardmarket) {
        $this->id = $id;
        $this->name = $name;
        $this->supertype = $supertype;
        $this->subtypes = $subtypes;
        $this->level = $level;
        $this->hp = $hp;
        $this->types = $types;
        $this->evolvesFrom = $evolvesFrom;
        $this->evolvesTo = $evolvesTo;
        $this->rules = $rules;
        $this->ancientTrait = $ancientTrait;
        $this->abilities = $abilities;
        $this->attacks = $attacks;
        $this->weaknesses = $weaknesses;
        $this->resistances = $resistances;
        $this->retreatCost = $retreatCost;
        $this->convertedRetreatCost = $convertedRetreatCost;
        $this->set = $set;
        $this->number = $number;
        $this->artist = $artist;
        $this->rarity = $rarity;
        $this->flavorText = $flavorText;
        $this->nationalPokedexNumbers = $nationalPokedexNumbers;
        $this->legalities = $legalities;
        $this->regulationMark = $regulationMark;
        $this->images = $images;
        $this->tcgplayer = $tcgplayer;
        $this->cardmarket = $cardmarket;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSupertype() {
        return $this->supertype;
    }

    public function getSubtypes() {
        return $this->subtypes;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getHp() {
        return $this->hp;
    }

    public function getTypes() {
        return $this->types;
    }

    public function getEvolvesFrom() {
        return $this->evolvesFrom;
    }

    public function getEvolvesTo() {
        return $this->evolvesTo;
    }

    public function getRules() {
        return $this->rules;
    }

    public function getAncientTrait() {
        return $this->ancientTrait;
    }

    public function getAbilities() {
        return $this->abilities;
    }

    public function getAttacks() {
        return $this->attacks;
    }

    public function getWeaknesses() {
        return $this->weaknesses;
    }

    public function getResistances() {
        return $this->resistances;
    }

    public function getRetreatCost() {
        return $this->retreatCost;
    }

    public function getConvertedRetreatCost() {
        return $this->convertedRetreatCost;
    }

    public function getSet() {
        return $this->set;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function getRarity() {
        return $this->rarity;
    }

    public function getFlavorText() {
        return $this->flavorText;
    }

    public function getNationalPokedexNumbers() {
        return $this->nationalPokedexNumbers;
    }

    public function getLegalities() {
        return $this->legalities;
    }

    public function getRegulationMark() {
        return $this->regulationMark;
    }

    public function getImages() {
        return $this->images;
    }

    public function getTcgplayer() {
        return $this->tcgplayer;
    }

    public function getCardmarket() {
        return $this->cardmarket;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setSupertype($supertype): void {
        $this->supertype = $supertype;
    }

    public function setSubtypes($subtypes): void {
        $this->subtypes = $subtypes;
    }

    public function setLevel($level): void {
        $this->level = $level;
    }

    public function setHp($hp): void {
        $this->hp = $hp;
    }

    public function setTypes($types): void {
        $this->types = $types;
    }

    public function setEvolvesFrom($evolvesFrom): void {
        $this->evolvesFrom = $evolvesFrom;
    }

    public function setEvolvesTo($evolvesTo): void {
        $this->evolvesTo = $evolvesTo;
    }

    public function setRules($rules): void {
        $this->rules = $rules;
    }

    public function setAncientTrait($ancientTrait): void {
        $this->ancientTrait = $ancientTrait;
    }

    public function setAbilities($abilities): void {
        $this->abilities = $abilities;
    }

    public function setAttacks($attacks): void {
        $this->attacks = $attacks;
    }

    public function setWeaknesses($weaknesses): void {
        $this->weaknesses = $weaknesses;
    }

    public function setResistances($resistances): void {
        $this->resistances = $resistances;
    }

    public function setRetreatCost($retreatCost): void {
        $this->retreatCost = $retreatCost;
    }

    public function setConvertedRetreatCost($convertedRetreatCost): void {
        $this->convertedRetreatCost = $convertedRetreatCost;
    }

    public function setSet($set): void {
        $this->set = $set;
    }

    public function setNumber($number): void {
        $this->number = $number;
    }

    public function setArtist($artist): void {
        $this->artist = $artist;
    }

    public function setRarity($rarity): void {
        $this->rarity = $rarity;
    }

    public function setFlavorText($flavorText): void {
        $this->flavorText = $flavorText;
    }

    public function setNationalPokedexNumbers($nationalPokedexNumbers): void {
        $this->nationalPokedexNumbers = $nationalPokedexNumbers;
    }

    public function setLegalities($legalities): void {
        $this->legalities = $legalities;
    }

    public function setRegulationMark($regulationMark): void {
        $this->regulationMark = $regulationMark;
    }

    public function setImages($images): void {
        $this->images = $images;
    }

    public function setTcgplayer($tcgplayer): void {
        $this->tcgplayer = $tcgplayer;
    }

    public function setCardmarket($cardmarket): void {
        $this->cardmarket = $cardmarket;
    }


}
