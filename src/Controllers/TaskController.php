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
            $task_id = intval($task['id']);
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

    public function loadTask(int $id)
    {
        $task = $this->manager->selectTask($id);
        $task_id = intval($task['id']);
        $comments = $this->manager->countComments($task_id);
        $task['comments'] = $comments;
        return $task;
    }

    public function selectOne()
    {
        $task_id = intval($_GET['id']);

        $task = $this->manager->selectTask($task_id);
        if (!empty($task)) {
            $comments = $this->manager->selectComments($task_id);

            $vars = compact('task','comments');
            return $vars;
        } else {
            header("Location: index.php");
        }
    }

    public function createTask(string $name, string $description, string $status)
    {
        $result = $this->manager->addTask($name, $description, $status);

        return $result;
    }

    public function updateTask(string $status, int $id)
    {
        $result = $this->manager->updateTask($status, $id);

        return $result;
    }
}
