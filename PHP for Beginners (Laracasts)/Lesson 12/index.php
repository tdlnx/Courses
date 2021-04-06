<?php

require 'functions.php';

// Todo Application potential classes
//
// todo, comment, user, etc

class Task
{
    // Properties of the class
    public $description;
    public $completed = false;

    // Constructor
    public function __construct($description)
    {
        // Automatically triggered on creation
        $this->description = $description;
    }

    public function isComplete()
    {
        return $this->completed;
    }

    public function complete()
    {
        $this->completed = true;
    }
}

$tasks = [
    new Task('Go to work'),
    new Task('Eat lunch'),
    new Task('Go home')
];

$tasks[0]->complete();

// dd($tasks);

require 'index.view.php';
