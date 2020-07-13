<?php

class CommentController extends Controller {
    public function addComment($id, $body)
    {
        $this->manager->addComment($id, $body);

        //header("Location: ../index.php");
    }
}
