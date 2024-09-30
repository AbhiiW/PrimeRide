<?php
session_start();
include '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $itemName = $conn->real_escape_string($_POST['menuItemName']);
    $itemPrice = $conn->real_escape_string($_POST['menuItemPrice']);
    $itemDescription = $conn->real_escape_string($_POST['menuItemDescription']);
    
    // File upload handling
    $target_dir = "../../assets/Photo/menuitems";
    $file_name = basename($_FILES["menuItemPhoto"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["menuItemPhoto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['message'] = "What is this? This is not an Image!!";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $_SESSION['message'] = "This Image Name already exists in the system database!!";
        $uploadOk = 0;
    }

    if ($_FILES["menuItemPhoto"]["size"] > 500000) {
        $_SESSION['message'] = "File Size is too large!!, Make sure to upload a file less than 50 MB.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $_SESSION['message'] = "There was an error!! Image is not uploaded and saved in the Database.";
    } else {
        if (move_uploaded_file($_FILES["menuItemPhoto"]["tmp_name"], $target_file)) {
            
            // Insert menu item into the database
            $sql = "INSERT INTO menu_items (name, price, description, photo) VALUES ('$itemName', '$itemPrice', '$itemDescription', '$file_name')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "The menu item ". htmlspecialchars($itemName). " has been added.";
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
