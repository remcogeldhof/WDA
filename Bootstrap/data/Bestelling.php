<?php

class Bestelling {
    public $bestellingId;
    public $factuuradresId;
    public $leveringsadresId;
    public $klantId;
    public $betaalmethode;
    public $totaal;
    
    public function __construct($bestellingId, $factuuradresId, $leveringsadresId, $klantId, $betaalmethode, $totaal){
        
        $this->bestellingId = $bestellingId;
        $this->factuuradresId = $factuuradresId;
        $this->leveringsadresId = $leveringsadresId;
        $this->klantId = $klantId;
        $this->betaalmethode = $betaalmethode;
        $this->totaal = $totaal;
    }
}

?>