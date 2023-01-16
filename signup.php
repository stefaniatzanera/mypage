<?php
	//require_once "scripts/register.php";
	require_once "scripts/connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Εγγραφή</title>
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
			<br>
			<div class="head">Κάνε την εγγραφή σου τώρα για να μαθαίνεις για τα νέα Quiz!!</div>
			<br>
			<?php 
				if(isset($_SESSION['signup_errors'])){
					echo $_SESSION['signup_errors'];
					unset($_SESSION['signup_errors']);
				}
				else{
					// nothing
				}
			?>
				
			<form class="signup" method="post" action="scripts/register.php" enctype="multipart/form-data">
				<fieldset>
					<div class="signup">
						<br>
						<label>Name:</label>
						<input type="text" name="fname" placeholder="Name" required>
						<br>
						<label>LastName:</label>
						<input type="text" name="surname" placeholder="LastName" required>
						<br>
						<label>Gender:</label>
						<div class="radioo">
							<input type="radio" name="gender" class="gen" value="female"><label  class="gen" for="female">Θηλυκό</label>
							<input type="radio" name="gender" class="gen" value="male"><label  class="gen" for="male">Αρσενικό</label>
						</div>
							<br>
						<label>B-Day</label>
						<input type="date" name="date">	
							<br>
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" placeholder="Username" required>
							<br>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" placeholder="***************">
							<br>
						<label for="password">Confirm-password:</label>
						<input type="password" id="password" name="secpass" placeholder="***************">
							<br>
						<label for="email">E-mail:</label>	
						<input type="e-mail" id="email" name="email" placeholder="E-mail" required>
							<br>
						<label for="photo">Profile-photo:</label>
						<div class="ph">
							<i class="fa fa-file-image-o"></i><input type="file" id="photo" name="photo" >
						</div>
							<br>
						<div class="buttons">
							<input type="submit" value="Εγγραφή" name="signup">
						</div>
						<br>
					</div>
				</fieldset>
			</form>	
		</main>
		<br>
		<hr>   
		<footer>
			Copyright &copy; <strong>Ioanna Papailiou-Stefania Tzanera</strong> 2020-2021
		</footer>
		
	</body>
</html>