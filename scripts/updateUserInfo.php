<?php
    require_once "connect.php";
    print_r($_POST);
    $fname = $_POST["userFName"];
    $lname = $_POST["userLName"];
    $email = $_POST["userMail"];
    $pass = $_POST["userPassword"];
    $date = $_POST["userDate"];
    $gender = $_POST["gen"];
    $ph = $_FILES["photo"]["name"];
    $destination = "../media/photo/users/$_userName".basename($ph);
    if(isset($_POST["changes"]))
	{
        $conn = mysqli_connect("localhost","root","","mydatabase");
        
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        if (!empty(trim($_POST["userPassword"])) && !empty(trim($_POST["userVerPassword"])))
        {
            print("0");
            $query = "UPDATE users 
            SET `firstname`='$fname', `lastname`='$lname', `email`='$email', `password`='$pass', `date`='$date', `gender`='gender'
            WHERE `id`='$_userID';";
        }
        else
        {
            print("1");
            $query = "UPDATE users 
            SET `firstname`='$fname', `lastname`='$lname', `email`='$email', `date`='$date', `gender`='gender'
            WHERE `id`='$_userID';";
        }
        if (isset($ph))
        {
            $query = "UPDATE users 
            SET `photo`='$destination'
            WHERE `id`='$_userID';";
            move_uploaded_file($_FILES["photo"]["tmp_name"],$destination);
        }
        $result = mysqli_query($conn,$query);
        print($result);
        header("location: ../logout.php");
    }
?>