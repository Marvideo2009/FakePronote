function edtnext() {
    var vars;
    const d = new Date();
    var vars = vars + 1;
    if (vars <= 0) {
        vars = 1;
    }
    let day = d.getDate()
    var element = document.getElementById(day);
    var element2 = document.getElementById(day + 1);
    var date = document.getElementById("date");
    element.classList.toggle("displaynone");
    element2.classList.toggle("displaynone");
    date.stepUp();
    console.log(vars);
}

function edtprev() {
    const d = new Date();
    let day = d.getDate()
    var element = document.getElementById(day);
    var element2 = document.getElementById(day - 1);
    var date = document.getElementById("date");
    element.classList.toggle("displaynone");
    element2.classList.toggle("displaynone");
    date.stepDown();
}