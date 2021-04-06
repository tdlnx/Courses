<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lesson 8 Preview</title>
</head>

<body>
    <h1>Task for the Day</h1>
    <ul>
        <li>
            <strong>Name: </strong> <?= $task['title']; ?>
        </li>
        <li>
            <strong>Due Date: </strong> <?= $task['due']; ?>
        </li>
        <li>
            <strong>Responsible: </strong> <?= $task['assigned_to']; ?>
        </li>
        <li>
            <strong>Status: </strong>
            <?php
            if ($task['completed']) {
                echo '&#10004'; // check
            } else {
                echo '&#10008'; // 'x'
            }
            ?>
        </li>
    </ul>
</body>

</html>