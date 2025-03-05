    
    Pi.init({
      appId: 'YOUR_APP_ID', 
      sandbox: false, 
    });

    document.getElementById('pay-with-pi').addEventListener('click', () => {
      const paymentData = {
        amount: 1.0,
        memo: 'Payment for services', 
        metadata: { orderId: '12345', description: 'Service payment' },
      };

      Pi.createPayment(paymentData, {
        onReadyForServerApproval: (paymentId) => {
          console.log('Payment ready for approval:', paymentId);
          showAlert(`Payment ID: ${paymentId} is ready for server approval.`);
        },
        onReadyForServerCompletion: (paymentId, txid) => {
          console.log('Payment ready for completion:', paymentId, txid);
          showAlert(`Payment completed with Transaction ID: ${txid}`);
          
          fetch('transaction.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
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

    function showAlert(message) {
      const alertElement = document.getElementById('alert');
      alertElement.textContent = message;
      alertElement.style.display = 'block';
      setTimeout(() => {
        alertElement.style.display = 'none';
      }, 5000);
    }
