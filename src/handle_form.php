<?php
spl_autoload_register();

if (isset($_POST['submit'])) {
    $handler = FormHandler::init($_POST['submit']);
    $handler->handleForm();
}
