<?php

require ('config.php');

$connection = connectDB($database);
$users = getUsers($connection);


// $email = $title = $ingredients = '';
// $errors = array('first_name' =>'','last_name'=>'', 'email' => '','password' => '');
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

function updateInDataBase($connection, $tableName, $newData) {
   
    $sql = sprintf(
        'UPDATE %s SET (%s) WHERE id = %s', 
        $tableName, 
        implode(', ', array_keys($newData)),
        ':' . implode(', :', array_keys($newData))
        );

        // var_dump($sql); 
        // die;

    //  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $statement = $connection -> prepare($sql);
    $statement -> execute($newData);
    //  print '<pre>';
    //  print_r($connection->errorInfo());
    //  die;

}


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






function getUserPosts($connection, $user_id) {
    $statement = $connection->prepare('SELECT users.first_name, posts.posted_by, posts.body, posts.created_at, posts.id FROM posts INNER JOIN users ON users.id = posts.posted_by WHERE user_id = :user_id');
    $statement->execute([
        'user_id' => $user_id,
    ]);

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function getUsers($connection){

    $statement = $connection->prepare('SELECT * FROM users');
        
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $results;

}

function getOneUser($connection, $user_id){

    $statement = $connection->prepare('SELECT * FROM users WHERE id = :user_id');

    $statement->execute([
        'user_id' => $user_id,
    ]

    );

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    // reset retunerar det första resultet i arrayen.
    return reset($results);
}


function getProfilePicture($connection, $user_id){

    $statement = $connection->prepare('SELECT file_name FROM images WHERE user_id=:user_id');
      
    $statement->execute([
        'user_id' => $user_id,
    ]);
  
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (empty($results)) {
        return 'uploads/default.png';
    }

    return 'uploads/' . $results[0]['file_name'];
  }
  
