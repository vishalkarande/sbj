<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Pay | GranoStore</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col-4" style="max-width:100%" >
        <div class="alert alert-success text-center mt-5 align-middle" role="alert">
          <h3>Payment Details</h3>
          <div class="text-left mb-2">
            <div class="row">
              <div class="col-4 text-right">Name:</div>
              <div class="col-8"><?php echo $data['prefill']['name']?></div>
            </div>
            <div class="row">
              <div class="col-4 text-right">Email:</div>
              <div class="col-8"><?php echo $data['prefill']['email']?></div>
            </div>
            <div class="row">
              <div class="col-4 text-right">Address:</div>
              <div class="col-8"><?php echo $data['notes']['address'];?></div>
            </div>
            <div class="row">
              <div class="col-4 text-right">Amount:</div>
              <div class="col-8"><strong><?php echo $data['amount']/100;?> INR</strong></div>
            </div>
          </div>
          <form action="<?= base_url?>razorpay/verify" method="POST">
            <script
              src="https://checkout.razorpay.com/v1/checkout.js"
              data-key="<?php echo $data['key']?>"
              data-amount="<?php echo $data['amount'];?>"
              data-currency="INR"
              data-buttontext="Pay with Razorpay" 
              data-name="<?php echo $data['name']?>"
              data-image="<?php echo $data['image']?>"
              data-description="<?php echo $data['description']?>"
              data-prefill.name="<?php echo $data['prefill']['name']?>"
              data-prefill.email="<?php echo $data['prefill']['email']?>"
              data-prefill.contact="<?php echo $data['prefill']['contact']?>"
              data-notes.shopping_order_id="<?php echo $data['notes']['merchant_order_id'];?>"
              data-order_id="<?php echo $data['order_id']?>"
              <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
              <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
            >
            </script>
            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
            <input type="hidden" name="shopping_order_id" value="<?php echo $data['notes']['merchant_order_id'];?>">
          </form>
        </div>
      </div>
      <div class="col">
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>