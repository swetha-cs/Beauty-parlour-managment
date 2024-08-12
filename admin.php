<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
include 'database.php';

// Fetch all appointments
$appointments = mysqli_query($conn, "SELECT * FROM Appointments");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Admin Dashboard</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>All Appointments</h2>
    <div>
        <?php while($appointment = mysqli_fetch_assoc($appointments)) { ?>
            <div>
                <p>User ID: <?php echo $appointment['user_id']; ?> - Product ID: <?php echo $appointment['product_id']; ?> - Status: <?php echo $appointment['status']; ?></p>
                <form method='POST' action='process_appointment.php'>
                    <input type='hidden' name='appointment_id' value='<?php echo $appointment['id']; ?>'>
                    <select name='status'>
                        <option value='new' <?php if($appointment['status'] == 'new') echo 'selected'; ?>>New</option>
                        <option value='accepted' <?php if($appointment['status'] == 'accepted') echo 'selected'; ?>>Accepted</option>
                        <option value='rejected' <?php if($appointment['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
                    </select>
                    <input type='submit' value='Update Status'>
                </form>
            </div>
        <?php } ?>
    </div>
    <a href='logout.php'>Logout</a>
</body>
</html>
