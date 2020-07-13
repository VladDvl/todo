<?php

class CommentController extends Controller {
    public function addComment(int $id, string $body)
    {
        $result = $this->manager->addComment($id, $body);

        return $result;
    }

    public function getComment(int $id)
    {
        $result = $this->manager->getComment($id);

        return $result;
    }
}
