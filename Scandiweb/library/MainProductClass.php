<?php
require_once ('DataBase.php');
abstract class MainProductClass
{
    abstract public function setId($id);
    abstract public function getId();

    abstract public function setSku($sku);
    abstract public function getSku();

    abstract public function setName($name);
    abstract public function getName();

    abstract public function setPrice($price);
    abstract public function getPrice();

    abstract public function getTable();

    abstract public function insertProducts();

    abstract public function save();
}