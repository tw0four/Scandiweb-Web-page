<?php

class ProductDvd extends MainProductClass
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

    public function insertProducts(){
        $database = new DataBase();
        $table = $database->getTable();

        $sql = "INSERT INTO $table(sku, name, price, size) VALUES('" . $this->getSku() . "','" . $this->getName() . "','" . $this->getPrice() . "','".$this->getSize(). "')";
        $conn = $database->getConnection();
        $conn->query($sql);

        $conn->close();
    }

    public function showProducts($result){
        if($result !== false && $result->num_rows > 0){
            $id = $this->getId();
            echo "<div class='container'>
                    <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                        <div class='content'>
                            <div class='sku'>"
                .$this->getSku().
                "</div>
                            <div class='name'>"
                .$this->getName().
                "</div>
                            <div class='price'>"
                .$this->getPrice().
                "$</div>
                            <div class='size'>Size: "
                .$this->getSize().
                "MB</div>
                            </div>
                        </div>";
        }
    }
}