<?php
// Connect to the database
session_start(); // Start the session
$dbconnect = mysqli_connect("localhost", "root", "", "caterease");

if (!$dbconnect) {
    die("Connection failed: " . mysqli_connect_error());
}

$cart_items = [];
$total_price = 0;

// Check if the cart exists in the session
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $menu_id => $item) {
        // Fetch menu details from the database
        $query = "SELECT menu_name, price FROM menu WHERE menu_id = '$menu_id'";
        $result = mysqli_query($dbconnect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $menu_details = mysqli_fetch_assoc($result);
            $menu_details['quantity'] = $item['quantity'];
            $cart_items[] = $menu_details;

            // Calculate total price
            $total_price += $menu_details['price'] * $item['quantity'];
        }
    }
} else {
    echo "Your cart is empty.";
}

// Close database connection
mysqli_close($dbconnect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>View Cart</title>
</head>
<body>
    <header>
        <section class="wrapper">
            <div class="left">
                <a href="home.php">CaterEase</a>
            </div>
            <div class="right1">
                <div>
                    <a href="home.php"><img src="images/home-icon-silhouette (1).png" alt=""> Home</a>
                </div>
                <a href="homeintex.php" class="button">Log Out</a>
            </div>
        </section>
    </header>
    
    <h1>Your Cart</h1>
    <table>
        <tr>
            <th>Menu Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($cart_items as $menu_id => $cart_item): ?>
            <tr>
                <td><?php echo htmlspecialchars($cart_item['menu_name']); ?></td>
                <td>₹<?php echo htmlspecialchars($cart_item['price']); ?></td>
                <td>
                    <form action="update_cart.php" method="post">
                        <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
                        <input type="number" name="quantity" value="<?php echo $cart_item['quantity']; ?>" min="1" required>
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>
                    <form action="remove_from_cart.php" method="post">
                        <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>Total Price: ₹<?php echo htmlspecialchars($total_price); ?></h2>
    
    <a href="menu.php?csp_id=<?php echo $_SESSION['cart'][$menu_id]['csp_id']; ?>">Add More Items</a>
    <br>
    <a href="booking.php" class="button">Proceed to Booking</a>
    
    <footer id="footer">
        <div class="foot">
            <div class="contact">
                <a href=""><img src="images/phone-call.png" alt=""> 9876543210</a>
                <a href=""><img src="images/email (1).png" alt=""> caterease@gmail.com</a>
            </div>
            <p>Copyright&copy; Designed by SHAMSUDHEEN</p>
        </div>
    </footer>
</body>
</html>
