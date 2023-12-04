<?php
include_once 'connect.php';
// $ActorID = $_POST['ActorID'];
//     $A_FirstName = $_POST['A_FirstName'];
//     $A_LastName = $_POST['A_LastName'];
// 	$A_BirthDate = $_POST['A_BirthDate'];
// 	$Gender = $_POST['Gender'];
// 	$Biography = $_POST['Biography'];
// 	$MovieID = $_POST['MovieID'];

$sql = "SELECT concat(actors.`A_FirstName`, actors.`A_LastName`) AS 'Actor Name', actors.`A_BirthDate`, actors.`Gender`, actors.`Biography`, movies.Title AS 'Movie Name', movies.Genre FROM actors LEFT JOIN movies ON actors.MovieID = movies.MovieID;";

        $stmt = $con->prepare($sql);
        // $stmt->bindParam(":ActorID", $ActorID);
		//  $stmt->bindParam(":A_FirstName", $A_FirstName);
        // $stmt->bindParam(":A_LastName", $A_LastName);
        // $stmt->bindParam(":A_BirthDate", $A_BirthDate);
		//  $stmt->bindParam(":Gender", $Gender);
		//   $stmt->bindParam(":Biography", $Biography);
		//    $stmt->bindParam(":MovieID", $MovieID);

        $stmt->execute();

        $actors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $n = sizeof($actors);

        
        
        // $success = "<h2 class='center'>Your account created successfully</h2>";
        // echo  $success;



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
         td{
            border: 1px solid black;
        }
        input{
            height: 100%;
            width: 100%;
        }

    </style>
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
            echo '<thead>';
            echo '<tr>';
            // echo '<th>' . $actors[0][] . '</th>';
            foreach($actors[0] as $th => $td){
                echo '<th scope="col">' . $th . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            for($i = 0; $i < $n; $i++){
                echo '<tr>';
                foreach($actors[$i] as $th => $td){
                    echo '<th scope="col " class="text-wrap">' . $td . '</th>';
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
