<?php
spl_autoload_register();

$controller = new TaskController(new TaskManager());
$vars = $controller->selectOne();
extract($vars);
