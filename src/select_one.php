<?php

$controller = new TaskController(new TaskManager());
$vars = $controller->selectOne();
extract($vars);
