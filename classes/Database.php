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
}