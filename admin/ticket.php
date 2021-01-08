<?php
include 'config.inc.php';

$body = 'edit_ticket.php';
$title = 'Inviace la tua richiesta';

switch($_REQUEST["action"]) {

    case "send":
        $title = 'Richiesta assistenza';
        $to = "odiennesnc@gmail.com";
        $oggetto = $_POST["oggetto"];
        $messaggio_cliente = $_POST["messaggio"];

        if(mail($to, $oggetto, $messaggio_cliente, "From: info@allevamentopoggiosalvi.it")) {
            $alert = "Messaggio inviato con successo";
        }

//        $params["host"] = "smtp.sparkpostmail.com";
//        $params["port"] = "587";
//        $params["auth"] = true;
//        $params["username"] = "SMTP_Injection";
//        $params["password"] = '21600251e8388e1159b2827eb3b7226a0502481f';
//        $params["localhost"] = "myodn.it";

//        $headers["Return-Path"]="info@myodn.it";
//
//        $headers["From"]=$_POST["email"];
//
//        $headers["Subject"]=$oggetto;
//        $headers["To"]= "<" . $to . ">";
//        $headers["Date"] = date('r');
//        $headers["Message-ID"] = "<" . uniqid() . '@myodn.it>';
//
//        $crlf = "\n";
//        $mime = new Mail_mime($crlf);
//
//        $mime->setTXTBody($text_version);
//        $mime->setHTMLBody($messaggio_cliente);
//        $body = $mime->get();
//        $hdrs = $mime->headers($headers);
//
//        $mail_object =& Mail::factory('smtp', $params);
//
//
//        $mandato = $mail_object->send($to, $hdrs, $body);
//        if (PEAR::isError($mandato)) { print($mandato->getMessage());}

//        $body = "edit_ticket.php";
        break;

    default:
        break;
}

include 'Templates/main.php';
?>
