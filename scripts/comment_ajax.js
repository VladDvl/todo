function sendComment() {
    let id = document.getElementById('id');
    let body = document.getElementById('comment');
    let submit = document.getElementById('submit1');

    id = id.value;
    body = body.value;
    submit = submit.value;

    let data = `id=${id}&body=${body}&submit=${submit}`;

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let comment_id = this.response;
            comment_id = comment_id.replace(/['"]+/g, '');
            loadComment(comment_id);
        }
    };

    xhttp.open("POST","src/handle_form.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
    return true;
}

function loadComment(comment_id) {
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.response;
            response = JSON.parse(response);
            drawComment(response);
        }
    };

    xhttp.open("GET","src/load_comment.php?id=" + comment_id,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return true;
}

function drawComment(response) {
    let comment_body = response.body;
    let comment_created = response.created_at;

    let c_body = document.createElement('p');
    c_body.innerHTML = comment_body;
    let c_created = document.createElement('p');
    c_created.innerHTML = comment_created;
    let c_div = document.createElement('div');
    c_div.classList.add("comment");
    c_div.append(c_body);
    c_div.append(c_created);

    let c_block = document.getElementById('com-block');
    c_block.append(c_div);
}

let comment_form = document.getElementById('create-comment');

comment_form.addEventListener("submit", function(event){
    event.preventDefault();
    event = sendComment();
});
