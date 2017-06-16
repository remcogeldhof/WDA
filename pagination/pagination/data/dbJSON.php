<?php


//include_once("./model/product.php");
//include_once("db.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["offset"]) && isset($_POST["amount"])){
        //TODO: offset en amt gebruiken
        echo json_encode(Db::GetAll($_POST["offset"], $_POST["amount"]));
    }
}

class Db{
    public static function getAll($offset, $amount){
        $res = array();
        for($i = $offset; $i < $offset+$amount; $i++){
            $p = new Product("product " . (string)$i, $i*20);
            
            $res[] = $p;
            
        }
        
        //echo $res[98]->name;
        return $res;
    }
}

class Product{
    public $name;
    public $price;
    
    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;
    }
}


?>