$Movie = $_POST['MovieID'];
    $Title = $_POST['Title'];
    $ReleaseDate = $_POST['ReleaseDate'];
	$Genre = $_POST['Genre'];
	$Rating = $_POST['Rating'];
	$BoxOfficeEarnings = $_POST['BoxOfficeEarnings'];
	$Synopsis = $_POST['Synopsis'];
	$TailerLink = $_POST['TailerLink'];

$sql = "INSERT INTO movies(MovieID,Title,ReleaseDate,Genre,Rating,BoxOfficeEarnings,Synopsis,TailerLink) VALUES (:MovieID,:Title,:ReleaseDate,:Genre,:Rating,:BoxOfficeEarnings,:Synopsis,:TailerLink);";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":MovieID", $Movie);
		 $stmt->bindParam(":Title", $Title);
        $stmt->bindParam(":ReleaseDate", $ReleaseDate);
        $stmt->bindParam(":Genre", $Genre);
		 $stmt->bindParam(":Rating", $Rating);
		  $stmt->bindParam(":BoxOfficeEarnings", $BoxOfficeEarnings);
		   $stmt->bindParam(":Synopsis", $Synopsis);
		    $stmt->bindParam(":TailerLink", $TailerLink);

        $stmt->execute();
        
        $success = "<h2 class='center'>Your account created successfully</h2>";
        echo  $success;