<?php
	require_once "scripts/connect.php";
	
    if($_userRole == "admin"){
        // echo "hi admin";
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
			<header>Ιστορία
				<a class="bars" href="javascript:void(0);" class="icon" id="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
			</header>
				
			<nav id = "menu" class = "menu">
				<?php echo $menu;?>
			</nav>
		</div>
		<br>
		<main>
			<?php
				$query = "SELECT * FROM users WHERE `role`='user' OR `role`='moderator'";
				$result = mysqli_query($conn , $query);

			?>
			
					<div class="flex-base" style="flex-direction: column;">
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<form method="post" action="scripts/edit_role.php" class="flex-base flex-kid" id="' .$row["id"] . '" style="width: 75vw;padding: 5vh">';
									echo '<input type="hidden" name="user_id" value="'. $row["id"] .'">';
									echo '<div class="flex-kid flex-base">';
										echo "username: " . $row["username"];
									echo '</div>';
									echo '<select name="role_type" class="flex-kid flex-base">';
										echo '<option value="'. $row["role"] .'">'.  $row["role"] .'</option>';
										if($row["role"] == 'moderator'){
											echo '<option value="'. 'user' .'">'.  'user' .'</option>';
										}
										else{
											echo '<option value="'. 'moderator' .'">'.  'moderator' .'</option>';
										}
									echo '</select>';
									echo '<div class="flex-base flex-kid-half">';
										$action = 1;
										echo '<i  style="cursor: pointer" onclick="send_post('.$row["id"].', '. $action .')" class="fa fa-pencil" aria-hidden="true"></i>';
									echo '</div>';
									echo '<div class="flex-base flex-kid-half">';
										$action = 2;
										echo '<i style="cursor: pointer" onclick="send_post('.$row["id"].', '. $action .')" class="fa fa-user-times"></i>';
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
			action = "delete_user";
		}
		else{
			action = "change_role";
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