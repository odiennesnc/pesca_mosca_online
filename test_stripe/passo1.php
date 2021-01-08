<?php
include '../config.inc.php';
require_once('../admin/vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey("sk_test_fcEZhkTSFym00bd8eENtsrwX");

$intent = \Stripe\PaymentIntent::create([
    "amount" => 2000,
    "currency" => "eur",
    "payment_method_types" => ["card"],
]);

var_dump($intent);