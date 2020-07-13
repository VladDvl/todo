<?php
spl_autoload_register();

$controller = new CommentController(new TaskManager());
$controller->addComment();
