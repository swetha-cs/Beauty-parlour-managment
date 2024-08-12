<?php
include 'database.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header('Location: user_dashboard.php');
    } else {
        $error = 'Invalid login details';
    }
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <h1>Login</h1>
    <form method='POST' action='login.php'>
        <input type='email' name='email' placeholder='Email' required><br>
        <input type='password' name='password' placeholder='Password' required><br>
        <input type='submit' value='Login'>
    </form>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
