<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receive Order Mail</title>
</head>
<body>
    <h3>Dear Customer, Your order has been  received.</h3>
    <p>Your phone number: <span>{{  $order['c_phone'] }}</span></p>
    <p>Your  email: {{  $order->user['email'] }}</p>
    <p>Your order total: {{  $order['total'] }} TK.</p>
    <p>Thank You...</p>
</body>
</html>
