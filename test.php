<?php
// Start session (if not already started)
session_start();

// Check if the form was submitted
if(isset($_POST['product_id'])) {
    // Simulate updating the cart count (replace with actual logic)
    // Here, we just increment the cart count by 1
    if(isset($_SESSION['cart_count'])) {
        $_SESSION['cart_count']++;
    } else {
        $_SESSION['cart_count'] = 1;
    }

    // Return the updated cart count
    echo $_SESSION['cart_count'];
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart Example</title>
</head>
<body>
    <button id="addToCartBtn" data-product-id="123">Add to Cart</button>
    <span id="cartCount"><?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '0'; ?></span> items in cart
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#addToCartBtn').click(function(){
                var productId = $(this).data('product-id');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $_SERVER["PHP_SELF"]; ?>',
                    data: { product_id: productId },
                    success: function(response){
                        // Update cart count on success
                        $('#cartCount').text(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
