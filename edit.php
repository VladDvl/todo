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

<div class="task-block">
    <a href="index.php">
        <h2>Tasks</h2>
    </a>
    <div class="task">
        <p>Имя: <?= $task['name'] ?></p>
        <p>Описание: <?= $task['description'] ?></p>
        <p>Статус: <?= $task['status'] ?></p>
    </div>
</div>

<div class="forms-block">
    <form method="post" action="src/handle_form.php">
        <input type="hidden" name="id" value="<?= $task['id'] ?>" required>

        <label for="status">Статус:</label>
        <select id="status" name="status" required>
            <?php
            $options = ['TODO', 'DOING', 'DONE'];
            foreach ($options as $option)
            {
                if ($task['status'] == $option) {
                    echo "<option selected>$option</option>";
                } else {
                    echo "<option>$option</option>";
                }
            }
            ?>
        </select>

        <button type="submit" name="submit" value="update-task">Обновить задачу</button>
    </form>

    <form method="post" action="src/handle_form.php">
        <input type="hidden" name="id" value="<?= $task['id'] ?>" required>

        <label for="comment">Добавить комментарий:</label>
        <input id="comment" type="text" name="body">

        <button type="submit" name="submit" value="create-comment">Добавить комментарий</button>
    </form>
</div>

<div class="comments-block">
    <p>Комментарии:</p>
    <?php foreach ($comments as $comment): ?>
    <div class="comment">
        <p><?= $comment['body'] ?></p>
        <p><?= $comment['created_at'] ?></p>
    </div>
    <?php endforeach; ?>
</div>

</body>
</html>
