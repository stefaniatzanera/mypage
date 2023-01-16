<?php
session_start();

$_userRole  = "";
$_userName  = "";
$_userFName = "";
$_userLName = "";
$_userMail  = "";
$_userGender= "";
$_userDate  = "";
$_userPhoto = "";
$menu = "";
$page= "";

if(isset($_SESSION["id"]))
{
	$_userID = $_SESSION["id"];
	$_userRole  = $_SESSION["role"];
	$_userName  = $_SESSION["username"];
	$_userFName = $_SESSION["firstname"];
	$_userLName = $_SESSION["lastname"];
	$_userMail  = $_SESSION["email"];
	$_userGender= $_SESSION["gender"];
	$_userDate  = $_SESSION["date"];
	$_userPhoto = $_SESSION["photo"];
	$_photo = explode("../",$_userPhoto);
	$_userPhoto = $_photo[1];
}

switch($_userRole)
{
	case "user":
		$menu = "<ul>
			<li><a href='index.php' ><i class='fa fa-home'></i> Αρχική</a></li>
			<li><a href='basics1.php'>Πόλεμοι</a></li>
			<li><a href='more1.php'>Περισσότερα</a></li>
			<li class='drop-down'><a href='#'>Quiz<i class='fa fa-caret-down' style='color:white'></i></a>
				<ul>
					<li><a href='qz.php'>Quiz</a></li>
					<li><a href='addques.php'>Προσθήκη Ερώτησης</a></li>
					<li><a href='history.php'>Ιστορικό Quiz</a></li>
				</ul>
			</li>
			<li><a href='user.php'><i class='fa fa-user-circle-o'></i> Ο λογαριασμός μου</a></li>
			<li><a href='logout.php'><i class='fa fa-sign-out'></i> Έξοδος</a></li>
		</ul>";
	break;

	case "moderator":
		$menu = "<ul>
			<li><a href='index.php' ><i class='fa fa-home'></i> Αρχική</a></li>
			<li><a href='basics1.php'>Πόλεμοι</a></li>
			<li><a href='more1.php'>Περισσότερα</a></li>
			<li class='drop-down'><a href='#'>Quiz<i class='fa fa-caret-down' style='color:white'></i></a>
				<ul>
					<li><a href='qz.php'>Quiz</a></li>
					<li><a href='addques.php'>Προσθήκη Ερώτησης</a></li>
					<li><a href='validating_question.php'>Πιθανές ερωτήσεις</a></li>
				</ul>
			</li>
			<li><a href='user.php'><i class='fa fa-user-circle-o'></i> Ο λογαριασμός μου</i></a></li>
			<li><a href='logout.php'><i class='fa fa-sign-out'></i> Έξοδος</a></li>    
		</ul>";
	break;

	case "admin":
		$menu = "<ul>
			<li><a href='index.php' ><i class='fa fa-home'></i> Αρχική</a></li>
			<li><a href='basics1.php'>Πόλεμοι</a></li>
			<li><a href='more1.php'>Περισσότερα</a></li>
			<li class='drop-down'><a href='#'>Quiz<i class='fa fa-caret-down' style='color:white'></i></a>
				<ul>
					<li><a href='qz.php'>Quiz</a></li>
					<li><a href='addques.php'>Προσθήκη Ερώτησης</a></li>
					<li><a href='validating_question.php'>Πιθανές ερωτήσεις</a></li>
				</ul>
			</li>
			<li class='drop-down'><a href='#'><i class='fa fa-users'></i>Οι λογαριασμοί<i class='fa fa-caret-down' style='color:white'></i></a>
				<ul>
					<li><a href='user.php'>Ο λογαριασμός μου</a></li><br>
					<li><a href='edit_roles.php'>Επεξεργασία ρόλων</a></li>
				</ul>
			</li>
			<li><a href='logout.php'><i class='fa fa-sign-out'></i> Έξοδος</a></li>    
		</ul>";
	break;

	default:
		$menu = "<ul>
					<li><a href='index.php' ><i class='fa fa-home'></i> Αρχική</a></li>
					<li><a href='basics.php'>Πόλεμοι</a></li>
					<li><a href='more.php'>Περισσότερα</a></li>
					<li><a href='quiz.php'>Quiz</a></li>
					<li><a href='signup.php'><i class='fa fa-user-plus'></i>Εγγραφή</a></li>
					<li><a href='login.php'><i class='fa fa-fw fa-user'></i> Είσοδος</a></li>    
				</ul>";
	break;
}



?>