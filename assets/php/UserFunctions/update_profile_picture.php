<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];  

    
    $sql = "SELECT profile_picture FROM clients WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $stmt->bind_result($current_profile_picture);
    $stmt->fetch();
    $stmt->close();

    if ($_FILES['profilePicUpload']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../../database/user-profiles-pic/";
        $old_image_path = $target_dir . $current_profile_picture;

        
        if (file_exists($old_image_path) && $current_profile_picture != 'default.jpg') {
            unlink($old_image_path);
        }

       
        $new_profile_picture = $_FILES['profilePicUpload']['name'];
        $target_file = $target_dir . basename($new_profile_picture);
        move_uploaded_file($_FILES['profilePicUpload']['tmp_name'], $target_file);

   
        $sql = "UPDATE clients SET profile_picture = ? WHERE client_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_profile_picture, $client_id);
    }

    if ($stmt->execute()) {
   
        echo "Profile picture updated successfully.";
    } else {
       
        echo "Error updating profile picture: " . $stmt->error;
    }

   
    $stmt->close();
    $conn->close();

    
    header("Location:../../../profile.php");
    exit();
}
?>
