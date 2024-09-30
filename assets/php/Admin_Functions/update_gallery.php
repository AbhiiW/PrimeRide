<?php
session_start();
include '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "../../Photo/";
    $file_name = basename($_FILES["galleryImage"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["galleryImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['message'] = "What is this? This is not a Image!!";
        $uploadOk = 0;
    }

   
    if (file_exists($target_file)) {
        $_SESSION['message'] = "This Image Name is already exisit on system database!!";
        $uploadOk = 0;
    }


    if ($_FILES["galleryImage"]["size"] > 500000) {
        $_SESSION['message'] = "File Size is two Large!!, Make sure to upload 50 MB Less file.";
        $uploadOk = 0;
    }

 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        $_SESSION['message'] = "There is some thing wrong!! Image is not Uploaded and saved in the Database.";
    } else {
        if (move_uploaded_file($_FILES["galleryImage"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO gallery_images (image_path) VALUES ('$file_name')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "The file ". htmlspecialchars($file_name). " has been uploaded.";
            } else {
                $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        }
    }
    $conn->close();
    header("Location: ../../../Pages/Dashboards/admindashboard.php");
    exit();
}
?>

