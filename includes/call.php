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

	if (isset($_POST['insertGuitar'])){
		$guitarName = $_POST['name'];
		$pickup = $_POST['pickup'];
		$neck = $_POST['neck'];
		$body = $_POST['body'];
		$bridge = $_POST['bridge'];
		$price = $_POST['price'];
		$email = $_POST['email'];
		$private = $_POST['private'];
		$img = $_POST['img'];
		$created = $_POST['created'];
		$query = "INSERT INTO tbl_guitars_208 VALUES ('$guitarName','$email','$private', '$pickup', '$body', '$neck', '$bridge', '$price', '$img', '$created')";
		if(!($temp = mysqli_query ($connection, $query)))
			echo "Update Failed ";
		else
			echo "success";
		if ($result!=null)
			mysqli_free_result($result);
		mysqli_close($connection);
	}

	if (isset($_POST['showGuitar'])){
		$name = $_POST['name'];
		$creator = $_POST['creator'];
		$query = "SELECT * FROM tbl_guitars_208 WHERE creator = '$creator' AND guitarName = '$name'";
		$result = mysqli_query($connection, $query);
		$row = $result->fetch_object();
		echo '<h3>' . $row->creator . '</h3>';
		echo '<h3>' . $row->created . '</h3>';
		echo '<h3>' . $row->guitarName . '</h3>';
		echo '<h3>' . $row->pickup . '</h3>';
		echo '<h3>' . $row->body . '</h3>';
		echo '<h3>' . $row->neck . '</h3>';
		echo '<h3>' . $row->bridge . '</h3>';
		echo '<h3>' . $row->price . '</h3>';
	}

?>