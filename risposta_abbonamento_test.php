<?php
    include 'config.inc.php';
    require_once('admin/vendor/stripe/stripe-php/init.php');
    include 'ListaSoci.php';
    include 'ListaPermessi.php';
    include 'ListaUscite.php';

    $socio = new Soci();
    $socio->load($_SESSION["socioId"]);

//    $permesso = new Permessi();
//    $permesso->load($_SESSION["permessoId"]);
//
//    $importo = ($permesso->getImporto() * 100);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Associazione Pesca a Mosca Siena</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="mio.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .stripe-button {
            background-color: #990000;
        }
    </style>
</head>

<body>

<script src="/cookiechoices.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function (event) {
        cookieChoices.showCookieConsentBar('Questo sito utilizza i cookie per migliorare servizi ed esperienza dei lettori. Se decidi di proseguire consideriamo che accetti il loro uso',
            'chiudi', 'maggiori informazioni', 'http://www.moscaclubsiena.it/privacy.html');
    });
</script>
<!-- Navigation -->
<div class="container">
    <nav class="navbar navbar-default pagine">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="mosca siena" class="img-responsive" src="img/logo.jpg" style="margin-right: 20px;">
            </a>
            <img alt="mosca siena" class="img-responsive" src="img/logo_ctpm.png">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right riquadro">
                <li class="current-menu-item"><a href="index.html">Home</a></li>
                <li><a href="pesca-mosca-siena.html">Chi Siamo</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Attività <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="zp-merse.html">ZP Luccio Fiume Merse</a></li>
                        <li><a href="zp-senese.html">ZP Chianti Senese</a></li>
                        <li><a href="zp-calcione.html">ZP Lago del Calcione</a></li>
                        <li><a href="extra.html">Mete fuori provincia</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <br /><br /><br /><br /><br />
                <a href="ordine_singolo.php">
                    <div class="col-md-12 targab">
                        <p class="titoloabb">PERMESSO GIORNALIERO</p>
                    </div>
                </a>
                <a href="ordine_abbonamento.php">
                    <div class="col-md-12 targab">
                        <p class="titoloabb">ABBONAMENTO</p>
                    </div>
                </a>
                <a href="segna_uscita.php">
                    <div class="col-md-12 targab">
                        <p class="titoloabb">SEGNA L'USCITA</p>
                    </div>
                </a>
                <a href="diventa_socio.php">
                    <div class="col-md-12 targab">
                        <p class="titoloabb">DIVENTA SOCIO</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-1">
            &nbsp;
        </div>
        <div class="col-md-8">
            <div class="row">
                <h1 class="homep" style="border-bottom:1px solid #4a4540; padding-bottom:18px;">
                ZRS PIANELLA PERMESSI
            </h1>
                <div class="col-md-12">
                    <?php

                    // Set your secret key: remember to change this to your live secret key in production
                    // See your keys here: https://dashboard.stripe.com/account/apikeys
                    \Stripe\Stripe::setApiKey("sk_test_fcEZhkTSFym00bd8eENtsrwX");
                  //  \Stripe\Stripe::setApiKey("sk_test_fcEZhkTSFym00bd8eENtsrwX");
                    // Token is created using Checkout or Elements!
                    // Get the payment token ID submitted by the form:
                    var_dump($socio);
                    $token = $_REQUEST['stripeToken'];
                    $descrizione = $socio->getCognome() . ' ' . $socio->getNome() .  ': Ordine abbonamento &euro; - ' . $_SESSION["importo"];
                    $charge = \Stripe\Charge::create([
                        'amount' => $_SESSION["importo"]*100,
                        'currency' => 'eur',
                        'description' => $descrizione,
                        'source' => $token,
                        'metadata' => ['socioId' => $_SESSION["socioId"], 'tipo' => 'abbonanmento']]);

                    $array =  json_encode($charge, true);

$array = $charge->__toArray(true);

if($array["status"] == "succeeded") {

    $permesso = new Permessi();
    $array = array(
        "socio_id" => $_SESSION["socioId"],
        "importo" => $_SESSION["importo"],
        "uscite" => $_SESSION["uscite"]
    );
    $permesso->setSave($array);
    $id_permesso = $permesso->save();
    $_SESSION["permessoId"] = $id_permesso;

    ?>

    <div class="row">
        <div class="col-md-12">
            <h2 class="titoletto">Pagamento andato a buon fine</h2>
            <h3>Cliccate sul pulsante qui sotto per segnare un'uscita adesso oppure ritornate in un secondo momento</h3>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <a href="segna_uscita.php" class="btn btn-lg btn-success btn-block">SEGNA L'USCITA</a>
        </div>
    </div>

<?php } ?>

</div>
</div>

</div>
</div>

</div>
<div class="container-fluid">
<div class="row fascia">
<div class="container">
<div class="col-md-7 indirizzi">

<h5>Associazione Mosca Club Siena</h5>
<p> C/O S.M.S. "Il Risorgimento" • località Due Ponti - Via Aretina n°190 • 53100 SIENA • C.Fiscale
92029900526</p>

</div>
<div class="col-md-5 socials">
<div class="row">
<div class="col-md-4">FOLLOW US</div>
<div class="col-md-1"><a href="#"><i class="fa fa-facebook-square "></i></a></div>
<!--
          <div class="col-md-2"><a href="#"><i class="fa fa fa-twitter-square"></i></a></div>
          <div class="col-md-2"><a href="#"><i class="fa fa-instagram "></i></a></div>
-->
</div>

</div>
</div>
</div>
<div class="row foot">
<div class="container">
<!-- Footer -->
<footer>
<div class="row">
</div>
<div class="row copy">

<p style="padding-left:30px;">Mosca Club Siena © <?= date("Y") ?> • <a href="privacy.html">privacy policy</a>
</p>
<p style="padding-left:30px;">Powered by <a href="http://www.odienne.it" target="_blank">Odienne</a>
</p>
</div>
</div>
</footer></div>
</div>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/odn.js"></script>
</body>
</html>