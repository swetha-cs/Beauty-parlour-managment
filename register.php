<?php
include 'database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO Users (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$password')";
    mysqli_query($conn, $query);
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Register</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <h1>Register</h1>
    <form method='POST' action='register.php'>
        <input type='text' name='name' placeholder='Name' required><br>
        <input type='text' name='mobile' placeholder='Mobile' required><br>
        <input type='email' name='email' placeholder='Email' required><br>
        <input type='password' name='password' placeholder='Password' required><br>
        <input type='submit' value='Register'>
    </form>
    <p>Already registered? <a href='login.php'>Login here</a></p>
</body>
</html>
