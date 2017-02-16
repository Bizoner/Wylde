<?php
	include('dbConnection.php');

	$query = "use auxstudDB6c";
		mysqli_query ($connection, $query);

	if(isset($_POST['buildGuitar'])){
		$query = "SELECT * from tbl_guitarParts_208 order by type ASC";
		$result = mysqli_query($connection, $query);
		$i=1;
		while ($row = mysqli_fetch_assoc($result)){
			if ($i == $row["type"])
				$array = array($i => $row);
			else {
				$i++;
				$array = array($i => $row);
			}
			$i++;
		}
		$finalArray[] = $array;
		echo json_encode($finalArray);
		if ($result!=null)
			mysqli_free_result($result);
		mysqli_close($connection);
	}

	if(isset($_POST['login'])){
		$email = $_POST['login'];
		$query = "SELECT * from tbl_users_208 WHERE email = '$email'";
		$result = mysqli_query($connection, $query);
		$row = $result->fetch_object();
		echo $row->firstName . " " . $row->lastName . "$", $row->img; 
		if ($result!=null)
			mysqli_free_result($result);
		mysqli_close($connection);
	}

?>