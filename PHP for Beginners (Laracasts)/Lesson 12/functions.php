<?php

function dd($varToDump)
{
    echo '<pre>';
    var_dump($varToDump);
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
