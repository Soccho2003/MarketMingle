<?php include('includes/header.php'); ?>

<!-- Link to cart CSS -->
<head>
    <link rel="stylesheet" href="cart.css">  
</head>

<section id="cart">
    <h2>Your Cart</h2>
    
    <div class="cart-items">
        
        <div class="cart-item">
            <img src="assets/images/product1.jpg" alt="Product 1">
            <div class="cart-item-details">
                <h3>Product 1</h3>
                <p>BDT 200.00</p>
                <input type="number" value="1" min="1" class="quantity" />
                <a href="#" class="remove-item">Remove</a>
            </div>
        </div>

        <div class="cart-item">
            <img src="assets/images/product2.jpg" alt="Product 2">
            <div class="cart-item-details">
                <h3>Product 2</h3>
                <p>BDT 250.00</p>
                <input type="number" value="1" min="1" class="quantity" />
                <a href="#" class="remove-item">Remove</a>
            </div>
        </div>

        <div class="cart-item">
            <img src="assets/images/product3.jpg" alt="Product 3">
            <div class="cart-item-details">
                <h3>Product 3</h3>
                <p>BDT 300.00</p>
                <input type="number" value="1" min="1" class="quantity" />
                <a href="#" class="remove-item">Remove</a>
            </div>
        </div>
    </div>

    <!-- Cart Summary -->
    <div class="cart-summary">
        <p>Total Price: <span id="total-price">BDT 750.00</span></p>
        <button class="checkout-btn">Proceed to Checkout</button>
    </div>
</section>

<?php include('includes/footer.php'); ?>
