<?php
  require_once('config.inc.php');
var_dump($_POST);
  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => 'igabbe@gmail.com',
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $_POST["importo"],
      'currency' => 'eur'
  ));

  echo '<h1>Successfully charged $50.00!</h1>';