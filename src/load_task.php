<?php
include_once('../autoloader.php');
spl_autoload_register('autoload');

$task_id = htmlspecialchars(intval($_GET['id']));

$controller = new TaskController(new TaskManager());
$result = $controller->loadTask($task_id);

header('Content-type: application/json');
echo json_encode($result);
