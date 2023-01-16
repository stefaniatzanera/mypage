<?php
	require_once "scripts/connect.php";
    if($_userRole == "admin" || $_userRole == "moderator"){
        // echo "hi admin and moderator";
    }
    else{
        exit();
    }


	$conn = mysqli_connect("localhost","root","");
	
	$db = mysqli_select_db($conn,"myDataBase");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>
<!DOCTYPE html>
<html>
    
    <head>   
        <title>Επεξεργασία Ρόλων</title>
        <meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/mycss.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="scripts/bars.js"></script>
    </head>
    
    <body>
		<div class="bar">
			<header><h1>Ιστορία</h1></header>
			
			<nav id = "menu" class="menu">
				<?php echo $menu;?>
			</nav>

			<div class="bars">
				<a href="javascript:void(0);" class="icon" id="icon" onclick="myFunction()">
					<i class="fa fa-bars" style='color:white'></i>
				</a>
			</div>
		</div>

		<main>
			<?php
				$query = "SELECT * FROM questions WHERE `status`='waiting' OR `status` = 'approved'";
				$result = mysqli_query($conn , $query);

			?>
					<div class="flex-base" style="flex-direction: column;">
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<form method="post" action="scripts/validating_question.php" class="flex-base flex-kid" id="' .$row["id"] . '" style="width: 75vw;padding: 5vh">';
									echo '<input type="hidden" name="id" value="'. $row["id"] .'">';
									echo '<div class="flex-kid flex-base">';
										echo "difficulty: " . $row["difficulty"];
									echo '</div>';
                                    echo '<div class="flex-kid flex-base">';
										echo "type: " . $row["type"];
									echo '</div>';
                                    echo '<div class="flex-kid flex-base">';
										echo "question: " . $row["question"];
									echo '</div>';
                                    echo '<div class="flex-kid flex-base">';
										echo "answers: " . $row["answers"];
									echo '</div>';
                                    echo '<div class="flex-kid flex-base">';
										echo "correct answers: " . $row["correctAnswers"];
									echo '</div>';
									echo '<select name="status" class="flex-kid flex-base">';
										echo '<option value="'. $row["status"] .'">'.  $row["status"] .'</option>';
										if($row["status"] == 'waiting'){
											echo '<option value="'. 'approved' .'">'.  'approved' .'</option>';
										}
										else{
											echo '<option value="'. 'waiting' .'">'.  'waiting' .'</option>';
										}
									echo '</select>';
									echo '<div class="flex-base flex-kid-half">';
										$action = 1;
										echo '<i  style="cursor: pointer" onclick="send_post('.$row["id"].', '. $action .')" class="fa fa-pencil" aria-hidden="true"></i>';
									echo '</div>';
									echo '<div class="flex-base flex-kid-half">';
										$action = 2;
										echo '<i style="cursor: pointer" onclick="send_post('.$row["id"].', '. $action .')" class="fa fa-times"></i>';
									echo '</div>';
								echo '</form>';
							}
						?>
					</div>
		</main>
    </body>
</html>


<script>
	function send_post(id , action){
		if(action == 2){
			action = "delete_question";
		}
		else{
			action = "change_question";
		}
		alert(action);
		form = document.getElementById(id);
		var input = document.createElement('input');
		input.setAttribute('name' , 'action_type');
		input.setAttribute('value' , action);
		input.setAttribute('type' , 'hidden');
		form.appendChild(input);
		form.submit();
	}
</script>