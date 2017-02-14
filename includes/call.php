<?php
	include(dbConnection.php);

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$query = "SELECT * from tbl_users_208 WHERE email = '$email'";
		$result = mysqli_query($connection, $query);
		$row = $result->fetch_object();
		echo $row[firstName] . " " . $row[lastName];
	}



	if ($result!=null)
		mysqli_free_result($result);
	mysqli_close($connection);
?>