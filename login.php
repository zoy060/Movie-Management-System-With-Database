<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .card:hover{
            transform: scale(1.01);
            transition: all .1s ease;
        }
        .col{
            line-height: 32px;
        }
        input[name="MovieID"]{
            background-color: red;
            display: none;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="--bs-scroll-height: 100px;">
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
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="container p-3 mt-4 d-flex justify-content-center">
        <form action="profile.php" method="post">
          <div class="col mb-3 ">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
            <div class="col">
              <input name="username" type="text" class="form-control" id="inputEmail3">
            </div>
          </div>
          <div class="col mb-3 ">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <br>
            <div class="">
              <input  name="pass" type="password" class="form-control" id="inputPassword3">
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
      </div>


            
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>