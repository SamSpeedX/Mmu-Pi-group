<?php

use kibalanga\core\Request;

$respond = Request::ReadOneWhereToken('users', $_SESSION['token']);
if ($respond['status'] == 'success') {
  $data = $respond['data'];
  $user = $data['username'];
} else {
  $user = "Stranger";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Support Developer | <?php echo htmlspecialchars(APP_NAME); ?></title>
  <link rel="stylesheet" href="/assets/css/pi.css">
  <script src="path-to-pi-sdk.js"></script>
  <style>
    #alert {
      padding: 10px;
      background-color: #f8d7da;
      color: #721c24;
      margin: 10px 0;
      display: none;
    }
  </style>
</head>
<body>
  <h1>Support Developer</h1>
  <button id="pay-with-pi">Pay with Pi</button>
  <button>Pay with Card</button>
  <br> <br>
  <form action="developer" method="post">
  <button type="submit">Pay with Tanzania Mobile network</button>
  </form>
  <div id="alert"></div>

  <script>
    const card = "";
  </script>
  <script>
    Pi.init({
      appId: 'YOUR_PRODUCTION_APP_ID', // Replace with your actual production App ID
      sandbox: false,                  // Set to false for production
    });

    // Payment button functionality
    document.getElementById('pay-with-pi').addEventListener('click', () => {
      const paymentData = {
        amount: 1.0,
        memo: 'Payment for product',
        metadata: { orderId: '12345', description: 'Product purchase' }
      };

      Pi.createPayment(paymentData, {
        onReadyForServerApproval: (paymentId) => {
          console.log('Payment ready for server approval:', paymentId);
          showAlert(`Payment ID: ${paymentId} is ready for server approval.`);
          // Optionally call your server here for pre-approval steps if needed
        },
        onReadyForServerCompletion: (paymentId, txid) => {
          console.log('Payment ready for completion:', paymentId, txid);
          showAlert(`Payment completed with Transaction ID: ${txid}`);

          // Send transaction data to your server for further processing and record-keeping
          fetch('transaction.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
              paymentId: paymentId,
              txid: txid,
              amount: paymentData.amount,
              memo: paymentData.memo,
              metadata: paymentData.metadata
            })
          })
          .then(response => response.json())
          .then(data => {
            console.log('Transaction saved:', data);
          })
          .catch(error => {
            console.error('Error saving transaction:', error);
          });
        },
        onCancel: (paymentId) => {
          console.log('Payment canceled:', paymentId);
          showAlert('Payment canceled.');
        },
        onError: (error) => {
          console.error('Payment error:', error);
          showAlert('An error occurred while processing the payment.');
        },
      });
    });

    // Simple alert display function
    function showAlert(message) {
      const alertElement = document.getElementById('alert');
      alertElement.textContent = message;
      alertElement.style.display = 'block';
      setTimeout(() => {
        alertElement.style.display = 'none';
      }, 5000);
    }
  </script>
</body>
</html>
