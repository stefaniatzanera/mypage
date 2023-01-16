<?php
	require_once "scripts/connect.php";
?>
<!DOCTYPE html>
<html>

    <head>
    
        <title>Αρχική σελίδα</title>
        <meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/mycss.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="scripts/bars.js"></script>
		<script src="scripts/jquery-3.6.0.min.js"></script>
		<script src="scripts/quizForm.js"></script>   
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
			<div class="container">
				<div id="add_question">
					<div class='head'>Γράψε την ερώτηση που έχεις να προτείνεις.</div>
					
					<br>
					<div class="head">
						<input type="text" id="question" name="question" placeholder="Ερώτηση" required><br>
					</div>	
					<br>
					<div class='head'>Διάλεξε το επίπεδο δυσκολίας.</div>
					
					<br>
					<div class="selectoptions">
						<select name="difficulty" id="question_difficulty" class="question_difficulty">
							<option value="---" selected disabled> --- </option>
							<option value="easy"> Εύκολο </option>
							<option value="medium"> Μέτριο </option>
							<option value="hard"> Δύσκολο </option>
						</select>
					</div>
					
					<br>

					<div class='head'>Διάλεξε τον τύπο ερώτησης.</div>
					
					<br>
					<div class="selectoptions">
						<select name="type" id="question_type" class="question_difficulty">
							<option value="---" selected disabled> --- </option>
							<option value="checkbox"> Checkbox </option>
							<option value="true/false"> True/False </option>
							<option value="radio"> Radio </option>
							<option value="text"> Text </option>
						</select>
					</div>
					<br>
					<div class="buttons">
						<input type="button" value="Συνέχεια" onclick="next()">
					</div>
				</div>
			</div>
		</main>
		<br>	
		<hr>
		<footer>
			Copyright &copy; <strong>Ioanna Papailiou-Stefania Tzanera</strong> 2020-2021
		</footer>
    </body>
</html>