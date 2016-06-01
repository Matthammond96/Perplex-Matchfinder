<?php

define("DB_SERVER", "localhost");
        define("DB_USER", "root"); //username
        define("DB_PASS", "12345678"); //password
        define("DB_NAME", "cl45-admin-lep"); // database name
    
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
        if(mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
               );
        } else {
            
        }
?>