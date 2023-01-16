<?php
	require_once "scripts/connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ο λογαριασμός μου</title>
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
			<div class="container">
				<br>
				<div class="head">Ο λογαριασμός μου</div>
				<div class="ypo">Το Username σας δεν επιτρέπεται να το αλλάξετε!</div>
				<br>
				<form action="scripts/updateUserInfo.php" method="post" enctype="multipart/form-data">
					<fieldset class="customize">
						<div class="photoprofil">
							<div class="photo">
								<label for="id_user_Photo">
									<img id="user_photo_id" src="<?php echo $_userPhoto;?>" alt="user photo">
								</label>
							</div>
							<br>
							<div class="photoo">
								<i class="fa fa-file-image-o"></i><input type="file" id="photo" name="photo" >
							</div>
						</div>
						<div class="elements">
							<label for="id_user_Name">Username: 
								<input type="text" name="userName" id="id_user_Name" disabled value="<?php echo $_userName;?>">
							</label>
							<br>
							<label for="id_user_FName">Name: 
								<input type="text" name="userFName" id="id_user_FName" value="<?php echo $_userFName;?>">
							</label>
							<br>
							<label for="id_user_LName">LastName: 
								<input type="text" name="userLName" id="id_user_LName" value="<?php echo $_userLName;?>">
							</label>
							<br>
							<label for="id_user_Mail">E-Mail: 
								<input type="text" name="userMail" id="id_user_Mail" value="<?php echo $_userMail;?>">
							</label>
							<br>
							<label for="id_user_Password">Password: 
								<input type="password" name="userPassword" id="id_user_Password" placeholder="*************">
							</label>
							<br>
							<label for="id_user_Ver_Password">Confirm Password: 
								<input type="password" name="userVerPassword" id="id_user_Ver_Password" placeholder="*************">
							</label>
							<br>
							<label for="id_user_Date">B-day: 
								<input type="date" name="userDate" id="id_user_Date" value="<?php echo $_userDate;?>">
							</label>
							<br>
							<br>
							<label for="id_user_Gender">Gender:
								<select name="gen" id="gen">
									<option value="<?php echo $_userGender;?>" selected><?php echo $_userGender;?> </option>
									<option value="<?php if($_userGender=="female"){
															$_value="male";
														}	
														else{
															$_value="female";
														}?>"><?php echo $_value;?>  </option>
								</select>
							</label>
							<br>
							<div class="buttons">
								<input type="submit" name="changes" value="Αλλαγή">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</main>
		<hr>
		<footer>
			Copyright &copy; <strong>Ioanna Papailiou-Stefania Tzanera</strong> 2020-2021
		</footer>
		
    </body>
</html>