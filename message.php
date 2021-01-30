<?php

session_start();

require 'functions.php';

if (isset($_POST['submit-message'] )){

    $message = $_POST['message'];
    $postedBy = $_SESSION['user_id'];
    $userId = $_GET['user_id'];

    if (!isset($_SESSION['logged_in'])) {
       echo "You can't comment if you're not logged in!";
    } else {
        
        $user = [ 
            'body' => $message,
            'posted_by' => $postedBy,
            'user_id'  => $userId,
        ];

        addToDatabase($connection, 'posts', $user);
        header('Location: profile.php?user=' . $userId);
    }
   
       
        
} else {
    
}


