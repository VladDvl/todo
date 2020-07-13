<?php

class CreateTaskHandler extends FormHandler {
    public function handleForm()
    {
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['status'])) {
            $name = trim($_POST['name']);
            $name = htmlspecialchars($name);

            $description = trim($_POST['description']);
            $description = htmlspecialchars($description);

            $status = htmlspecialchars($_POST['status']);

            $controller = new TaskController(new TaskManager());
            $result = $controller->createTask($name, $description, $status);
            return $result;
        } else {
            throw new \Exception("Invalid input");
        }
    }
}
