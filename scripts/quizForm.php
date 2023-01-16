<?php
    $question = json_decode($_POST["question"], true);
    $difficulty = $question['difficulty'];
    $type = $question['type'];
    $ques = $question['ques'];
    $answers = $question['answers'];
    $corrAnswers = $question['correctAnswers'];

    $conn = mysqli_connect("localhost","root","","mydatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "INSERT INTO possibleques (difficulty, `type`, question, answers, correctAnswers) VALUES ('$difficulty', '$type', '$ques', '$answers', '$corrAnswers')";
    $result = mysqli_query($conn, $query);
    echo $result;
?>