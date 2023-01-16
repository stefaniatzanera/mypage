<?php
    print_r($_POST);
    $conn = mysqli_connect("localhost","root","","mydatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $keys = array_keys($_POST);
    print($keys[0]);
    $score = 0;
    for ($i=0; $i < 5; $i++)
    { 
        $query = "SELECT * FROM questions WHERE id='$keys[$i]';";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        if(!($row["type"] == "checkbox"))
        {
            if($row["correctAnswers"] == $_POST[$keys[$i]])
            {
                $score++;
            }
        }
        else
        {
            $answer = implode(",",$_POST[$keys[$i]]);
            if($row["correctAnswers"] == $answer)
            {
                $score++;
            }
        }
    }
    print("\n".$score);
    header("location: ../qz.php");
?>