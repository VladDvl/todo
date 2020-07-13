<?php

class TaskController {
    private $manager;

    public function __construct(TaskManager $manager)
    {
        $this->manager = $manager;
    }

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

    public function selectOne()
    {
        $task_id = $_GET['id'];

        $task = $this->manager->selectTask($task_id);
        $comments = $this->manager->selectComments($task_id);

        $vars = compact('task','comments');
        return $vars;
    }

    public function createTask()
    {
        if ($_POST['submit'] == 'send') {

            $this->manager->addTask($_POST['name'], $_POST['description'], $_POST['status']);
        }

        header("Location: ../index.php");
    }

    public function updateTask()
    {
        if ($_POST['submit'] == 'send') {

            $this->manager->updateTask($_POST['status'], $_POST['id']);

            if (!empty($_POST['body'])) {
                $this->manager->addComment($_POST['id'], $_POST['body']);
            }
        }

        header("Location: ../index.php");
    }
}
