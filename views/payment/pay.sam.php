<?php

$order = bin2hex(random_int(1000,10000));
echo $order;
echo "<br>";
echo strlen($order);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pay Me with Pi</title>
  <link rel="stylesheet" href="assets/css/pi.css">
  <script src="https://sdk.minepi.com/pi-sdk.js"></script>
</head>
<body>
  <div class="container">
    <h1>Pay Me with Pi</h1>
    <button id="pay-with-pi">Pay Now</button>
    <div id="alert" class="alert"></div>
  </div>
  <script src="assets/js/pi.js"></script>
</body>
</html>
