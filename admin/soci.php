<?php
include 'config.inc.php';
include 'ListaSoci.php';
include 'ListaPermessi.php';
include 'ListaUscite.php';

$body = 'view_soci.php';
$title = 'Elenco Soci';
$socio = new Soci();
switch($_REQUEST["action"]) {
    case "edit":
        $title = 'Inserisci nuovo socio';
        if($_REQUEST["id"]) {
            $socio->load($_REQUEST["id"]);
            $title = 'Modifica socio';
        }
        $body = "edit_socio.php";
        break;
    case "write":
        if($_REQUEST["id"]!="") {
            $socio->load($_REQUEST["id"]);
            $socio->setSave($_POST);
            $socio->setValidoFino($_POST["valido_fino"]);
        } else {
            $socio->setSave($_POST);
            $socio->setValidoFino((date("Y") + 1) . "-02-28");
            $socio->setNumeroTessera(Utils::getNumeroTessera());
        }
        $id = $socio->save();
        $alert="Inserimento | modifica effettuata correttamente";
        $_GET["socio"] = 's';
        break;
    case "delete":
        if($_GET["id"]) {
            $socio->load($_GET["id"]);
            $socio->delete($_GET["id"]);
            $alert="Cancellazione eseguita con successo";
        }
        break;

    default:
        break;
}
if($_GET["socio"] == 's') {
    $lista_soci = new ListaSoci();
    $lista_soci->setSearch($array = array("socio" => $_GET["socio"]));
    $lista_soci->find();
} elseif($_GET["socio"] == 'n') {
//    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
//    $db->exec('set names utf8');
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $query = "SELECT soci.*, COUNT(uscite.id) AS somma FROM soci,permessi,uscite
//                WHERE soci.id = permessi.socio_id
//                    AND permessi.id = uscite.permesso_id
//                    AND soci.socio = 'n'";
//    echo $query;
//    $statement = $db->prepare($query);
//    $statement->execute();
//    while ($rec = $statement->FETCH(PDO::FETCH_ASSOC)) {
//        $array_non_soci[] = $rec;
//    };
    $lista_soci = new ListaSoci();
    $lista_soci->setSearch($array = array("socio" => $_GET["socio"]));
    $lista_soci->find();
    $body = 'view_no_soci.php';
}

include 'Templates/main.php';