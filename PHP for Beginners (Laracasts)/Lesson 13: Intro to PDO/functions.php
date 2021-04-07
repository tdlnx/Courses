<?php

function connectToDb()
{
    try {
        return new PDO('mysql:host=localhost;dbname=mytodo', 'root', 'rootPass');
    } catch (PDOException $e) {
        dd('Connection Failed: ' . $e->getMessage());
    }
}

function fetchAllTasks($pdo)
{
    $statement = $pdo->prepare('SELECT * FROM todos');
    $statement->execute();
    $tasks = $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
    return $tasks;
}

function dd($varToDump)
{
    echo '<pre>';
    die(var_dump($varToDump));
    echo '</pre>';
}

// Homework Function
function checkID($age)
{
    if ($age >= 21) {
        return true;
    }
}
// ===
