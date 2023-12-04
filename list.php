
<?php
require_once "connect.php";

//php for view the movie list at home page
$sql = "SELECT * FROM `movies` ;";

$stmt = $con->prepare($sql);
$stmt->execute();

$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
//     print_r($list);
// echo "</pre>";


function getlist($list)
{

    $n = sizeof($list);

    for ($i = $n - 1; $i >= 0; $i--) {
        echo '
        <div class="col ">
        <div class="card  p-2 m-2 h-100">
        <form  action="view.php" method="get">
        <input type="text" name="MovieID" value="' . $list[$i]['MovieID'] . '">
        <button type="s" class="btn btn-light " >
        
            <div class="card-body">';

        echo '<h5 class="card-title">' . $list[$i]['Title'] . '</h5> <hr>';

        echo '<p class="card-text">' . $list[$i]['Synopsis'] . '</p>';

        echo '</div>';

        echo '<div class="card-footer">
    <small class="text-muted">Release Date: ' . $list[$i]['ReleaseDate'] . ' </small>
    <br>
    <small class="text-muted">Release Date: ' . $list[$i]['Genre'] . ' </small>';

        echo '</div>';
        echo '
    </button>
    </form>
    </div>  
    </div>
    ';
    }
}
