<?php
spl_autoload_register(function($class){
    require_once ('library/'.$class.'.php');
});

$database = new DataBase();
$table = $database->getTable();

$sql = "SELECT * FROM $table";
$conn = $database->getConnection();
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row['size'] != null){
            $dvd = new ProductDvd();

            $dvd->setId($row['id']);
            $dvd->setSku($row['sku']);
            $dvd->setName($row['name']);
            $dvd->setPrice($row['price']);
            $dvd->setSize($row['size']);

            $dvd->showProducts($result);
        }else if($row['height'] !=null && $row['width'] !=null && $row['length'] !=null){
            $furniture = new ProductFurniture();

            $furniture->setId($row['id']);
            $furniture->setSku($row['sku']);
            $furniture->setName($row['name']);
            $furniture->setPrice($row['price']);
            $furniture->setHeight($row['height']);
            $furniture->setWidth($row['width']);
            $furniture->setLength($row['length']);

            $furniture->showProducts($result);
        }else if($row['weight'] != null){
            $book = new ProductBook();

            $book->setId($row['id']);
            $book->setSku($row['sku']);
            $book->setName($row['name']);
            $book->setPrice($row['price']);
            $book->setWeight($row['weight']);

            $book->showProducts($result);
        }
    }
}

