<?php
include 'database.php';
// Fetch products
$products = mysqli_query($conn, "SELECT * FROM Products");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Beauty Parlor</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <h1>Welcome to Beauty Parlor</h1>
    <h2>Our Products</h2>
    <div>
        <?php while($product = mysqli_fetch_assoc($products)) { ?>
            <div>
                <p><?php echo $product['name']; ?> - $<?php echo $product['price']; ?></p>
            </div>
        <?php } ?>
    </div>
    <a href='register.php'>Book an Appointment</a>
</body>
</html>
