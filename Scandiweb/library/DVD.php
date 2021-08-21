<?php

class DVD extends MainProductClass
{
    private $id;
    private $sku;
    private $name;
    private $price;
    private $size;

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

    function setSize($size){
        $this->size=$size;
    }

    function getSize(){
        return $this->size;
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
        $this->setSize($_POST['size']);

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

        $sql = "INSERT INTO $table(sku, name, price, size) VALUES('" . $this->getSku() . "','" . $this->getName() . "','" . $this->getPrice() . "','".$this->getSize(). "')";
        $conn = $database->getConnection();
        $conn->query($sql);

        $conn->close();
    }
}