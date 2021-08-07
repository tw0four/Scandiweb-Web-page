<?php
require_once ('DataBase.php');
abstract class MainProductClass
{

    abstract public function insertProducts();

    abstract public function showProducts($result);
}