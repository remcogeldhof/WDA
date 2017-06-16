<?php

class Item {
    public $itemsId;
    public $bestellingId;
    public $productId;
 
    public function __construct($itemsId, $bestellingId, $productId){
        $this->itemsId = $itemsId;
        $this->bestellingId = $bestellingId;
        $this->productId = $productId;
    }
}

?>