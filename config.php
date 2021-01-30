<?php

$database = [
    'host' => '127.0.0.1',
    'name' => 'mini-sm',
    'user' => 'root',
    'password' => 'mysql'
];

function connectDB($database)
{
    try {
        return new PDO ("mysql:host={$database['host']};dbname={$database['name']}", $database['user'], $database['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

$connection = connectDB($database);

?>


