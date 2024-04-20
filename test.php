<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>

<?php
session_start();

// Check if checkout button is pressed and if the cart session variable is set
if(isset($_POST['checkout']) && isset($_SESSION['cart'])) {
    // Loop through each product in cart
    foreach($_SESSION['cart'] as $product_id => $quantity) {
        // You can perform actions like updating database, processing orders, etc.
        // For demonstration, we will simply echo the product id and quantity
        echo "Product ID: $product_id, Quantity: $quantity <br>";
    }
    // After processing the order, you may want to clear the cart
    unset($_SESSION['cart']);
}

// Check if update button is pressed
if(isset($_POST['update'])) {
    // Update quantities in session
    foreach($_POST['quantity'] as $product_id => $quantity) {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// Check if remove button is pressed
if(isset($_GET['remove']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the cart
    unset($_SESSION['cart'][$_GET['remove']]);
}
?>

<div>
    <form method="post">
        <?php
        // Check if cart session variable is set
        if(isset($_SESSION['cart'])) {
            // Display products in cart
            foreach($_SESSION['cart'] as $product_id => $quantity) {
                // Fetch product details from database or wherever you store them
                // For demonstration, we'll just echo the product id and quantity with an input field for updating quantity
            ?>
                <p>Product ID: <?php echo $product_id; ?>, Quantity: 
                    <input type="number" name="quantity[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>">
                    <a href="?remove=<?php echo $product_id; ?>">Remove</a>
                </p>
            <?php
            }
        }
        ?>
        <input type="submit" name="update" value="Update">
    </form>
</div>

<form method="post">
    <input type="submit" name="checkout" value="Checkout">
</form>

</body>
</html>
