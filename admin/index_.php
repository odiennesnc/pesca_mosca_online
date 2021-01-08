<?php

include 'config.inc.php';
include 'ListaRichieste.php';

$active='dash.php';
$body = 'dash.php';

$lista_richieste = new ListaRichieste();
$lista_richieste->setLimit(0,5);
$lista_richieste->find();


$prodotti_scadenza = $dati_utente["prodotti_scadenza"];

include 'Templates/main.php';
?>