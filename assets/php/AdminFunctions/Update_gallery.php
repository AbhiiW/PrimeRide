<?php

include '../dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        $uploadDir = '../../Photo/Galleryimg/';
        
       
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = uniqid() . '.' . $fileExtension;

     
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
           
            if (move_uploaded_file($fileTmpPath, $uploadDir . $newFileName)) {
               
                $sql = "INSERT INTO gallery (title, image_path) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $title = $newFileName; 
                $stmt->bind_param("ss", $title, $newFileName);

              
                if ($stmt->execute()) {
                    echo "Image uploaded and added to gallery successfully.";
                } else {
                    echo "Error uploading image: " . $stmt->error;
                }

               
                $stmt->close();
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "Upload failed. Allowed file types: " . implode(", ", $allowedfileExtensions);
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }

    // Close the database connection
    $conn->close();
}
?>
