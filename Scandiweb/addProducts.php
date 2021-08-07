<?php
spl_autoload_register(function($class){
    require_once ('library/'.$class.'.php');
});


if(!empty($_POST['size'])){
    $productDvd = new ProductDvd();
    $productDvd->setSku($_POST['sku']);
    $productDvd->setName($_POST['name']);
    $productDvd->setPrice($_POST['price']);
    $productDvd->setSize($_POST['size']);

    $productDvd->insertProducts();

}else if(!empty($_POST['height'])){
    $productFurniture = new ProductFurniture();
    $productFurniture->setSku($_POST['sku']);
    $productFurniture->setName($_POST['name']);
    $productFurniture->setPrice($_POST['price']);
    $productFurniture->setHeight($_POST['height']);
    $productFurniture->setWidth($_POST['width']);
    $productFurniture->setLength($_POST['length']);

    $productFurniture->insertProducts();

}else if(!empty($_POST['weight'])){
    $productBook = new ProductBook();
    $productBook->setSku($_POST['sku']);
    $productBook->setName($_POST['name']);
    $productBook->setPrice($_POST['price']);
    $productBook->setWeight($_POST['weight']);

    $productBook->insertProducts();

}

header('Location: index.php');