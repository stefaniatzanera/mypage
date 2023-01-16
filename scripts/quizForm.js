function HtmlEncode(s)
{
    var el = document.createElement("div");
    el.innerText = el.textContent = s;
    s = el.innerHTML;
    return s;
}


var question = {
    ques: "",
    difficulty: "",
    type: "",
    answers: Array(),
    correctAnswers: Array()
};


var inner = "";

function next()
{
    question.ques = document.getElementById("question").value;
    question.difficulty = document.getElementById("question_difficulty").value;
    question.type = document.getElementById("question_type").value;

    if (question.type == "true/false")
    {
        inner = '<div class="container"><input type="text" id="answer_1" name="answer_1" placeholder="Απαντηση 1" required><br><br>' + 
                '<input type="text" id="answer_2" name="answer_2" placeholder="Απαντηση 2" required><br><br>' +
                '<div class="buttons"><input type="button" value="Συνέχεια" onclick="nextCorrectAnswer()"></div>';
    }
    else if(question.type == "radio" || question.type == "checkbox")
    {
        inner = '<div class="container"><input type="text" id="answer_1" name="answer_1" placeholder="Απαντηση 1" required><br><br>' + 
                '<input type="text" id="answer_2" name="answer_2" placeholder="Απαντηση 2" required><br><br>'+
                '<input type="text" id="answer_3" name="answer_3" placeholder="Απαντηση 3" required><br><br></div>' +
                '<div class="buttons"><input type="button" value="Συνέχεια" onclick="nextCorrectAnswer()"></div>';
    }
    else
    {
        inner = '<div class="buttons"><input type="text" id="answer_1" name="answer_1" placeholder="Απαντηση 1" required><br>' + 
                '<input type="button" value="Υποβολή" onclick="nextCorrectAnswer()"></div>';
    }

    document.getElementById("add_question").innerHTML = "<div class='head'>Προτεινε καποια/καποιες απαντησεις.</div><br>" + inner;
}

function nextCorrectAnswer()
{
    var answers = document.querySelectorAll("[id*='answer_']");
    var answersString = [];
    for (let i = 0; i < answers.length; i++)
    {
        question.answers.push(answers[i].value);
    }


    if(question.type == "text")
    {
        question.correctAnswers.push(question.answers[0]);
        submit();
        return;
    } 
    else if (question.type == "true/false")
    {
        inner = '<div class="container"><input type="radio" id="correct_answer_0" name="an" value="0" checked>' +
                '<label for="correct_answer_0">'+ question.answers[0] +'</label>' +
                '<input type="radio" id="correct_answer_1" name="an" value="1">' +
                '<label for="correct_answer_1">' + question.answers[1] + '</label></div>';
    }
    else if(question.type == "radio"){
        inner = '<div class="container"><input type="radio" id="correct_answer_0" name="an" value="0" checked>' +
                '<label for="correct_answer_0">'+ question.answers[0] +'</label>' +
                '<input type="radio" id="correct_answer_1" name="an" value="1">' +
                '<label for="correct_answer_1">' + question.answers[1] + '</label>' +
                '<input type="radio" id="correct_answer_2" name="an" value="2">' +
                '<label for="correct_answer_2">' + question.answers[2] + '</label></div>';
    }
    else if(question.type == "checkbox")
    {
        inner = '<div class="container"><input type="checkbox" id="correct_answer_0" name="an" value="0">' +
                '<label for="correct_answer_0">'+ question.answers[0] +'</label>' +
                '<input type="checkbox" id="correct_answer_1" name="an" value="1">' +
                '<label for="correct_answer_1">' + question.answers[1] + '</label>' +
                '<input type="checkbox" id="correct_answer_2" name="an" value="2">' +
                '<label for="correct_answer_2">' + question.answers[2] + '</label></div>';
    }

    document.getElementById("add_question").innerHTML = "<div class='head'>Δωστε την/τις σωστη/σωστες απαντηση/απαντησεις</div><br>" + inner + '<div class="buttons"><input type="button" value="Υποβολή" onclick="submit()"></div>';

}

function submit()
{
    if (!(question.type == "text"))
    {
        $.each($("input[name='an']:checked"), function(){
            question.correctAnswers.push($(this).val());
        });
    }
    console.table(question);

    $.post( "scripts/add_question.php", question).done(function( data ) {
        alert( "Data Loaded: " + data );
    });
    
    location.reload();
}

