<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = $_SESSION['user'];
include 'database.php';

// Fetch appointments for the user
$appointments = mysqli_query($conn, "SELECT * FROM Appointments WHERE user_id=" . $user['id']);

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>User Dashboard</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <h1>Welcome, <?php echo $user['name']; ?></h1>
    <h2>Your Appointments</h2>
    <div>
        <?php while($appointment = mysqli_fetch_assoc($appointments)) { ?>
            <div>
                <p>Product ID: <?php echo $appointment['product_id']; ?> - Status: <?php echo $appointment['status']; ?></p>
            </div>
        <?php } ?>
    </div>
    <a href='logout.php'>Logout</a>
</body>
</html>
