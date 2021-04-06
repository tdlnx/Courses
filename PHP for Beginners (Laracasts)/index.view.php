<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Testing</title>
</head>

<body>
    <p>PHP Unordered List</p>
    <br>
    <ul>
        <?php foreach ($names as $name) : ?>
            <li><?= $name; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>