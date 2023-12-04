<?php
require_once "connect.php";
// require_once 'view.php';
// $m_id movie id varialbe
// echo $_POST['name'];
$username = $_POST['user'];
$sql = "SELECT * FROM `reviewers` WHERE `userName` = '" . $username . "';";
$stmt = $con->prepare($sql);
$stmt->execute();
$user =$stmt->fetch(PDO::FETCH_ASSOC);

if(is_bool($user)){
    echo '<h2 style="text-align: center;">Your user name is worng</h2>';
}else{
    $userID = $user['userID'];
    $m_id =  $_POST['m_id'];
    $rating =  $_POST['rating'];
    $review =  $_POST['comment'];
    
    $sql = "INSERT INTO `review`(`userID`, `movieID`, `Ratting`, `Comment`) VALUES (:uid, :mid, :rating, :review)";
    
    $stmt = $con->prepare($sql);
    $stmt->bindParam(":uid",$userID);
    $stmt->bindParam(":mid",$m_id);
    $stmt->bindParam(":rating",$rating);
    $stmt->bindParam(":review",$review);
    
    $stmt->execute();

    header("Location: view.php?MovieID=".$m_id);
    echo '<h2 style="text-align: center;">Your Review add successfully</h2>';


}



