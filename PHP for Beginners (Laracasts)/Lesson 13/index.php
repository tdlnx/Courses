<?php

/* The data.php file is there to hold information
 * that I don't want to upload to GitHub; it's not
 * part of the lessons.
 */

require 'functions.php';
require 'data.php';

try {
    $pdo = new PDO('mysql:host=' . $hostName . '; dbname=mytodos', 'port=' . $portNo . '', 'root', '');
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


$statement = $pdo->prepare('SELECT * FROM todos');
$statement->execute();

var_dump($statement->fetchAll());


require 'index.view.php';
