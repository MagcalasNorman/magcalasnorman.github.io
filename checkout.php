<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PG20W01jFVr3VyR3INi34nv2nCyt87bispInIep179TsRANVfmPOf3qdvvcvDRpoS2vaUGr1i8KzfYi5278JuR500DEcf0Y53";

\Stripe\Stripe::setApiKey($stripe_secret_key);

// Initialize line items array
$line_items = [];

session_start();
foreach ($_SESSION['cart'] as $item) {
    $line_items[] = [
        "quantity" => $item['quantity'], 
        "price_data" => [
            "currency" => "usd", 
            "unit_amount" => $item['unit_price'],
            "product_data" => [
                "name" => $item['name']
            ]
        ]
    ];
}

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/integear/success.php",
    "cancel_url" => "http://localhost/integear/index.php",
    "line_items" => $line_items,
]);

http_response_code(303);
header("Location: " . $checkout_session->url);

?>
