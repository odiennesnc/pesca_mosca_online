<?php
include '../config.inc.php';
require_once('../admin/vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey("sk_test_fcEZhkTSFym00bd8eENtsrwX");

$up = \Stripe\PaymentIntent::update(
    'pi_1F718cGmhnvrMoeSeZbQbQza',
    [
        'description' => 'Modifica ordine singolo',
    ]
);

var_dump($up);