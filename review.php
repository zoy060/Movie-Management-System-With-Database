<?php
// require_once "connect.php";

//php for view the movie list at home page

function reviews($id, $con)
{
    $sql = 'SELECT CONCAT(reviewers.U_FirstName, " " , reviewers.U_LastName) AS "Reviewer", reviewers.userName, review.Ratting, review.Comment FROM reviewers INNER JOIN review ON reviewers.userID = review.userID WHERE movieID = ' . $id . ';';

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $n = sizeof($reviews);

    if ($n > 0) {
        echo "<div class='container'>
        <table border='1' class='m-2 m-auto text-center'>
    ";

        echo "<tr>";
        foreach ($reviews[0] as $x => $y) {
            echo '<th>' . $x . '</th>';
        }
        echo "</tr>";
        echo "<tbody>";

        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            foreach ($reviews[$i] as $x => $y) {
                echo '<td>' . $y . '</td>';
            }
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table>  </div>";
    }else{
         echo '<p class="h5 text-center m-2">No one review yet</p>';
    }
}






// echo "<pre>";
// print_r($reviews);
// echo "</pre>";


// $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $reviewID = $_POST['reviewID'];
//     $userID = $_POST['userID'];
//     $movieID = $_POST['movieID'];
// 	$Ratting = $_POST['Ratting'];
// 	$Comment = $_POST['Comment'];

// $sql = "INSERT INTO movies(reviewID,userID,movieID,Ratting,Comment) VALUES (:reviewID,:userID,movieID,:Ratting,:Comment);";

//         $stmt = $con->prepare($sql);
//         $stmt->bindParam(":reviewID", $reviewID);
// 		 $stmt->bindParam(":userID", $userID);
//         $stmt->bindParam(":movieID", $movieID);
//         $stmt->bindParam(":Ratting", $Ratting);
// 		 $stmt->bindParam(":Comment", $Comment);

//         $stmt->execute();
        
//         $success = "<h2 class='center'>Your account created successfully</h2>";
//         echo  $success;