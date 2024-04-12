function hover(hover) {
    hover.parentElement.classList.toggle("focused-in");
}
function hoverchildon(hover, hover2) {
    var element = document.getElementById(hover);
    element.classList.add("focused-in");
    hover2.classList.add("focused-in");
}
function hoverchildoff(hover, hover2) {
    var element = document.getElementById(hover);
    element.classList.remove("focused-in");
    hover2.classList.remove("focused-in");
}