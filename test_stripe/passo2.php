<?php
include '../config.inc.php';
require_once('../admin/vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey("sk_test_fcEZhkTSFym00bd8eENtsrwX");

$retrive = \Stripe\PaymentIntent::retrieve('pi_1F6gCsGmhnvrMoeSdw75L6EK');

var_dump($retrive);