<?php
spl_autoload_register(function($class){
    require_once ('library/'.$class.'.php');
});

$type = $_POST['type'];
$productClass = new $type();
$productClass->save();

header('Location: index.php');