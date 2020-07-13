<?php
spl_autoload_register();

$controller = new TaskController(new TaskManager());
$vars = $controller->selectTasks();
extract($vars);
