<?php
// require_once "connect.php";


// $search = $_POST['search'];

// // $search = "o";

// $sql = "SELECT * FROM `movies` WHERE `Title` Like '%" . $search . "%';";

// $stmt = $con->prepare($sql);
// $stmt->execute();

// $SearchList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// header("Location: index.php");

function getSearch($search, $con){


$sql = "SELECT * FROM `movies` WHERE `Title` Like '%" . $search . "%' OR `Genre` Like '%" . $search . "%'";

$stmt = $con->prepare($sql);
$stmt->execute();

$SearchList = $stmt->fetchAll(PDO::FETCH_ASSOC);

$n = sizeof($SearchList);

for ($i = 0; $i < $n; $i++) {
    echo '
        <div class="col ">
        <div class="card  p-2 m-2 h-100">
        <form  action="view.php" method="post">
        <input type="text" name="MovieID" value="' . $SearchList[$i]['MovieID'] . '">
        <button type="s" class="btn btn-light " >
        
            <div class="card-body">';

      echo '<h5 class="card-title">' . $SearchList[$i]['Title'] . '</h5> <hr>';

      echo '<p class="card-text">' . $SearchList[$i]['Synopsis'] . '</p>';
      
      echo '</div>';

    echo '<div class="card-footer">
    <small class="text-muted">Release Date: ' . $SearchList[$i]['ReleaseDate'] . ' </small>
    <br>
    <small class="text-muted">Release Date: ' . $SearchList[$i]['Genre'] . ' </small>';

    echo '</div>';
    echo '
    </button>
    </form>
    </div>  
    </div>
    ';
}

    
}
