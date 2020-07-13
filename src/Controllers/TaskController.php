<?php

class TaskController extends Controller {
    public function selectTasks()
    {
        $tasks = $this->manager->selectAllTasks();

        $tasksTodo = [];
        $tasksDoing = [];
        $tasksDone = [];
        foreach ($tasks as $task)
        {
            $task_id = $task['id'];
            $comments = $this->manager->countComments($task_id);
            $task['comments'] = $comments;

            if ($task['status'] == 'TODO') {
                $tasksTodo[] = $task;
            } elseif ($task['status'] == 'DOING') {
                $tasksDoing[] = $task;
            } else {
                $tasksDone[] = $task;
            }
        }
        $vars = compact('tasksTodo','tasksDoing','tasksDone');
        return $vars;
    }

    public function loadTask($id)
    {
        $task = $this->manager->selectTask($id);
        $task_id = $task['id'];
        $comments = $this->manager->countComments($task_id);
        $task['comments'] = $comments;
        return $task;
    }

    public function selectOne()
    {
        $task_id = $_GET['id'];

        $task = $this->manager->selectTask($task_id);
        $comments = $this->manager->selectComments($task_id);

        $vars = compact('task','comments');
        return $vars;
    }

    public function createTask($name, $description, $status)
    {
        $result = $this->manager->addTask($name, $description, $status);

        return $result;
        //header("Location: ../index.php");
    }

    public function updateTask($status, $id)
    {
        $this->manager->updateTask($status, $id);

        //header("Location: ../index.php");
    }
}
