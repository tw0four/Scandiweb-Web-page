<?php
abstract class MainProductClass
{
    private $sku, $name, $price;
    private $size;
    private $weight;
    private $height, $width, $length;

    private $table = "products";


    public function setSku($sku){
        $this->sku=$sku;
    }
    public function getSku(){
        return $this->sku;
    }

    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }

    public function setPrice($price){
        $this->price=$price;
    }
    public function getPrice(){
        return $this->price;
    }

    public function setWeight($weight){
        $this->weight=$weight;
    }
    public function getWeight(){
        return $this->weight;
    }

    public function setSize($size){
        $this->size=$size;
    }
    public function getSize(){
        return $this->size;
    }

    public function setHeight($height){
        $this->height=$height;
    }
    public function getHeight(){
        return $this->height;
    }

    public function setWidth($width){
        $this->width=$width;
    }
    public function getWidth(){
        return $this->width;
    }

    public function setLength($length){
        $this->length=$length;
    }
    public function getLength(){
        return $this->length;
    }

    public function getTable(){
        return $this->table;
    }

    public function getAll(){
        return "SELECT * FROM $this->table";
    }

    abstract public function insertProducts();

    abstract public function save();

    public function delete(){
        if(isset($_POST['delete'])){
            $database = new DataBase();
            $conn = $database->getConnection();

            $table = $this->getTable();

            foreach($_POST['checkbox'] as $id){
                $sql = "DELETE FROM $table WHERE id=".$id;
                $conn->query($sql);
            }
            $conn->close();
            header("Location: index.php");
        }
    }

    public function showProducts(){
        $database = new DataBase();

        $sql = $this->getAll();
        $conn = $database->getConnection();
        $result = $conn->query($sql);

        foreach ($result as $product){
            if($product['size'] != null){
                $id = $product['id'];

                echo "<div class='container'>
                    <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                        <div class='content'>
                            <div class='sku'>"
                    .$product['sku'].
                    "</div>
                            <div class='name'>"
                    .$product['name'].
                    "</div>
                            <div class='price'>"
                    .$product['price'].
                    "$</div>
                            <div class='size'>Size: "
                    .$product['size'].
                    "MB</div>
                            </div>
                        </div>";
            }else if($product['height'] !=null && $product['width'] !=null && $product['length'] !=null){
                $id = $product['id'];

                echo "<div class='container'>
                        <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                            <div class='content'>
                                <div class='sku'>"
                    .$product['sku'].
                    "</div>
                                <div class='name'>"
                    .$product['name'].
                    "</div>
                                <div class='price'>"
                    .$product['price'].
                    "$</div>
                                <div class='dimension'>Dimension: "
                    .$product['height']."x".$product['width']."x".$product['length'].
                    "</div>
                            </div>
                          </div>";
            }else if($product['weight'] != null){
                $id = $product['id'];

                echo "<div class='container'>
                        <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                            <div class='content'>
                                <div class='sku'>"
                    .$product['sku'].
                    "</div>
                                <div class='name'>"
                    .$product['name'].
                    "</div>
                                <div class='price'>"
                    .$product['price'].
                    "$</div>
                                <div class='weight'>Weight: "
                    .$product['weight'].
                    "KG</div>
                                </div>
                            </div>";
            }
        }
    }

}