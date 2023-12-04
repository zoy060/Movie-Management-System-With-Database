<?php
$userID = $_POST['userID'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
	$U_FirstName = $_POST['U_FirstName'];
	$U_LastName = $_POST['U_LastName'];
	$Email = $_POST['Email'];

$sql = "INSERT INTO movies(userID,userName,password,U_FirstName,U_LastName,Email) VALUES (:userID,:userName,:password,:U_FirstName,:U_LastName,:Email);";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":userID", $userID);
		 $stmt->bindParam(":userName", $userName);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":U_FirstName", $U_FirstName);
		 $stmt->bindParam(":U_LastName", $U_LastName);
		   $stmt->bindParam(":Email", $Email);

        $stmt->execute();
        
        $success = "<h2 class='center'>Your account created successfully</h2>";
        echo  $success;