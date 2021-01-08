<?php

$stripe = array(
    "secret_key"      => "sk_test_LAo7ZmtADVe1iaqzmDx32eHe",
    "publishable_key" => "pk_test_woN7MdaimC2BCmhjvetkqALt"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

if($_POST["action"]=="paga") {

    $token  = $_POST['stripeToken'];

    $customer = \Stripe\Customer::create(array(
        'email' => $_POST["stripeEmail"],
        'source'  => $token
    ));

    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $_POST["importo_da_saldare"],
        'currency' => 'eur'
    ));

    Utils::myodn_salda_fattura($_POST["id_fattura"]);
}

$dati_my_odn = Utils::myodn_data(315);
$dati_utente = json_decode($dati_my_odn, TRUE);

$iva_conf = 22;