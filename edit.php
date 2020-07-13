<?php
include_once "src/select_one.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit task</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<h2>Task</h2>
<p>Имя: <?= $task['name'] ?></p>
<p>Описание: <?= $task['description'] ?></p>
<p>Статус: <?= $task['status'] ?></p>

<form method="post" action="src/update_task.php">
    <input type="hidden" name="id" value="<?= $task['id'] ?>" required>

    <label for="status">Статус</label>
    <select id="status" name="status" required>
        <option>TODO</option>
        <option>DOING</option>
        <option>DONE</option>
    </select>

    <label for="comment">Добавить комментарий:</label>
    <input id="comment" type="text" name="body">

    <button type="submit" name="submit" value="send">Обновить задачу</button>
</form>

<div class="comments-block">
    <p>Комментарии:</p>
    <?php foreach ($comments as $comment): ?>
        <p><?= $comment['body'] ?></p>
        <p><?= $comment['created_at'] ?></p>
    <?php endforeach; ?>
</div>

</body>
</html>
