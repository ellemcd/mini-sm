<?php

$database = [
    'host' => '127.0.0.1',
    'name' => 'dw_mini-sm',
    'user' => 'root',
    'password' => 'mysql'
];

function connectDB($database)
{
    try {
        return new PDO ("mysql:host={$database['host']};dbname={$database['name']}", $database['user'], $database['password']);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}



?>


