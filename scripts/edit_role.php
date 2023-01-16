<?php
require_once "connect.php";

$conn = mysqli_connect("localhost","root","","mydatabase");

$errors = array();

if($_userRole != "admin"){
    array_push($errors , "You are not the admin sorry");
}

if(!(isset($_POST['action_type']) && isset($_POST['user_id']))){
    array_push($errors , "Wrong POST arguments");
}
if($_POST['action_type'] == "change_role"){
    if(!(isset($_POST['role_type']))){
        array_push($errors , "couldn't find role POST arguments");
    }
}

if(sizeof($errors) == 0){
    $id = $_POST['user_id'];
    if($_POST['action_type'] == "change_role"){
        if($_POST['role_type'] != "moderator" && $_POST['role_type'] != "user"){
            array_push($errors , "wrong type of role");
        }
        if(sizeof($errors) == 0){
            $role = $_POST['role_type'];
            $query = "UPDATE users SET `role`='$role' WHERE `id`='$id'";
            $result = mysqli_query($conn , $query);
            echo "everything worked";
        }
        else{
            echo "something went wrong";
            print_r($errors);
        }
    }
    else if($_POST['action_type'] == "delete_user"){
        $query = "DELETE FROM users WHERE `id`='$id'";
        $result = mysqli_query($conn , $query);
        echo "everything worked with delete";
    }
}
else{
    echo "something went wrong";
    print_r($errors);
}
header("location: ../edit_roles.php");


?>