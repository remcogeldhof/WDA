<?php

class Product {
    public $productId;
    public $naam;
    public $merk;
    public $prijs;
    public $beschrijving;
    public $categorie;
    public $foto;
    
    public function __construct($productId, $naam, $merk, $prijs, $beschrijving, $foto, $categorie) {
        $this->productId = $productId;
        $this->naam = $naam;
        $this->merk = $merk;
        $this->prijs = $prijs;
        $this->beschrijving = $beschrijving;
        $this->foto = $foto;
        $this->categorie = $categorie;

    }
}
