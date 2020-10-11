<?php

class Database {
    private static $_instance;
    private $mysqli,
            $_hostname = "localhost",
            $_username = "root",
            $_password = "",
            $_database = "latihan_auth";

    public function __construct() {
        $this->mysqli = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_database);

        if( mysqli_connect_error() ) {
            die("Gagal menyambung ke database");
        }
    }

    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new Database();
        }

        return self::$_instance;
    }

    public function insert($table, $fields = array()) {
        $column = implode(", ", array_keys($fields));

        $valueArrays = array();
        $i = 0;
        foreach ($fields as $key => $value) {
            if( is_int($value) ) {
                $valueArrays[$i] = $value;
            } else {
                $valueArrays[$i] = "'". $value . "'";
            }
            $i++;
        }

        $values = implode(", ", $valueArrays);

        $query = "INSERT INTO $table ($column) VALUES ($values)";
        // die($query);
        if($this->mysqli->query($query)) return true;
        else return false;
    }
}