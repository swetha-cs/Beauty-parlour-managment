<?php
include 'database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $status = $_POST['status'];

    $query = "UPDATE Appointments SET status='$status' WHERE id=$appointment_id";
    mysqli_query($conn, $query);

    // Fetch user email to send confirmation/rejection
    $appointment = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Appointments WHERE id=$appointment_id"));
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Users WHERE id=" . $appointment['user_id']));

    if($status == 'accepted') {
        mail($user['email'], 'Appointment Accepted', 'Your appointment has been accepted.');
    } else if($status == 'rejected') {
        mail($user['email'], 'Appointment Rejected', 'Your appointment has been rejected.');
    }

    header('Location: admin.php');
}
?>
