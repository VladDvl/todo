<?php
include_once "src/select_tasks.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks list</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<div class="tasks-block">
    <div>
        <h2>TODO</h2>
        <?php foreach ($tasksTodo as $task): ?>
            <a href="<?= "edit.php?id={$task['id']}" ?>">
                <p><?= $task['name'] ?></p>
            </a>
            <p>Описание: <?= $task['description'] ?></p>
            <p>Комментариев: <?= $task['comments'] ?></p>
            <p>Создана: <?= $task['created_at'] ?></p>
        <? endforeach; ?>
    </div>

    <div>
        <h2>DOING</h2>
        <?php foreach ($tasksDoing as $task): ?>
            <a href="<?= "edit.php?id={$task['id']}" ?>">
                <p><?= $task['name'] ?></p>
            </a>
            <p>Описание: <?= $task['description'] ?></p>
            <p>Комментариев: <?= $task['comments'] ?></p>
            <p>Создана: <?= $task['created_at'] ?></p>
        <?php endforeach; ?>
    </div>

    <div>
        <h2>DONE</h2>
        <?php foreach ($tasksDone as $task): ?>
            <a href="<?= "edit.php?id={$task['id']}" ?>">
                <p><?= $task['name'] ?></p>
            </a>
            <p>Описание: <?= $task['description'] ?></p>
            <p>Комментариев: <?= $task['comments'] ?></p>
            <p>Создана: <?= $task['created_at'] ?></p>
        <?php endforeach; ?>
    </div>
</div>

<button id="show-btn">Создать задачу</button>

<form id="create-form" method="post" action="src/create_task.php">
    <label for="name">Название</label>
    <input id="name" type="text" name="name" required>

    <label for="description">Описание</label>
    <input id="description" type="text" name="description" required>

    <label for="status">Статус</label>
    <select id="status" name="status" required>
        <option>TODO</option>
        <option>DOING</option>
        <option>DONE</option>
    </select>

    <button type="submit" name="submit" value="send">Создать</button>
</form>

<script src="scripts/script.js"></script>
</body>
</html>
