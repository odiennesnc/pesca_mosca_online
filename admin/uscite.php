<?php
include 'config.inc.php';
include 'ListaUscite.php';
include 'ListaSoci.php';
include 'ListaPermessi.php';

$body = 'view_uscite.php';
$title = 'Elenco uscite';
$uscita = new Uscite();
switch($_REQUEST["action"]) {

    case "edit":
        $title = 'Inserisci nuova uscita';
        if($_REQUEST["id"]) {
            $uscita->load($_REQUEST["id"]);
            $title = 'Modifica uscita';
        }
        $body = "edit_uscita.php";
        break;
    case "write":
        if($_REQUEST["id"]!="") {
            $uscita->load($_REQUEST["id"]);
        }
        $uscita->setSave($_POST);
        $uscita->save();
        $alert="Inserimento | modifica effettuato correttamente";
        break;
    case "delete":
        if($_GET["id"]) {
            $uscita->load($_GET["id"]);
            $uscita->delete($_GET["id"]);
            $alert="Cancellazione eseguita con successo";
        }
        break;
    case "search":
        $lista_uscite_socio = new ListaUscite();
        $lista_uscite_socio->setSearch($array = array(
            "inizio" => date("Y-m-d", strtotime($_POST["inizio"])),
            "fine" => date("Y-m-d", strtotime($_POST["fine"]))
        ));
        $lista_uscite_socio->find();
        break;
    case "list":
            $socio = new Soci();
            $socio->load($_GET["id_socio"]);
            $sel = $socio->getCognome() . " " . $socio->getNome();
            $lista_uscite_socio = new ListaUscite();
            $lista_uscite_socio->findBySocio($_GET["id_socio"]);
            $body = 'view_uscite_list.php';
            $title = "Elenco uscite per " . $sel;
        break;
    default:
        $lista_uscite_socio = new ListaUscite();
        $lista_uscite_socio->setSearch($array = array());
        $lista_uscite_socio->find();
        break;
}

include 'Templates/main.php';