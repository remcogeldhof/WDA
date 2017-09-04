<?php

function getVeldWaarde($naamVeld) {
    return $_POST[$naamVeld];
}

function getFotopath($naamVeld){
    if(isset($_FILES[$naamVeld])){
    $name_file = $_FILES[$naamVeld]['name'];
    $tmp_name = $_FILES[$naamVeld]['tmp_name'];
    $local_image = "images/";
    move_uploaded_file($tmp_name, $local_image.$name_file);
} 
    return $name_file;
}



?>
