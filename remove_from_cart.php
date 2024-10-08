<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Initialize as an empty array if not set
}

// Check if the menu_id is set in the POST request
if (isset($_POST['menu_id'])) {
    $menu_id = $_POST['menu_id'];

    // Check if the item exists in the cart
    if (isset($_SESSION['cart'][$menu_id])) {
        // Remove the item from the cart
        unset($_SESSION['cart'][$menu_id]);

        // Optionally: Set a success message
        $_SESSION['cart_message'] = "Item removed from cart successfully!";
    } else {
        // Set an error message if the item wasn't found
        $_SESSION['cart_message'] = "Item not found in the cart.";
    }
} else {
    $_SESSION['cart_message'] = "Menu ID is missing.";
}

// Redirect back to the cart view
header("Location: view_cart.php");
exit();
?>
