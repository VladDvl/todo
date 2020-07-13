<?php
spl_autoload_register();

$controller = new TaskController(new TaskManager());
$controller->updateTask();
