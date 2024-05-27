<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integear</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    

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

        .home{
            position: relative;
            text-align: center;
        }

        .name{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 80px;
            font-family: "Archivo Black", sans-serif;
            font-weight: 400;
            font-style: normal;
            color:white;
        }

        .items{
            font-family: "Archivo Black", sans-serif;
            text-align: center;
            font-size: 50px;
            color: #FFBF00;
        }

        .form {
            background-color: #fff;
            padding: 20px;
            gap: 20px;
            display: flex;
            justify-content: center;
        }
        .cart-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 250px;
        }
        .cart-form img {
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .cart-form h2{
            margin: 0 0 10px;
            text-align: center;
            font-family: "Archivo Black", sans-serif;
            font-size: 15px;
            color: #004AAD;
        }

        .cart-form p{
            margin: 0 0 10px;
            text-align: center;
            font-size: 13px;
            font-family: "Reddit Sans", sans-serif;
        }

        
        .cart-form input[type="number"] {
            width: 50px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-family: "Reddit Sans", sans-serif;
        }
        .cart-form button {
            padding: 10px 20px;
            background-color: #004AAD;
            color: white;
            border: 2px solid #004AAD;
            border-radius: 5px;
            cursor: pointer;
            transition-duration: 0.4s;
            font-family: "Reddit Sans", sans-serif;

        }
        .cart-form button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }

        .zoom {
        transition: transform .2s;
        margin: 0 auto;
        }

        .zoom:hover {
        -ms-transform: scale(1.5); /* IE 9 */
        -webkit-transform: scale(1.5); /* Safari 3-8 */
        transform: scale(1.5); 
        }

        .gtcart{
            text-align: center;
        }

        .gtcart a{
            text-decoration: none;
            padding: 10px 20px;
            color: #004AAD;
            cursor: pointer;
            transition-duration: 0.4s;
            font-family: "Reddit Sans", sans-serif;

        }

        .gtcart a:hover {
            font-size: 17px;
        }

        .footer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            background-color: #004AAD;
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
    
    <!-- HOME PICTURE -->
    <div class="home">
        <div>
            <div class="name">INTEGEAR</div>
            <img src="images/home1.png" style="width:100%;">
        </div>
    </div>

    <h1 class="items">ITEMS</h1>
    <br>

    <div class="form">
    <form class="cart-form" data-product="mouse">
            <img src="images/mouse.png" alt="Mouse" style="width:100px;" class="zoom">
            <h2>IMPACT ELITE M913</h2>
            <p>$29.75</p>
            <input type="number" name="quantity" value="1" min="1">
            <br>
            <button type="submit" class="buttonitm">Add to Cart</button>
        </form>

        <form class="cart-form" data-product="keyboard">
            <img src="images/keyboard.png" alt="Keyboard" style="width:100px;" class="zoom">
            <h2>ELF PRO K649</h2>
            <p>$55.99</p>
            <input type="number" name="quantity" value="1" min="1">
            <br>
            <button type="submit" class="buttonitm">Add to Cart</button>
        </form>

        <form class="cart-form" data-product="headphones">
            <img src="images/headphones.png" alt="Headphones" style="width:100px;" class="zoom">
            <h2>H510 ZEUS-X RGB</h2>
            <p>$61.99</p>
            <input type="number" name="quantity" value="1" min="1">
            <br>
            <button type="submit" class="buttonitm">Add to Cart</button>
        </form>

    </div>

    <br>
    <br>

<!-- Go to Cart button -->
<div class="gtcart">
    <a href="cart.php">Go to Cart <i class="fa-solid fa-arrow-right"></i></a>
</div>

<br>
<br>


    <div class="footer">
        <div><a href="index.php" class="logo2"><img src="images/logo2.png" style="width:200px;"></a></div>
    </div>


<script>
$(document).ready(function(){
    $('.cart-form').on('submit', function(e){
        e.preventDefault();
        var product = $(this).data('product');
        var quantity = $(this).find('input[name="quantity"]').val();
        
        $.ajax({
            url: 'cart.php',
            type: 'post',
            data: {
                product: product,
                quantity: quantity
            },
            success: function(response) {
                alert('Item added to cart!');
            },
            error: function() {
                alert('Failed to add item to cart.');
            }
        });
    });
});
</script>

</body>
</html>
