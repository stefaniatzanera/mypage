<?php 
	require_once "scripts/connect.php";

	$conn = mysqli_connect("localhost","root","","mydatabase");
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quiz</title>
        <meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/mycss.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="scripts/bars.js"></script>
		<script src="scripts/qz.js"></script>
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
			<div id="container">
			<div class='head'>Επέλεξε την δυσκολία του Quiz.</div>
			<br>
			<div class="selectoptions" id="difficulty_div">
				<select name="difficulty" id="question_difficulty" class="question_difficulty">
					<option value="---" selected disabled> --- </option>
					<option value="easy"> Εύκολο </option>
					<option value="medium"> Μέτριο </option>
					<option value="hard"> Δύσκολο </option>
				</select>
			</div>
			<div class="buttons" id="begin_button">
					<input type="button" value="Ξεκίνα" onclick="begin(question_difficulty)">
			</div>
			</div>
			<div id="questions">
			</div>
		</main>
	<hr>
	<footer>
		Copyright &copy; <strong>Ioanna Papailiou-Stefania Tzanera</strong> 2020-2021
	</footer>
	
    </body>
</html>