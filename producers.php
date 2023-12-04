$ProducerID = $_POST['ProducerID'];
    $D_FirstName = $_POST['D_FirstName'];
    $D_LastName = $_POST['D_LastName'];
	$D_BirthDate = $_POST['D_BirthDate'];
	$Gender = $_POST['Gender'];
	$MovieID = $_POST['MovieID'];

$sql = "INSERT INTO movies(ProducerID,P_FirstName,P_LastName,P_BirthDate,Gender,MovieID) VALUES (:ProducerID,:P_FirstName,:P_LastName,:P_BirthDate,:Gender,:MovieID);";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":ProducerID", $ProducerID);
		 $stmt->bindParam(":P_FirstName", $P_FirstName);
        $stmt->bindParam(":P_LastName", $);P_LastName);
        $stmt->bindParam(":P_BirthDate", $P_BirthDate);
		 $stmt->bindParam(":Gender", $Gender);
		   $stmt->bindParam(":MovieID", $MovieID);

        $stmt->execute();
        
        $success = "<h2 class='center'>Your account created successfully</h2>";
        echo  $success;