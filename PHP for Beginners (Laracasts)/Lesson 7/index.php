<?php

function dd($varToDump)
{
    die(var_dump($varToDump));
}

$person = [
    'Age' => 32,
    'Hair' => 'brown',
    'Career' => 'Developer'
];

$person['Name'] = 'Travis';

// Dump $person using custom function
dd($person);

require "index.view.php";
