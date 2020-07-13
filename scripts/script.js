let form = document.getElementById('create-form');
let button = document.getElementById('show-btn');

form.style.visibility = "hidden";

button.onclick = function () {
    if (form.style.visibility === "hidden") {
        form.style.visibility = "visible";
    } else {
        form.style.visibility = "hidden";
    }
};
