<?php

$servername = "localhost";

$dbname= "movie";

$username= "root";

$password="";

try {

$con = new PDO("mysql:host=$servername; dbname=$dbname;",$username, $password);


// echo "connection success";

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {


die("Connection failed:".$e->getMessage());
}