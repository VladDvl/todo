<?php

class TaskManager extends Base {
    protected static $add_task = "INSERT INTO tasks (name,description,status) VALUES (?,?,?)";

    protected static $update_task = "UPDATE tasks SET status = (?) WHERE id = (?)";

    protected static $add_comment = "INSERT INTO comments (task_id,body) VALUES (?,?)";

    protected static $select_all = "SELECT * FROM tasks ORDER BY created_at";

    protected static $select_one = "SELECT * FROM tasks WHERE id = (?)";

    protected static $select_comments = "SELECT * FROM comments WHERE task_id = (?) ORDER BY created_at";

    protected static $count_comments = "SELECT COUNT(*) FROM comments INNER JOIN tasks
                                     ON comments.task_id = tasks.id WHERE tasks.id = (?)";

    public function addTask(string $name, string $description, string $status='TODO')
    {
        $data = [$name, $description, $status];
        $this->doStatement(self::$add_task, $data);
        $task_id = self::$DB->lastInsertId();
        return $task_id;
    }

    public function updateTask(string $status, int $id)
    {
        $value = [$status, $id];
        $this->doStatement(self::$update_task, $value);
    }

    public function addComment(int $task_id, string $body)
    {
        $values = [$task_id, $body];
        $this->doStatement(self::$add_comment, $values);
        $comment_id = self::$DB->lastInsertId();
        return $comment_id;
    }

    public function selectAllTasks()
    {
        $statement = $this->doStatement(self::$select_all);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectTask(int $task_id)
    {
        $value = [$task_id];
        $statement = $this->doStatement(self::$select_one, $value);
        $task = $statement->fetch(\PDO::FETCH_ASSOC);
        return $task;
    }

    public function selectComments(int $task_id)
    {
        $value = [$task_id];
        $statement = $this->doStatement(self::$select_comments, $value);
        $comments = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $comments;
    }

    public function countComments(int $task_id)
    {
        $value = [$task_id];
        $statement = $this->doStatement(self::$count_comments, $value);
        $comments = $statement->fetch(\PDO::FETCH_ASSOC);
        return $comments['COUNT(*)'];
    }
}
