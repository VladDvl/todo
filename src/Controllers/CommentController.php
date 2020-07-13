<?php

class CommentController extends Controller {
    public function addComment($id, $body)
    {
        $result = $this->manager->addComment($id, $body);

        //header("Location: ../index.php");

        return $result;
    }

    public function getComment($id)
    {
        $result = $this->manager->getComment($id);

        return $result;
    }
}
