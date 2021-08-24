<?php

class Furniture extends MainProductClass
{

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