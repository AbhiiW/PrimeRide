<?php
session_start();
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $client_id = isset($_POST['client_id']) ? $_POST['client_id'] : (isset($_SESSION['client_id']) ? $_SESSION['client_id'] : null);

    if (!$client_id) {
        echo "Client ID is missing.";
        exit();
    }

    
    $sql = "SELECT profile_picture FROM clients WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $stmt->bind_result($current_profile_picture);
    $stmt->fetch();
    $stmt->close();

    
    if ($_FILES['profilePicUpload']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../../database/user-profiles-pic/";
        $new_profile_picture = time() . "_" . basename($_FILES['profilePicUpload']['name']); 
        $target_file = $target_dir . $new_profile_picture;

       
        $old_image_path = $target_dir . $current_profile_picture;
        if (file_exists($old_image_path) && $current_profile_picture != 'default.jpg') {
            unlink($old_image_path);
        }

        
        if (move_uploaded_file($_FILES['profilePicUpload']['tmp_name'], $target_file)) {
            
            $sql = "UPDATE clients SET profile_picture = ? WHERE client_id = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                echo "Error preparing statement: " . $conn->error;
                exit();
            }

            $stmt->bind_param("si", $new_profile_picture, $client_id);
            if ($stmt->execute()) {
                echo "Profile picture updated successfully.";
            } else {
                echo "Error updating profile picture: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Error uploading file or no file was uploaded.";
    }

    
    $conn->close();

    header("Location: ../../../profile.php");
    exit();
}
