<?php
require_once 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .card:hover {
            transform: scale(1.01);
            transition: all .1s ease;
        }

        .col {
            line-height: 32px;
        }

        input[name="MovieID"] {
            background-color: red;
            display: none;
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
                    <li class="nav-item  ">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                </ul>
                <form class="d-flex" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="post">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit" name="aaa">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <br>

    <br>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 pb-2 bg-dark">
            <?php


            if (isset($_POST['search'])) {
                require_once 'search.php';

                getSearch($_POST['search'], $con);
            } else {
                require_once "list.php";
                getlist($list);
            }
            ?>
        </div>



    </div>



    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>