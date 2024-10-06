<?php
session_start();
include '../dbconnection.php';

// Check if the form is submitted and the file is uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profilePicUpload'])) {
    // Get the client ID from session (assuming client ID is stored in session during login)
    $client_id = $_SESSION['client_id'];


    $target_dir = "../../assets/Photo/Profilepictures/";

    // Get the uploaded file info
    $file = $_FILES['profilePicUpload'];
    $file_name = basename($file['name']);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the uploaded file is actually an image
    $check = getimagesize($file['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['error_message'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($target_file)) {
        $_SESSION['error_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats (jpg, jpeg, png, gif)
    $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_formats)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check file size (limit: 2MB)
    if ($file['size'] > 2000000) {
        $_SESSION['error_message'] = "Sorry, your file is too large. Max file size is 2MB.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload the file
    if ($uploadOk == 1) {
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            // Update profile picture path in the database
            $profile_picture = $file_name;
            $stmt = $conn->prepare("UPDATE clients SET profile_picture = ? WHERE client_id = ?");
            $stmt->bind_param("si", $profile_picture, $client_id);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Profile picture updated successfully.";
                // Redirect to the profile page
                header("Location: ../../../profile.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error updating profile picture in the database.";
            }

            $stmt->close();
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        }
    }

    // Redirect back to the profile page in case of any error
    header("Location: ../../../profile.php");
    exit();
} else {
    $_SESSION['error_message'] = "Invalid request.";
    header("Location: ../../../profile.php");
    exit();
}

$conn->close();
?>
