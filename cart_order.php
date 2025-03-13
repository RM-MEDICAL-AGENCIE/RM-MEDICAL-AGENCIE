<?php
// Connect to the database
$host = 'localhost'; // Your MySQL host
$username = 'root';  // Your MySQL username
$password = '';      // Your MySQL password
$dbname = 'cart_system'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM product"; // Assuming your table name is 'product'
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    // Fetch all products
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM Medical Agencies</title>
    <style>
        /* Your styles here... */
    </style>
</head>
<body>

    <header>
        <h1>RM Medical Agencies</h1>
    </header>

    <!-- Cart Icon -->
    <div class="cart-icon" onclick="toggleCart()">🛒 <span id="cart-count">0</span></div>

    <!-- Cart Container -->
    <div class="cart-container" id="cart-container">
        <h3>Shopping Cart</h3>
        <div id="cart-items"></div>
        <p class="cart-total">Total: ₹<span id="cart-total">0</span></p>
        <button onclick="checkout()">Checkout</button>
    </div>

    <!-- Products Display -->
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <p><?= $product['product_name']; ?> - ₹<?= $product['price']; ?></p>
                <button onclick="addToCart('<?= $product['product_name']; ?>', <?= $product['price']; ?>)">BUY</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Cart Details -->
    <div id="cart">
        <h2>Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cart-items-table">
                <!-- Cart items will be dynamically loaded here -->
            </tbody>
        </table>
        <button id="place-order">Place Order</button>
    </div>

    <script>
        let cart = [];

        // Function to add product to cart
        function addToCart(productName, price) {
            const existingProduct = cart.find(item => item.name === productName);

            if (existingProduct) {
                // If product already exists, increase quantity
                existingProduct.quantity += 1;
            } else {
                // If product is new, add it to the cart with quantity 1
                cart.push({ name: productName, price: price, quantity: 1 });
            }

            updateCart();
        }

        // Update cart display
        function updateCart() {
            const cartItemsTable = document.getElementById('cart-items-table');
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            const cartCount = document.getElementById('cart-count');

            cartItemsTable.innerHTML = '';
            cartItems.innerHTML = '';
            let total = 0;

            cart.forEach((item, index) => {
                total += item.price * item.quantity;
                cartItemsTable.innerHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td>₹${item.price}</td>
                        <td>${item.quantity}</td>
                        <td>₹${item.price * item.quantity}</td>
                        <td><button onclick="removeFromCart(${index})">Remove</button></td>
                    </tr>
                `;
                cartItems.innerHTML += `
                    <div class='cart-item'>${item.name} (x${item.quantity}) - ₹${item.price * item.quantity} <button onclick='removeFromCart(${index})'>X</button></div>
                `;
            });

            cartTotal.innerText = total;
            cartCount.innerText = cart.length;
        }

        // Remove product from cart
        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCart();
        }

        // Toggle cart visibility
        function toggleCart() {
            let cartContainer = document.getElementById("cart-container");
            cartContainer.style.display = cartContainer.style.display === "none" ? "block" : "none";
        }

        // Place order
        document.getElementById('place-order').addEventListener('click', () => {
            if (cart.length === 0) {
                alert('Your cart is empty!');
                return;
            }

            // Example of sending cart data to a server
            alert('Order placed successfully!');
            cart = [];  // Clear cart after placing the order
            updateCart();
        });
    </script>
</body>
</html>
