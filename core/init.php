<?php

session_start();

// Load classes
spl_autoload_register(function($class){
    require_once 'classes/' .$class. '.php';
});