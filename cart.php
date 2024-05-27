<?php
session_start();

// Initialize cart if not already initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to check if an item exists in the cart
function itemExistsInCart($itemName) {
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['name'] === $itemName) {
            return $index;
        }
    }
    return false;
}

// Add items to cart based on AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product']) && isset($_POST['quantity']) && $_POST['quantity'] > 0) {
    $product = $_POST['product'];
    $quantity = intval($_POST['quantity']);

    switch ($product) {
        case 'mouse':
            $itemName = "Mouse";
            $unitPrice = 2975; // in cents
            $imagePath = "images/mouse.png";
            break;
        case 'keyboard':
            $itemName = "Keyboard";
            $unitPrice = 5999; // in cents
            $imagePath = "images/keyboard.png";
            break;
        case 'headphones':
            $itemName = "Headphones";
            $unitPrice = 6199; // in cents
            $imagePath = "images/headphones.png";
            break;
        default:
            echo "Invalid product";
            exit;
    }

    $itemIndex = itemExistsInCart($itemName);
    if ($itemIndex !== false) {
        // Item already exists, update quantity
        $_SESSION['cart'][$itemIndex]['quantity'] += $quantity;
    } else {
        // Add new item
        $_SESSION['cart'][] = [
            "name" => $itemName,
            "quantity" => $quantity,
            "unit_price" => $unitPrice,
            "image" => $imagePath
        ];
    }

    echo "Item added to cart";
    exit;
}

// Remove item from cart if requested
if (isset($_GET['remove']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: cart.php");
    exit;
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['quantity'] * $item['unit_price'];
}

// Display cart items
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Cart</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Archivo+Black&family=Paytone+One&family=Russo+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap');

        body { 
        margin: 0;
        }

        .header {
        overflow: hidden;
        background-color: white;
        padding: -20px;
        box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
        }

        .logo {
        float: left;
        color: black;
        text-align: center;
        padding-left: 20px;
        text-decoration: none;
        font-size: 40px; 
        line-height: 25px;
        letter-spacing: 2px;
        }

        .cartheader {
        float: left;
        color: #004AAD;
        text-align: center;
        align-items: center;
        padding-top: 46px;
        padding-right:30px;
        font-size: 20px; 
        line-height: 25px;
        border-radius: 4px;
        text-decoration: none;
        font-family: "Archivo Black", sans-serif;
        }

        .cartheader:hover {
        color: #FFBF00;
        }

        .header-right {
        float: right;
        align-items: center;
        }

        @media screen and (max-width: 500px) {
        .header a {
            float: none;
            display: block;
            text-align: left;
        }
        
        .header-right {
            float: none;
        }
        }

        .footer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            background-color: #004AAD;
        }

        .mainbody{
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        .cart-container {
            width: 100%;
            max-width: 400px;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #004AAD;
            text-align: center;
            font-family: "Archivo Black", sans-serif;
        }

        .cart-items {
            list-style: none;
            padding: 0;
            margin: 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image {
            width: 50px;
            height: auto;
            margin-right: 20px;
        }

        .cart-item-details {
            text-align: left;
            flex: 1;
        }

        .cart-item-name {
            display: block;
            font-weight: bold;
            color: #333;
            font-family: "Archivo Black", sans-serif;
        }

        .cart-item-quantity, .cart-item-price {
            display: block;
            color: #666;
            margin-top: 5px;
            font-family: "Reddit Sans", sans-serif;
            font-size: 15px;
        }

        .cart-item-remove {
            color: #e74c3c;
            text-decoration: none;
            margin-left: 10px;
            font-family: "Reddit Sans", sans-serif;
        }

        .cart-item-remove:hover {
            text-decoration: underline;
        }

        .cart-total {
            margin: 20px 0;
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            font-family: "Reddit Sans", sans-serif;
        }

        .cart-actions {
            margin-top: 20px;
        }

        .checkout-button, .back-button {
            padding: 10px 20px;
            background-color: #004AAD;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition-duration: 0.4s;
            font-family: "Reddit Sans", sans-serif;
        }

        .back-button {
            background-color: #FFBF00;
        }

        .checkout-button:hover, .back-button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }

        .back-button:hover {
            background-color: #ec971f;
        }

        .empty{
            font-family: "Reddit Sans", sans-serif;
            text-align:center;
        }
    </style>
</head>
<body>

<!-- NAV BAR -->
<div class="header">
        <a href="index.php" class="logo"><img src="images/logo.png" alt="Mouse" style="width:120px;"></a>
        <div class="header-right">
            <a href="index.php" class="cartheader">HOME</a>
            <a href="cart.php" class="cartheader"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </div>
    
    <div class="mainbody">
        <div class="cart-container">
            <h1>Cart</h1>

            <?php if (count($_SESSION['cart']) > 0): ?>
                <ul class="cart-items">
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <li class="cart-item">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="cart-item-image">
                        <div class="cart-item-details">
                            <span class="cart-item-name"><?php echo $item['name']; ?></span>
                            <span class="cart-item-quantity">Qty: <?php echo $item['quantity']; ?></span>
                            <span class="cart-item-price">$<?php echo number_format($item['quantity'] * $item['unit_price'] / 100, 2); ?></span>
                        </div>
                        <a href="cart.php?remove=<?php echo $index; ?>" class="cart-item-remove">Remove</a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="cart-total">
                    <p>Total: $<?php echo number_format($total / 100, 2); ?></p>
                </div>
                <div class="cart-actions">
                    <a href="index.php"><button class="back-button">Back</button></a>
                    <a href="checkout.php"><button class="checkout-button">Proceed to Checkout</button></a>
                </div>
            <?php else: ?>
                <p class="empty">Your cart is empty.</p>
                <a href="index.php"><button class="back-button">Back</button></a>
            <?php endif; ?>
        </div>
    </div>

<div class="footer">
        <div><a href="index.php" class="logo2"><img src="images/logo2.png" style="width:200px;"></a></div>
    </div>
</body>
</html>
