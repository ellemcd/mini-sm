<?php  if(isset($_POST['upload'])){

      $file = $_FILES['file'];
      $fileName = $_FILES['file']['name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['Type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg','jpeg','png');

      if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0) {
             if ($fileSize < 10000000) {
               $fileNameNew = "profile".$user_id.".".$fileActualExt;

               $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = ('INSERT INTO `images` (`file_name`) WHERE id=1');
              //INSERT INTO images SET status=0 WHERE id=1
                $statement = $connection->prepare($sql);

                $statement->execute([
                   'user_id' => $user_id,
              ]);
               header('Location: home.php?uploadedsuccess');

             } else {
              echo "Your file was too big";
           }
          } else {
              echo "There was an error your file";
          }
      } else {
          echo "You can't upload files of this type";
     }


  }