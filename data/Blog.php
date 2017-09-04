<?php

class Blog {
    public $blogID;
    public $auteurID;
    public $titel;
    public $categorie;
    public $datum;
    public $foto;
    public $tekst;

    public function __construct($blogID, $auteurID, $titel, $categorie, $datum, $foto, $tekst) {
        $this->blogID = $blogID;
        $this->auteurID = $auteurID;
        $this->titel = $titel;
        $this->categorie = $categorie;
        $this->datum = $datum;
        $this->foto = $foto;
        $this->tekst = $tekst;

    }
}
