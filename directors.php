<?php
include_once 'connect.php';

$sql = "SELECT concat(directors.`D_FirstName`,' ', directors.`D_LastName`) AS 'Director Name', directors.`D_BirthDate`, directors.`Gender`, movies.Title AS 'Directed Movie', movies.Genre FROM directors LEFT JOIN movies ON directors.MovieID = movies.MovieID;";

        $stmt = $con->prepare($sql);

        $stmt->execute();

        $directors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $n = sizeof($directors);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>directors</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../movie/">BTS MOV</a>
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
                <form class="d-flex" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="aaa">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <div class="container">

    <pre>
        <table class="table table-striped table-hover">
            <?php   
            echo '<thead></thead>';
            // echo '<th>' . $actors[0][] . '</th>';
            foreach($directors[0] as $th => $td){
                echo '<th scope="col">' . $th . '</th>';
            }
            //echo $actors[0][1];

            echo '</thead>';
            echo '<tbody>';
            for($i = 0; $i < $n; $i++){
                echo '<tr>';
                foreach($directors[$i] as $th => $td){
                    echo '<th scope="col " class="text-wrap" style="width: 200px;">' . $td . '</th>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
        ?>
        </table>
    </pre>


    </div>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>
