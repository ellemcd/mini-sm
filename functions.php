<?php

require ('config.php');

$connection = connectDB($database);
$users = getUsers($connection);

$email = $title = $ingredients = '';
$errors = array('first_name' =>'','last_name'=>'', 'email' => '','password' => '');
// $statement = $connection->prepare("INSERT INTO users (first_name, last_name) VALUES ('test' 'test')");
// $result = $statement->execute();
// var_dump($result);
// die;

// $statement = $connection->prepare("INSERT INTO users (first_name, last_name) VALUES (:first_name, :last_name)");
// $result = $statement->execute([
//   'first_name' => 'test',
//   'last_name' => 'test'
// ]);
// var_dump($result);
// die;



// $statement = $connection->prepare("INSERT INTO users (first_name, last_name) VALUES ('test' 'test')");

// $statement->execute();
// die;

function addToDatabase($connection, $tableName, $newData) {
   
    $sql = sprintf(
        'INSERT INTO %s (%s) VALUES (%s)',
        $tableName, 
        implode(', ', array_keys($newData)),
        ':' . implode(', :', array_keys($newData))
        );

        // var_dump($sql); 
        // die;

    //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
       
    $statement = $connection -> prepare($sql);
    $statement -> execute($newData);

    // print '<pre>';
    // print_r($connection->errorInfo());
    // die;

    
}

function getUsers($connection){

    $statement = $connection->prepare('SELECT * FROM users');
        
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $results;

}
