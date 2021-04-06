<?php

/*
* This whole thing doesn't work for some reason eventhough my config looks
* exactly like the instructor's. There's got to be something else wrong but
* I'm not looking any more today.
*/

require 'functions.php';

try {
    $pdo = new PDO("mysql:host=192.168.64.2; dbname=mytodos", "root", "");
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$statement = $pdo->prepare("select * from todos");
$statement->execute();

var_dump($statement->fetchAll());

require 'index.view.php';
