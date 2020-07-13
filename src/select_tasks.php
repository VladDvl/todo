<?php

$controller = new TaskController(new TaskManager());
$vars = $controller->selectTasks();
extract($vars);
