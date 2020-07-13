<?php

class CreateCommentHandler extends FormHandler {
    public function handleForm()
    {
        if (isset($_POST['id']) && !empty($_POST['body'])) {
            $id = intval($_POST['id']);

            $body = trim($_POST['body']);
            $body = htmlspecialchars($body);

            $controller = new CommentController(new TaskManager());
            $result = $controller->addComment($id, $body);
            return $result;
        } else {
            throw new \Exception("Invalid input");
        }
    }
}
