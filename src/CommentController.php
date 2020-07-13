<?php

class CommentController extends Controller {
    public function addComment()
    {
        if ($_POST['submit'] == 'send') {

            $this->manager->addComment($_POST['id'], $_POST['body']);

        }

        header("Location: ../index.php");
    }
}
