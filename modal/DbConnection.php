<?php

class DbConnection
{
    public static function getConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=planetdev", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //setAttribute() method sets a new value to an attribute.

            return $conn;
        }catch (Exception $exception){

        }
    }
}