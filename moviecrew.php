
$MovieCrewID = $_POST['MovieCrewID'];
    $MovieID = $_POST['MovieID'];
    $DirectorID = $_POST['DirectorID'];
	$ProducerID = $_POST['ProducerID'];

$sql = "INSERT INTO movies(MovieCrewID,MovieID,DirectorID,ProducerID) VALUES (:MovieCrewID,:MovieID,:DirectorID,:ProducerID);";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":MovieCrewID", $MovieCrewID);
		 $stmt->bindParam(":MovieID", $MovieID);
        $stmt->bindParam(":DirectorID", $);DirectorID);
        $stmt->bindParam(":ProducerID", $ProducerID);

        $stmt->execute();
        
        $success = "<h2 class='center'>Your account created successfully</h2>";
        echo  $success;