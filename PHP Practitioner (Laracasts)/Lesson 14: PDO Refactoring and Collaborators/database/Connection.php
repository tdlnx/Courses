<?php

class Connection
{

    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=mytodo', 'root', 'rootPass');
        } catch (PDOException $e) {
            dd('Connection Failed: ' . $e->getMessage());
        }
    }
}
