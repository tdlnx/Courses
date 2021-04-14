<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lesson 15 Preview</title>
</head>

<body>

    <?php require('partials/nav.php'); ?>

    <h1>Tasks</h1>

    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <?php if ($task->completed) {
                    echo '<strike>' . $task->description . '</strike>';
                } else {
                    echo $task->description;
                } ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>