<?php
    if(isset($_POST["difficulty"]) && $_POST["difficulty"] != "---")
    {
        $difficulty = $_POST["difficulty"];
    }
    else
    {
        $difficulty = "easy";
    }
    $conn = mysqli_connect("localhost","root","","mydatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM questions WHERE difficulty='$difficulty' and `status`='approved'  order by RAND() limit 5;";
    $result = mysqli_query($conn, $query);

echo '<form action="scripts/verifyQuiz.php" method="post" id="user_quiz">';

        for($i=0; $i<5; $i++)
        {
            $rows = $result->fetch_assoc();
            echo '<h3>'.$rows["question"].'</h3><br>';
            if($rows["type"]=='text')
            {
                echo '<input type="text" name="'.$rows["id"].'">';
            }
            else if($rows["type"]=='checkbox')
            {
                $answers = explode(",", $rows["answers"]);
                for ($j=0; $j < count($answers); $j++)
                { 
                    echo '<input type="checkbox" name="'.$rows["id"].'[]" value="'.$j.'"><label>'.$answers[$j].'</label><br>';
                }
            }
            else
            {
                $answers = explode(",", $rows["answers"]);
                for ($j=0; $j < count($answers); $j++)
                { 
                    echo '<input type="radio" name="'.$rows["id"].'" value="'.$j.'"><label>'.$answers[$j].'</label><br>';
                }
            }
        }
    
    echo '<input type="submit" name="submit" value="Έλεγχος">';
    echo '<input type="reset" name="reset" value="Εκκαθάριση">';
echo '</form>';
?>