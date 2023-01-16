<?php
	require_once "scripts/connect.php";
?>

		<?php
			$u = $_SESSION['username'];
			$db = mysqli_connect('localhost' , 'root' , '' );
			$query = "SELECT * FROM users WHERE username = '$u' LIMIT 1";
			$q = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($q);
			$fname = $user['fname'];
			$surname = $user['surname'];
			$email = $user['email'];
			$gender = $user['gender'];
			$date = $user['date'];
			$photo = $user['photo'];
			$role = $user['role'];
		?>
