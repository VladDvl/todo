<?php

class UpdateTaskHandler extends FormHandler {
    public function handleForm()
    {
        if (!empty($_POST['status']) && isset($_POST['id'])) {
            $status = htmlspecialchars($_POST['status']);
            $id = intval($_POST['id']);

            $controller = new TaskController(new TaskManager());
            $controller->updateTask($status, $id);
            return $status;
        } else {
            exit("Invalid input");
        }
    }
}
