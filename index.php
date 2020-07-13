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
        <ol>
        <?php foreach ($tasksTodo as $task): ?>
        <li>
            <a href="<?= "edit.php?id={$task['id']}" ?>">
                <p><?= $task['name'] ?></p>
            </a>
            <p>Описание: <?= $task['description'] ?></p>
            <p>Комментариев: <?= $task['comments'] ?></p>
            <p>Создана: <?= $task['created_at'] ?></p>
        </li>
        <? endforeach; ?>
        </ol>
    </div>

    <div>
        <h2>DOING</h2>
        <ol>
        <?php foreach ($tasksDoing as $task): ?>
        <li>
            <a href="<?= "edit.php?id={$task['id']}" ?>">
                <p><?= $task['name'] ?></p>
            </a>
            <p>Описание: <?= $task['description'] ?></p>
            <p>Комментариев: <?= $task['comments'] ?></p>
            <p>Создана: <?= $task['created_at'] ?></p>
        </li>
        <?php endforeach; ?>
        </ol>
    </div>

    <div>
        <h2>DONE</h2>
        <ol>
        <?php foreach ($tasksDone as $task): ?>
        <li>
            <a href="<?= "edit.php?id={$task['id']}" ?>">
                <p><?= $task['name'] ?></p>
            </a>
            <p>Описание: <?= $task['description'] ?></p>
            <p>Комментариев: <?= $task['comments'] ?></p>
            <p>Создана: <?= $task['created_at'] ?></p>
        </li>
        <?php endforeach; ?>
        </ol>
    </div>
</div>

<button id="show-btn">Создать задачу</button>

<form id="create-form" method="post" action="src/handle_form.php">
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

    <button type="submit" name="submit" value="create-task">Создать</button>
</form>

<script src="scripts/script.js"></script>
</body>
</html>
