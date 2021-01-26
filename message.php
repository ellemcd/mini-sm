<?php

session_start();

require 'functions.php';


if (isset($_POST['submit-message'])){
   
        $message = $_POST['message'];
        $postedBy = $_SESSION['user_id'];
        $userId = $_GET['user_id'];

        $user = [ 
            'body' => $message,
            'posted_by' => $postedBy,
            'user_id'  => $userId,
        ];

        addToDatabase($connection, 'posts', $user);
        header('Location: profile.php?user=' . $userId);
        
} else {
    echo 'Please fill out the form.';
}


