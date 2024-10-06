<?php
session_start();

include 'assets/php/dbconnection.php'; 

if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    
    header('Location: authentication.php');
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['username'];

if (!$username) {
    echo "No username found in session or cookies.";
    exit();
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT name, profile_picture FROM clients WHERE username = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

$name = $user['name'];
$profile_picture = !empty($user['profile_picture']) ? $user['profile_picture'] : 'default.jpg';

$hour = date('H');
if ($hour < 12) {
    $greeting = "Good Morning";
} elseif ($hour < 18) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .cprofile {
            margin-top: 100px;
        }
    </style>
</head>
<body>
 <!-- Header -->
 <header class="p-3 text-bg-brown header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="assets/Photo/main/Ride logo.png" class="navlogo" alt="">
                </a>
                <h1>PrimeRide</h1>
            </div>
            <!-- Greeting Message -->
            <div class="greeting">
                <h3 class="text-white"><?php echo $greeting . ', ' . htmlspecialchars($name); ?>!</h3>
            </div>
            <div>
                <a href="assets/php/UserFunctions/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</header>

<div class="cprofile">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Picture -->
                <div class="text-center">
                    <img src="assets/database/user-profiles-pic/<?php echo htmlspecialchars($profile_picture); ?>" class="profile-picture mb-3" alt="Profile Picture">
                    <!-- Profile Picture Update Form -->
                    <form action="assets/php/update_profile_picture.php" method="POST" enctype="multipart/form-data">
                        <label for="profilePicUpload" class="form-label">Update Profile Picture</label>
                        <input class="form-control" type="file" id="profilePicUpload" name="profilePicUpload" required>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <h3>Customer Profile</h3>
                <form action="assets/php/update_password.php" method="POST">
                <div class="mb-3">
                    <label for="password" class="form-label">Change Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                </div>
                 <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password" required>
                </div>
                <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
                <hr>

                <!-- Placed Orders Section -->
                <h4>Placed Orders</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1234</td>
                            <td>2024-10-01</td>
                            <td>Completed</td>
                            <td>$120</td>
                        </tr>
                        <tr>
                            <td>#1235</td>
                            <td>2024-10-02</td>
                            <td>Pending</td>
                            <td>$75</td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <!-- Messages Section -->
                <h4>Messages</h4>
                <div class="accordion" id="messageAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Message #1: Issue with Order #1234
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#messageAccordion">
                            <div class="accordion-body">
                                <p><strong>Your Message:</strong> I have an issue with my order delivery.</p>
                                <p><strong>Reply:</strong> We are looking into this and will get back to you shortly.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Message #2: Payment not processed
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#messageAccordion">
                            <div class="accordion-body">
                                <p><strong>Your Message:</strong> My payment was not processed properly for order #1235.</p>
                                <p><strong>Reply:</strong> Please try again or contact customer service for assistance.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
