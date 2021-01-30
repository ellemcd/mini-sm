<?php

require ('config.php');

//$connection = connectDB($database);
// $users = getUsers($connection);
// $user = getOneUser($connection, $user_id);
// $posts = getUserPosts($connection, $user_id);
// $profilePicture = getProfilePicture($connection, $user_id);

function addToDatabase($connection, $tableName, $newData) {
   
    $sql = sprintf(
        'INSERT INTO %s (%s) VALUES (%s)',
        $tableName, 
        implode(', ', array_keys($newData)),
        ':' . implode(', :', array_keys($newData))
        );

    $statement = $connection -> prepare($sql);
    $statement -> execute($newData);

    // returns the latest id that's been added in the database.
    return $connection->lastInsertId();
}

function getUserPosts($connection, $user_id) {
    $statement = $connection -> prepare ('SELECT users.first_name, posts.posted_by, posts.body, posts.created_at, posts.id FROM posts INNER JOIN users ON users.id = posts.posted_by WHERE user_id = :user_id');

    $statement->execute([
        'user_id' => $user_id,
    ]);

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function getUsers($connection){

    $statement = $connection->prepare('SELECT * FROM users');
        
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $users;

}

function combinePicAndUser($connection) {
    
    // combine the users and images table by using the id from the users table and the user_id in images.
    $statement = $connection -> prepare ('SELECT users.id, users.first_name, users.last_name, users.country, users.created_at, images.file_name FROM users LEFT JOIN images ON users.id = images.user_id');

    $statement->execute();

    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    // loop to see if file_name is empty, if it is, a deafult picture will be added.
    foreach ($users as $index => $user){
        if(empty($user['file_name'])) {
            $users[$index]['file_name'] = 'default.png';
        }
    }

    return $users;
}

function getOneUser($connection, $user_id){

    $statement = $connection->prepare('SELECT * FROM users WHERE id = :user_id');

    $statement->execute([
        'user_id' => $user_id,
    ]);

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // reset only return the first result in the array.
    return reset($user);
}


function getProfilePicture($connection, $user_id) {

    $statement = $connection->prepare('SELECT file_name FROM images WHERE user_id = :user_id');
      
    $statement->execute([
        'user_id' => $user_id,
    ]);
  
    $picture = $statement->fetchAll(PDO::FETCH_ASSOC);

    // if the person hasn't uploaded a profile picture, a default picture will show.
    if (empty($picture)) {
        return 'uploads/default.png';
    }

    return 'uploads/' . $picture[0]['file_name'];
}
  
function checkIfEmailExist($connection, $email)
{
    $statement = $connection -> prepare('SELECT * FROM users WHERE email = :email');

    $statement->execute([
        'email' => $email
    ]);

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


