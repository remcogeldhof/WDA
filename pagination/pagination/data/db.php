<?php
include_once("./model/Product.php");

class Db{
    public static function getAll(){
        $res = array();
        for($i = 0; $i < 200; $i++){
            $p = new Product("product " . (string)$i, $i*20);
            
            $res[] = $p;
            
        }
        
        //echo $res[98]->name;
        return $res;
    }
}

?>