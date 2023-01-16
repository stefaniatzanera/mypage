<?php
require_once "connect.php";

$conn = mysqli_connect("localhost","root","","mydatabase");

$errors = array();

if($_userRole != "admin" && $_userRole != "moderator"){
    array_push($errors , "You are not the admin or moderator sorry");
}

if(!(isset($_POST['action_type']) && isset($_POST['id']))){
    array_push($errors , "Wrong POST arguments");
}
if($_POST['status'] == "change_question"){
    if(!(isset($_POST['status']))){
        array_push($errors , "couldn't find role POST arguments");
    }
}

if(sizeof($errors) == 0){
    $id = $_POST['id'];
    if($_POST['action_type'] == "change_question"){
        echo 'status : ' . $_POST['status'];
        if($_POST['status'] != "waiting" && $_POST['status'] != "approved"){
            array_push($errors , "wrong type of question status");
        }
        if(sizeof($errors) == 0){
            $status = $_POST['status'];
            echo 'status : ' . $status;
            $query = "UPDATE questions SET `status`='$status' WHERE `id`='$id'";
            $result = mysqli_query($conn , $query);
            echo "everything worked";
        }
        else{
            echo "something went wrong";
            print_r($errors);
        }
    }
    else if($_POST['action_type'] == "delete_question"){
        $query = "DELETE FROM questions WHERE `id`='$id'";
        $result = mysqli_query($conn , $query);
        echo "everything worked with delete";
    }
}
else{
    echo "something went wrong";
    print_r($errors);
}
header("location: ../validating_questions.php");


?>