<?php
spl_autoload_register(function($class){
    require_once ('library/'.$class.'.php');
});

$database = new DataBase();

$test = new DVD();
$table = $test->getTable();

$sql = $database->getAll();
$conn = $database->getConnection();
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row['size'] != null){
            $dvd = new DVD();

            $dvd->setId($row['id']);
            $id = $dvd->getId();

            echo "<div class='container'>
                    <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                        <div class='content'>
                            <div class='sku'>"
                                .$row['sku'].
                            "</div>
                            <div class='name'>"
                                .$row['name'].
                            "</div>
                            <div class='price'>"
                                .$row['price'].
                            "$</div>
                            <div class='size'>Size: "
                                .$row['size'].
                            "MB</div>
                            </div>
                        </div>";
        }else if($row['height'] !=null && $row['width'] !=null && $row['length'] !=null){
            $furniture = new Furniture();

            $furniture->setId($row['id']);
            $id = $furniture->getId();

            echo "<div class='container'>
                        <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                            <div class='content'>
                                <div class='sku'>"
                                    .$row['sku'].
                                "</div>
                                <div class='name'>"
                                    .$row['name'].
                                "</div>
                                <div class='price'>"
                                    .$row['price'].
                                "$</div>
                                <div class='dimension'>Dimension: "
                                    .$row['height']."x".$row['width']."x".$row['length'].
                                "</div>
                            </div>
                          </div>";
        }else if($row['weight'] != null){
            $book = new Book();

            $book->setId($row['id']);
            $id = $book->getId();

                echo "<div class='container'>
                        <input type='checkbox' class='delete-checkbox' name='checkbox[]' value='$id'>
                            <div class='content'>
                                <div class='sku'>"
                                    .$row['sku'].
                                "</div>
                                <div class='name'>"
                                    .$row['name'].
                                "</div>
                                <div class='price'>"
                                    .$row['price'].
                                "$</div>
                                <div class='weight'>Weight: "
                                    .$row['weight'].
                                "KG</div>
                                </div>
                            </div>";
        }
    }
}

