function updateTask()
{
    let id = document.getElementById('id');
    let status = document.getElementById('status');
    let submit = document.getElementById('submit');

    id = id.value;
    status = status.value;
    submit = submit.value;

    let data = `status=${status}&id=${id}&submit=${submit}`;

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            redrawStatus(status);
        }
    };

    xhttp.open("POST","src/handle_form.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    return true;
}

function redrawStatus(status)
{
    let task_status = document.getElementById('task-status');
    task_status.innerHTML = "Статус: " + status;
}

let update_form = document.getElementById('update-task');

update_form.addEventListener("submit", function(event){
    event.preventDefault();
    event = updateTask();
});
