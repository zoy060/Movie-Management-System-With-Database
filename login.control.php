<?php

require_once "connect.php";

$username = $_POST['username'];

$pass = $_POST['pwd'];


echo $username . " " . $pass;

$sql = "SELECT * FROM `reviewers` WHERE `userName` =" . $username . " ;";

$stmt = $con->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::ASSOC);

echo "<pre>";
echo $result;
echo
 "<pre>";