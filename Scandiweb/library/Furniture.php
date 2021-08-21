<?php

class Furniture extends MainProductClass
{
    private $id;
    private $sku;
    private $name;
    private $price;
    private $height;
    private $width;
    private $length;

    function setId($id){
        $this->id=$id;
    }

    function getId(){
        return $this->id;
    }

    function setSku($sku){
        $this->sku=$sku;
    }

    function getSku(){
        return $this->sku;
    }

    function setName($name){
        $this->name=$name;
    }

    function getName(){
        return $this->name;
    }

    function setPrice($price){
        $this->price=$price;
    }

    function getPrice(){
        return $this->price;
    }

    function setHeight($height){
        $this->height=$height;
    }

    function getHeight(){
        return $this->height;
    }

    function setWidth($width){
        $this->width=$width;
    }

    function getWidth(){
        return $this->width;
    }

    function setLength($length){
        $this->length=$length;
    }

    function getLength(){
        return $this->length;
    }

    public function getTable(){
        $database = new DataBase();
        return $database->table;
    }

    public function save()
    {
        $this->setSku($_POST['sku']);
        $this->setName($_POST['name']);
        $this->setPrice($_POST['price']);
        $this->setHeight($_POST['height']);
        $this->setWidth($_POST['width']);
        $this->setLength($_POST['length']);

        $database = new DataBase();
        $table = $this->getTable();

        $sql = "SELECT * FROM $table WHERE sku ='".$this->getSku()."'";
        $conn = $database->getConnection();
        $result = $conn->query($sql);

        if($result->num_rows == 0){
            $this->insertProducts();
        }
    }

    public function insertProducts(){
        $database = new DataBase();
        $table = $this->getTable();

        $sql = "INSERT INTO $table(sku, name, price, height, width, length) VALUES('" . $this->getSku() . "','" . $this->getName() . "','" . $this->getPrice() . "','".$this->getHeight(). "','".$this->getWidth(). "','".$this->getLength(). "')";
        $conn = $database->getConnection();
        $conn->query($sql);

        $conn->close();

    }
}