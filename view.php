<?php
require_once "connect.php";
require_once "review.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $m_id = $_GET['MovieID'];

    // echo $m_id;



    //php for view the movie list at home page
    $sql = "SELECT * FROM `movies` WHERE `MovieID` = :id;";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":id", $m_id);
    $stmt->execute();

    $details = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $details["Title"];   ?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        th,
        td {
            border: 1px solid black;
            padding: 4px 8px;
        }

        td input {
            width: match-parent;
            height: match-parent;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Impacts</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



    <div class="container p-2">
        <form action="addreview.php" method="post">

            <?php
            // echo '<p class="h1 text-center">' . $details["Title"] . '</p>';
            //     echo "<pre>";
            //     print_r($details);
            //     echo "</pre>";

            foreach ($details as $x => $y) {
                echo '<p class="h3 text-center m-2"> <b>' . $x . '</b> : ' . $y . '</p>';
            }
            ?>

            <h3 class="mt-4 text-center">Reviews</h3>

            <?php reviews($m_id, $con);   ?>
            <!-- add reviews -->
            <!-- add reviews -->
            <!-- <textarea name="" id="" cols="30" rows="2"></textarea> -->
            <div class="text-center">
                <input name="m_id" type="text" style="display: none;" value="<?php echo  $m_id;   ?>">
                <button class="zoy btn btn-outline-dark m-2" style="border:1px solid #000;" type="button"> Make Review</button>
                    <button class=" btn btn-outline-dark m-2" style="border:1px solid #000;" type="submit"> Add Review</button>
            </div>
        </form>



    </div>

    <script src="function.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

</body>

</html>