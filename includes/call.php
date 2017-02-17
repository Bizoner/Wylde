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
		$query = "INSERT INTO tbl_guitars_208 VALUES ('$guitarName','$email','$private', '$pickup', '$body', '$neck', '$bridge', '$price', '$img', '$created');
				  INSERT INTO tbl_userOrders_208 VALUES ('$email', '$guitarName', '$price', 'Pending')";
		if(!($temp = mysqli_multi_query ($connection, $query)))
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
		echo '<div class="twothirdCol" id="builder">';
		echo '<h2>' . $row ->guitarName . '</h2>';
        echo '<div class="item"><div class="item_thumb"></div><div class="item_title">' . $row->pickup . '</div><div class="item_price"></div></div>';
        echo '<div class="item"><div class="item_thumb"></div><div class="item_title">' . $row->body . '</div><div class="item_price"></div></div>';
        echo '<div class="item"><div class="item_thumb"></div><div class="item_title">' . $row->neck . '</div><div class="item_price"></div></div>';
        echo '<div class="item"><div class="item_thumb"></div><div class="item_title">' . $row->bridge . '</div><div class="item_price"></div></div>';
        echo '<p>CREATED BY: ' . $row->creator . '</p>';
        echo '<p>PRICE: ' . $row->price . '$</p>';
        echo '<button class="share">SHARE</button>&nbsp;&nbsp;&nbsp;<button class="order">ORDER</Button>';
		echo '</div>';
        echo '<div class="thirdCol">';
        echo '<span class="closePopup">X</span>';
        echo '<img src=' . $row->img .'>';
        echo '</div>';
	}

	if (isset($_POST['orderGuitar'])){
		$name = $_POST['name'];
		$creator = $_POST['creator'];
		$query = "UPDATE tbl_userOrders_208 SET status = 'Ordered' WHERE user = '$creator' AND guitarName = '$name'";
		if(!($temp = mysqli_multi_query ($connection, $query)))
			echo "Update Failed ";
		else
			echo "success";
		if ($result!=null)
			mysqli_free_result($result);
		mysqli_close($connection);
	}

	if (isset($_POST['mailto'])){
		$link = $_POST['link'];
		$mailto = $_POST['mailto'];
		$headers = "From: yossit@gmail.com\r\n";
		$headers .= "Content-type: text/html\r\n";
		$success = mail($mailto, "Come edit my guitar!", "Yossi Tsaraf has shared this guitar with you!", $headers);
	}

?>