<?php
require_once 'connect.php';
$username = $_POST['username'];
$pass = $_POST['pass'];

try {
    //check usering details in database
    $sql = 'SELECT `userID`, CONCAT(U_FirstName, " " , U_LastName) AS "Reviewer", `password`, `userName`, `Email`  FROM `reviewers` WHERE `userName` = :username AND `password` = :pwd;';

    $stmt = $con->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pwd', $pass);

    $stmt->execute();

    $check = $stmt->fetch(PDO::FETCH_ASSOC);


    //user reviews on movies function
    function UserReviews($username, $con)
    {
        $sql = 'SELECT CONCAT(reviewers.U_FirstName, " " , reviewers.U_LastName) AS "Reviewer", reviewers.userName, review.Ratting, review.Comment FROM reviewers INNER JOIN review ON reviewers.userID = review.userID WHERE reviewers.userName = "' . $username . '";';

        $stmt = $con->prepare($sql);
        $stmt->execute();

        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $n = sizeof($reviews);

        if ($n > 0) {
            echo "<div class='container'>
        <table  class='m-2 m-auto text-center table table-striped table-hover'>
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
        } else {
            echo '<p class="h5 text-center m-2">No one review yet</p>';
        }
    }

    if (!is_bool($check)) {
        session_start();
        $_SESSION["id"] = $check['userID'];
        $_SESSION["userName"] = $check['userID'];

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

            <title><?php echo $check['Reviewer']; ?></title>
            <style>
                .profile {
                    /* border: 1px solid gray; */
                    margin-bottom: 20px;

                }

                p {
                    text-align: center;
                }
            </style>
        </head>

        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../movie/">Impacts</a>
                    <button class="navbar-toggler" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="actors.php">Actors</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link" href="directors.php">Directors</a>
                            </li>
                        </ul>
                        <div class="d-flex">

                            <a class="navbar-brand" href="index.php">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container m-auto  ">
                <div class="container profile col-5 ">
                    <p class="h2 m-2"><?php echo $check['Reviewer']; ?></p>
                    <p class="h5 m-2"><span>Username : </span><?php echo $check['userName']; ?></p>
                    <p class="h6 m-2"><span>Email : </span><?php echo $check['Email']; ?></p>
                </div>
                <!-- user reviews -->
                <!-- user reviews -->
                <div class="container">
                    <?php
                    UserReviews($check['userName'], $con);
                    ?>
                </div>
            </div>

            <script src="bootstrap/js/bootstrap.js"></script>
        </body>

        </html>
<?php

    } else {
        echo '<h2 style="text-align: center;">Login Details Are Wong</h2>';
    }
} catch (PDOException $th) {
    die("Con.. Failed: " . $th->getMessage());
}
?>