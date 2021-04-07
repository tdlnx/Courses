<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lesson 9 Preview</title>
</head>

<body>
    <h3>Course work:</h3>
    <?= dd($animals); ?>
    <h3>Homework:</h3>
    <?php
    if (checkID(15)) {
        echo 'Come on in.';
    } else {
        echo 'Stay home, kid.';
    }
    ?>
</body>

</html>