function apotelesmata(){
	erwthsh1 = document.quiz.apant.value;

	erwthsh2 = document.quiz.question1.value;
					
	erwthsh3 = document.quiz.sinthiki.value;

	erwthsh4a = document.getElementById("ellada").checked;
	erwthsh4b = document.getElementById("bulgaria").checked;
	erwthsh4c = document.getElementById("russia").checked;
	erwthsh4d = document.getElementById("mavrovounio").checked;
	erwthsh4e = document.getElementById("servia").checked;
					
	erwthsh5 = document.quiz.answer.value;
					
	vathmoi = 0;
					
	if(erwthsh1 == "true"){
		vathmoi++;
	}
	if(erwthsh2 == "q2"){
		vathmoi++;
	}
	if(erwthsh3 == "madrith"){
		vathmoi++;
	}
	if(erwthsh4a == true && erwthsh4b == true && erwthsh4c == false && erwthsh4d == true && erwthsh4e == true){
		vathmoi++;
	}
					
	if(erwthsh5 == "Μακεδονικός" || erwthsh5=="μακεδονικός" || erwthsh5=="Μακεδονικος"){
		vathmoi++;
	}

			
	alert("Το σκορ σου είναι " +  vathmoi  + "/5");
}
