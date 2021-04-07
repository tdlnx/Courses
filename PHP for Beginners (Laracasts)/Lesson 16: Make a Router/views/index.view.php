<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lesson 15 Preview</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
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