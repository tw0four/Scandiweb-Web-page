<?php
spl_autoload_register(function($class){
    require_once ('library/'.$class.'.php');
});

if(isset($_POST['delete'])){
    $database = new DataBase();
    $conn = $database->getConnection();

    $test = new DVD();
    $table = $test->getTable();

    foreach($_POST['checkbox'] as $id){
        $sql = "DELETE FROM $table WHERE id=".$id;
        $conn->query($sql);
    }
    $conn->close();
    header("Location:index.php");
}
