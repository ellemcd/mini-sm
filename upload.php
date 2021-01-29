<?php

session_start();

include 'functions.php';
$user_id = $_SESSION['user_id'];

$fileFolder = "uploads/";
$fileName = $_FILES["file"]["name"];
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$fileNameNew = "profile".$user_id.".".$fileActualExt;
$targetFilePath = $fileFolder . $fileNameNew;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowed = array('jpg','png','jpeg');

    if (in_array($fileType, $allowed)) {
      
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            
            // first we delete the existing picture
            $statement = $connection->prepare('DELETE FROM `images` WHERE `user_id` = :id');
            $statement->execute([
                'id' => $user_id,
            ]);

            // then we insert the new picture 
            $insert = $connection->query ("INSERT into images (user_id, file_name, uploaded_on) VALUES ('$user_id' , '".$fileNameNew."', NOW())");

            if ($insert) {
                header('location:home.php');
            } else {
                $statusMsg = 'There was an error uploading the photo. Try again';
            } 
        }
    }
}

// Display status message
echo $statusMsg;
?>





