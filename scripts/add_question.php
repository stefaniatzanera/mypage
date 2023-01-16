<?php
    $conn = mysqli_connect("localhost","root","","mydatabase");

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $question = mysqli_real_escape_string($conn, htmlspecialchars($_POST["ques"]));
    $difficulty = mysqli_real_escape_string($conn, htmlspecialchars($_POST["difficulty"]));
    $type = mysqli_real_escape_string($conn, htmlspecialchars($_POST["type"]));

    $answers = array();
    if(isset($_POST["answers"])){
        for ($i=0; $i <sizeof($_POST["answers"]) ; $i++) { 
            array_push($answers , mysqli_real_escape_string($conn, htmlspecialchars($_POST["answers"][$i])));
        }
    }

    $correct_answers = array();
    if(isset($_POST["answers"])){
        for ($i=0; $i <sizeof($_POST["correctAnswers"]) ; $i++) { 
            array_push($correct_answers , mysqli_real_escape_string($conn, htmlspecialchars($_POST["correctAnswers"][$i])));
        }
    }
    
    if(isset($question) && isset($difficulty) && isset($type) && sizeof($answers) > 0 && sizeof($correct_answers) > 0){
        $str_answers = join(",", $answers);
        $str_correct_answers = join( ",", $correct_answers);
        $query = "INSERT INTO questions (difficulty, `type`, `question`, answers, correctAnswers, `status`) VALUES ('$difficulty', '$type', '$question', '$str_answers', '$str_correct_answers', 'waiting')";
        $result = mysqli_query($conn,$query);
        echo 'the question was passed';
    }
    else{
        echo 'wrong values sorryyyyy';
    }
?>