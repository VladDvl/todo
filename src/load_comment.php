<?php
include_once('../autoloader.php');
spl_autoload_register('autoload');

$comment_id = htmlspecialchars(intval($_GET['id']));

$controller = new CommentController(new TaskManager());
$result = $controller->getComment($comment_id);

header('Content-type: application/json');
echo json_encode($result);
