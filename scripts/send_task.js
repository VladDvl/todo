function sendTask() {

    let id = null;
    let name = document.getElementById('name');
    let description = document.getElementById('description');
    let status = document.getElementById('status');
    let submit = document.getElementById('submit');

    name = name.value;
    description = description.value;
    status = status.value;
    submit = submit.value;

    let data = `name=${name}&description=${description}&status=${status}&submit=${submit}`;

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            id = this.response;
            id = id.replace(/['"]+/g, '');
            load_task(id);
        }
    };

    xhttp.open("POST","src/handle_form.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    return true;
}

function load_task(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.response;
            response = JSON.parse(response);
            draw_task(response);
        }
    };

    let url = "src/load_task.php?id=" + id;
    xhttp.open("GET",url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return true;
}

function draw_task(response) {
    let task_id = response.id;
    let task_name = response.name;
    let task_description = response.description;
    let task_status = response.status;
    let task_created = response.created_at;
    let task_comments = response.comments;

    let a = document.createElement('a');
    a.href = `edit.php?id=${task_id}`;
    let p_name = document.createElement('p');
    p_name.innerHTML = task_name;
    a.append(p_name);
    let p_desc = document.createElement('p');
    p_desc.innerHTML = "Описание: " + task_description;
    let p_coms = document.createElement('p');
    p_coms.innerHTML = "Комментариев: " + task_comments;
    let p_created = document.createElement('p');
    p_created.innerHTML = "Создана: " + task_created;

    let li = document.createElement('li');
    li.append(a);
    li.append(p_desc);
    li.append(p_coms);
    li.append(p_created);

    if (task_status == 'TODO') {
        let ol = document.getElementById('todo-list');
        ol.append(li);
    } else if (task_status == 'DOING') {
        let ol = document.getElementById('doing-list');
        ol.append(li);
    } else {
        let ol = document.getElementById('done-list');
        ol.append(li);
    }
}

if (form == null) {
    form = document.getElementById('create-form');
}

form.addEventListener("submit", function(event){
    event.preventDefault();
    event = sendTask();
});
