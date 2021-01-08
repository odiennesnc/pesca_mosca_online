<?php
include 'config.inc.php';
include 'ListaPermessi.php';
include 'ListaSoci.php';
include 'ListaUscite.php';

$body = 'view_permessi.php';

$permesso = new Permessi();
$socio = new Soci();
$socio->load($_REQUEST["id_socio"]);

$title = 'Elenco permessi ' . $socio->getNome() . " " . $socio->getCognome();

switch($_REQUEST["action"]) {
    case "edit":
        $title = 'Inserisci nuovo permesso';
        if($_REQUEST["id"]) {
            $permesso->load($_REQUEST["id"]);
            $title = 'Modifica permesso';
        }
        $body = "edit_permesso.php";
        break;
    case "write":
        if($_REQUEST["id"]!="") {
            $permesso->load($_REQUEST["id"]);
        }
        $permesso->setSave($_POST);
        $permesso->setCreatedAt($_POST["created_at"]);
        $permesso->save();

        $alert="Inserimento | modifica effettuato correttamente";
        break;
    case "delete":
        if($_GET["id"]) {
            $permesso->load($_GET["id"]);
            $permesso->delete($_GET["id"]);
            $alert="Cancellazione eseguita con successo";
        }
        break;

    default:
        break;
}
$lista_permessi = new ListaPermessi();
if($_REQUEST["action"] == "list") {
    $lista_permessi->setSearch($array = array(
        "socio_id" => $_GET["id_socio"]
    ));
} else {
    $lista_permessi->setSearch($array = array());
}
$lista_permessi->find();

$lista_soci = new ListaSoci();
$lista_soci->setSearch($array = array());
$lista_soci->find();

include 'Templates/main.php';