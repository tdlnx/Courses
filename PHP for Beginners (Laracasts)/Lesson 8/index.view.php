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
            <strong>Status: </strong> <?= $task['completed'] ? 'Complete' : 'Incomplete'; ?>
        </li>
    </ul>
</body>

</html>