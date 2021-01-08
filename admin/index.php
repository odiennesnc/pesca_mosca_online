<?php
include 'config.inc.php';
include 'Utenti.php';
include 'Anagrafiche.php';
include 'ListaPermessi.php';
include 'ListaUscite.php';
include 'ListaSoci.php';

$title = 'Dashboard';
$body = 'dash.php';

if($_REQUEST["action"]=="login") {
    $utente = new Utenti();
    $utente->loadbypsw($_POST["email"], $_POST["password"]);
    if($utente->getId()!="") {
        $_SESSION["idUtente"] = $utente->getId();
        $_SESSION["username"] = $utente->getEmail();
        $_SESSION["ruolo"] = $utente->getRuolo();
        $_SESSION["nome"] = $utente->getNominativo();
        $_SESSION["error"] = false;
        $utente->updateLastLogin();
    }
    if(isset($_SESSION["idUtente"])) {
//        $anagrafica = new Anagrafiche();
//        $anagrafica->load($_SESSION["idUtente"]);

$lista_permessi = new ListaPermessi();
$lista_uscite = new ListaUscite();

$lista_uscite->setSearch($array = array("oggi" => date(("Y-m-d"))));
$lista_uscite->find();

    } else {
        $_SESSION["error"] = true;
        header("Location: login.php");
    }

} elseif ($_REQUEST["action"] == "logout") {
    session_destroy();
    session_unset();
    header("Location: login.php");
    exit;
} elseif($_REQUEST["action"] == "registra") {
    $nuovo_utente = new Utenti();
    $nuovo_utente->set($_POST);
    $nuovo_utente->setRuolo(2);
    $nuovo_utente->setLast_login(date("Y-m-d"));
    $nuovo_utente->setCreated_at(date("Y-m-d"));
    $nuovo_utente->setReset_id($string);
    $id_nuovo_utente = $nuovo_utente->save();

    $nuova_anagrafica = new Anagrafiche();
    $nuova_anagrafica->set($_POST);
    $nuova_anagrafica->setUtenti_id($id_nuovo_utente);
    $nuova_anagrafica->save();
    header("Location: login.php");
} else {

    if($_POST["action"] == "reset_password") {
        $utente = new Utenti();
        $utente->load($_POST["utente_id"]);
        $utente->setPassword($_POST["password"]);
        $utente->updatePsw();
        header("Location: login.php");
    } else {

        if(isset($_SESSION["idUtente"])) {
            $lista_uscite = new ListaUscite();
            $lista_uscite->setSearch($array = array("inizio" => date(("Y-m-d"))));
            $lista_uscite->find();
        } else {
            header("Location: login.php");
            exit;
        }
    }
}
include 'Templates/main.php';