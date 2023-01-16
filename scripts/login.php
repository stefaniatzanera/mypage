<?php
require_once "connect.php";

$conn = mysqli_connect("localhost","root","","mydatabase");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST["username"])));
    $userpassword = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST["password"])));

	if(empty($_POST["username"]) || empty($_POST["password"]))
	{
		$error = "Συμπλήρωσε όλα τα πεδία!";
	}
    else
    {
        $conn = mysqli_connect("localhost","root","","mydatabase");

        if($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE username = '$username' && `password`='$userpassword'";
        $result = mysqli_query($conn, $sql);
        
        echo "\nIt has to be 1 : \"" . $result->num_rows."" . "\"\n";
        
        if($result->num_rows != 0)
        {
            $row = $result->fetch_assoc();
            echo $row["id"]." ".$row["username"];
            if($row)
            {
                $_SESSION["password"] = $userpassword;
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["gender"] = $row["gender"];
                $_SESSION["date"] = $row["date"];
                $_SESSION["photo"] = $row["photo"];
                header("location: ../index.php");
                exit;
            }
        }
        else
        {
            header("location: ../login.php");
            exit;
        }
        mysqli_close($conn);
	}
    header("location: ../login.php");
}
?>