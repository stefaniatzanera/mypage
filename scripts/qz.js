var question = {
    ques: "",
    difficulty: "",
    type: "",
    answers: "",
    correctAnswers: ""
};

var data = "";

function begin(question_difficulty)
{
    alert(question_difficulty.value);
    document.getElementById("difficulty_div").innerHTML = "";
    document.getElementById("begin_button").innerHTML = "";
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onload = function()
    {
        document.getElementById("questions").innerHTML = xmlhttp.responseText;
    };
    xmlhttp.open("POST", "scripts/loginQuiz.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("difficulty=" + question_difficulty.value);

}
