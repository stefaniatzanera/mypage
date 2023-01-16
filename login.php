<?php 
	require_once "scripts/connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Σύνδεση</title>
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
			<div class="head">Για να συνδεθείτε στον λογαριαμό σας</div>
			<br>
			<form class="join" method="post" action="scripts/login.php">
				<fieldset>
					<div class="login">
					<br>
						<label for="username">Username:</label>
						<br>
						<input type="text" id="username" name="username" placeholder="Username" required>
						<br><br>
						<label for="password">Password:</label>
						<br>
						<input type="password" id="password" name="password" placeholder="***************">
						<br><br>
						<div class="buttons">
							<input type="submit" value="login" name="login">
						</div>
					</div>
					<br>
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