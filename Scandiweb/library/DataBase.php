<?php

class DataBase
{
    private $servername = "localhost";
    private $username = "id17362702_arthur";
    private $password = "juniorTest@arthur_123";
    private $dbname = "id17362702_product_list";

    public $table = "products";

    function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function getConnection(){
        return $this->conn;
    }

    function getAll(){
        $sql = "SELECT * FROM $this->table";
        return $sql;
    }

}
