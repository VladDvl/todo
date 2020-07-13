let form = document.getElementById('create-form');
let button = document.getElementById('show-btn');

form.style.visibility = "hidden";
button.style.backgroundColor = "#6CFA6E";

button.onclick = function () {
    if (form.style.visibility === "hidden") {
        form.style.visibility = "visible";
        button.style.backgroundColor = "#FAE589";
    } else {
        form.style.visibility = "hidden";
        button.style.backgroundColor = "#6CFA6E";
    }
};
