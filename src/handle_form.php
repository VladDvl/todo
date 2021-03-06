<?php
include_once('../autoloader.php');
spl_autoload_register('autoload');

if (isset($_POST['submit'])) {
    $handler = FormHandler::init($_POST['submit']);
    $result = $handler->handleForm();

    header('Content-type: application/json');
    echo json_encode($result);
}
