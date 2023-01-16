<?php 
	require_once "scripts/connect.php";
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Quiz</title>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/mycss.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script src="scripts/bars.js"></script>
		<script src="scripts/quizHtml.js"></script>
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
			<article>	
				<div class="head">Ώρα για να δεις τι έμαθες! </div>
				<br>
				<form name="quiz" class="quiz" id="quiz">
					<fieldset>
						<div class="quiz">
							<br>
							<div class= "ques">
								<p><strong>1. Οι Βαλκανικοί πόλεμοι ήταν δύο πόλεμοι που έγιναν στα Βαλκάνια το 1912-1913.</strong></p>
									<br>
									<ul class="ans">
										<li>Σωστό<input type="radio" name="apant" value="true"></li>
										<li>Λάθος<input type="radio" name="apant" value="false"></li>
									<ul>
							</div>
							<br>
							<div class="ques">
								<p><strong>2. Ποια πρόταση από τις παρακάτω φαίνεται οτι αποτέλεσε μια από τις βασικότερες αιτίες για το ξέσπασμα του Α' Βαλκανικού Πολέμου;</strong><br>
									<br>
									<ul class="ans">
										<li><p><input type ="radio" name="question1" value="q1">O σχηματισμός του Βαλκανικού Συνασπισμού και η πεποίθηση των μελών του ότι θα μπορούσαν να νικήσουν τους Τούρκους.</p></li><br>
										<li><p><input type ="radio" name="question1" value="q2">Οι Μεγάλες Δυνάμεις είχαν κοινούς στόχους, συμφωνούσαν μεταξύ τους και εγγυηθηκαν ότι οι Οθωμανοί θα πραγματοποιήσουν τις απαραίτητες μεταρρυθμίσεις.</p></li><br>
										<li><p><input type ="radio" name="question1" value="q3">Η Οθωμανική Αυτοκρατορία εξασφάλισε επιτυχώς μεταρρυθμίσεις, κυβέρνησε ικανοποιητικά και να ασχοληθηκε με τον αυξανόμενο εθνικισμό των διαφόρων λαών της.</p></li><br>
									</ul>
								</p>
							</div>
							<br>
							<div class="ques">
								<p><strong>3. Στις 30 Οκτωβρίου 1918 υπογράφεται η πρώτη ανακωχή του πολέμου, η Συνθήκη ανακωχής του ... </strong></p>
									<br>
									<select name="sinthiki">
										<option selected value="keno"> --- </option>
										<option value="parisi"> Μούδρου </option>
										<option value="voukouresti"> Βουκουρεστίου </option>
										<option value="madrith"> Βερσαλιών </option>
									</select>
							</div>
							<br>
							<div class="ques">
								<p><strong>4. Στις αρχές του 20ου αιώνα, ποιες χώρες είχαν αποκτήσει την ανεξαρτησία τους από την Οθωμανική Αυτοκρατορία, αλλά μεγάλα τμήματα των εθνικών τους πληθυσμών παρέμεναν υπό την Οθωμανική κυριαρχία.</strong>  (Παραπάνω από μια απαντήσεις μπορεί να είναι σωστές)</p>
									<br>
									<ul class="ans">
										<li><input type="checkbox" name="ellada" id="ellada" class="anss" value="Ελλαδα"><label class="anss" for="ellada">Ελλάδα</label></li>
										<br>
										<li><input type="checkbox" name="bulgaria" id="bulgaria" class="anss" value="Βουλγαρία"><label class="anss" for="bulgaria">Βουλγαρία</label></li>
										<br>
										<li><input type="checkbox" name="russia" id="russia" class="anss" value="Ρωσία"><label  class="anss" for="russia">Ρωσία</label></li>
										<br>
										<li><input type="checkbox" name="mavrovounio" id="mavrovounio" class="anss" value="Μαυροβούνιο"><label class="anss" for="mavrovounio">Μαυροβούνιο</label></li>
										<br> 
										<li><input type="checkbox" name="servia" id="servia" class="anss" value="Σερβία"><label class="anss" for="servia">Σερβία</label></li>
										<br>
									</ul>
								</p>
							</div>
							<br>
							<div class="ques">
								<p><strong>5. Από το 1904 υπήρξε πόλεμος χαμηλής έντασης στη Μακεδονία μεταξύ των ελληνικών και των βουλγαρικών αποσπασμάτων και του οθωμανικού στρατού. Πώς λεγόταν αυτός ο πόλεμος;</strong> </p>
									<br>
									<input type="text" id="answer" name="answer" placeholder= "Απάντηση..." required><br><br>
							</div>
							<br>
							<div class="buttons">
								<input type="reset" name="reset" value="Εκκαθάριση" >&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" name="submit" value="Έλεγχος" onclick="apotelesmata()" ><br>
							</div>
						</div>	
					</fieldset>
				</form>
			</article>
		</main>
	<br>
	<hr>
	<footer>
		Copyright &copy; <strong>Ioanna Papailiou-Stefania Tzanera</strong> 2020-2021
	</footer>
</body>
</html>