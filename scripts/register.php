<?php
	$msg = '';
	session_start();
	
	if(isset($_POST["signup"]))
	{
			$conn = mysqli_connect("localhost","root","","mydatabase");
			
			if ($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}

			$on = mysqli_real_escape_string($conn, htmlspecialchars($_POST["fname"]));
			$ep = mysqli_real_escape_string($conn, htmlspecialchars($_POST["surname"]));
			$hm = mysqli_real_escape_string($conn, htmlspecialchars($_POST["date"]));
			$f = mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));
			
			$u = mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
			$ps = mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));
			$sp = mysqli_real_escape_string($conn, htmlspecialchars($_POST["secpass"]));
			$e = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
			$ph = $_FILES["photo"]["name"];
			$destination = "../media/photo/users/$u".basename($ph);

			echo $on." ".$ep." ".$hm." ".$f." ".$u." ".$ps." ".$sp." ".$e." ".$ph." ";

			$query = "SELECT * FROM users WHERE username = '$u'";
			
			$result = mysqli_query($conn,$query);

			$errors = 0;

			$msg = "!";

			if ($result-> num_rows > 0)
			{
				$msg = $msg . " Υπάρχει ήδη χρήστης με το ίδιο Username!";
				$errors = $errors + 1;
			}

			if ($ps != $sp)
			{
				$msg = $msg . " Οι δύο κωδικοί θα πρέπει να ταιριάζουν";
				$errors = $errors + 1;
			}

			if($errors == 0)
			{
				if(!empty($_POST["username"]) || !empty($_POST["password"]) || !empty($_POST["fname"]) || !empty($_POST["surname"]) || !empty($_POST["date"]) || !empty($_POST["gender"]) || !empty($_POST["secpass"]) || !empty($_POST["email"]) || !empty($_POST["photo"])){
					
					$sql = "INSERT INTO users (firstname, lastname, `date`, gender, username, `password`, email, photo, `role`) VALUES ('$on', '$ep', '$hm', '$f', '$u', '$ps', '$e', '$destination', 'user')";
					// echo "minima";
					move_uploaded_file($_FILES["photo"]["tmp_name"],$destination);
					$result = mysqli_query($conn,$sql) or die("error");

					// echo $result;
					header("Location: ../login.php");
				}
				else
				{
					$msg = $msg . " Κάτι πήγε λάθος,ξαναπροσπάθησε!";
				}
			}
			echo $msg;
			$_SESSION['signup_errors'] = $msg;
			header("Location: ../signup.php");
			mysqli_close($conn);
		}	
?>