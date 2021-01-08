<?php
include 'config.inc.php';
include 'ListaSoci.php';
include 'ListaPermessi.php';
include 'ListaUscite.php';

$body = 'view_soci_2019.php';
$title = 'Elenco Soci 2019';
$socio = new Soci();
switch($_REQUEST["action"]) {
    case "edit":
        $title = 'Inserisci nuovo socio';
        if($_REQUEST["id"]) {
            $socio->load2019($_REQUEST["id"]);
            $title = 'Dati vecchio socio';
        }
        $body = "edit_socio_2019.php";
        break;
    default:
        break;
}

    $lista_soci = new ListaSoci();
    $lista_soci->find2019();

include 'Templates/main.php';