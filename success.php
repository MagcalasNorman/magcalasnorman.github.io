<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Success</title>

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

        .payment-success-container {
            width: 80%;
            max-width: 600px; /* Adjust max-width as needed */
            margin: auto; /* Center horizontally */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #004AAD;
            font-family: "Archivo Black", sans-serif;
        }

        p {
            margin-bottom: 20px;
            color: #666;
            font-family: "Reddit Sans", sans-serif;
        }

        button {
            padding: 10px 20px;
            background-color: #FFBF00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition-duration: 0.4s;
            font-family: "Reddit Sans", sans-serif;
            width: 150px;
        }

        button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            background-color: #ec971f;
        }
    </style>

</head>
<body>
    <div class="header">
            <a href="index.php" class="logo"><img src="images/logo.png" alt="Mouse" style="width:120px;"></a>
            <div class="header-right">
                <a href="index.php" class="cartheader">HOME</a>
                <a href="cart.php" class="cartheader"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
    </div>
    <br>
    <br>

    <div class="payment-success-container">
        <h1>Payment Success!</h1>
        <p>Thank you for your payment</p>
        <br>
        <br>
        <a href="index.php"><button>Home</button></a>
    </div>

    <br>
    <br>
    <div class="footer">
        <div><a href="index.php" class="logo2"><img src="images/logo2.png" style="width:200px;"></a></div>
    </div>


</body>
</html>