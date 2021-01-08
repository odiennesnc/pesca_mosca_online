<?php
    include 'config.inc.php';
    require_once('admin/vendor/stripe/stripe-php/init.php');
    include 'ListaSoci.php';
    include 'ListaPermessi.php';
    include 'ListaUscite.php';

    $permesso = new Permessi();
    $socio = new Soci();
    if(isset($_SESSION["permessoId"])) {
        $permesso->load($_SESSION["permessoId"]);
        $socio->load($permesso->getSocioId());
    }
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
<!--    <li><a href="galleria.html">Galleria Fotografica</a></li>   --> 
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
                <h1 class="homep" style="border-bottom:1px solid #4a4540; padding-bottom:18px;">SEGNA LA TUA USCITA</h1>
                <div class="col-md-12">

<!--                  <span class="tit text-center"> La-->
<!--ZRS Pianella rimarrà chiusa alla pesca <br />dal 01/07 al 30/09</span>-->
                    <br /><br />

                    <?php if(!$_POST) { ?>

                    <div class="well text-center">
                        <h4>Inserisci il tuo codice fiscale e seleziona la data</h4>
                    </div>

                    <form action="segna_uscita.php" name="form_singola" id="form_singola" method="POST" role="form">
<!--                        <div class="form-group">-->
<!--                            <label for="nome">Nome</label>-->
<!--                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>-->
<!--                            <div class="help-block with-errors"></div>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="cognome">Cognome</label>-->
<!--                            <input type="text" class="form-control" name="cognome" id="cognome" placeholder="Cognome" required>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="codice_fiscale">Codice Fiscale</label>
                            <input type="text" class="form-control" name="codice_fiscale" id="codice_fiscale" placeholder="Codice Fiscale" value="<?= $socio->getCodiceFiscale() ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Data uscita:</label>
                            <input type="text" class="form-control datepicker" id="datauscita" name="datauscita" placeholder="dd-mm-yyyy" required="">
                        </div>

                        <br />
                        <input type="hidden" name="importo" value="10" />
                        <button type="submit" class="btn btn-success btn-block btn-lg" id="vai">Prosegui</button>
                    </form>
                </div>

                    <?php } else {

                        if(date("Y-m-d", strtotime($_POST["datauscita"])) >= date("Y-m-d")) {
                        $codice_uscita = Utils::getCodiceUscita();
                        $socio->loadByCodice($_POST["codice_fiscale"]);
                        if($socio->getSocio() == "s") {
                        $permesso->loadbySocio($socio->getId());
                        if($permesso->getUscite() > 0) {
                            $array_uscita = array(
                                "permesso_id" => $permesso->getId(),
                                "data_uscita" => date("Y-m-d", strtotime($_POST["datauscita"])),
                                "codice_uscita" => $codice_uscita
                            );

                            $uscita = new Uscite();
                            $uscita->setSave($array_uscita);
                            $uscita->setCodiceUscita($codice_uscita);
                            $id_uscita = $uscita->save();

                            $_SESSION["codicefiscale"] = $_POST["codice_fiscale"];
                            $_SESSION["datauscita"] = $_POST["datauscita"];
                            $_SESSION["socioId"] = $socio->getId();
                            $_SESSION["permessoId"] = $permesso->getId();
                            $permesso->scalaUscita();
                            include 'genera_permesso.php';

                            $new_permesso = new Permessi();
                            $new_permesso->load($_SESSION["permessoId"]);

                        ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="titoletto">Uscita segnata con successo: <?= $new_permesso->getUscite() ?> rimanenti</h2>
                        <h3>Cliccate sul pulsante qui sotto per scaricare il permesso di pesca</h3>
                        <h4>NB. E' necessario stampare il permesso appena creato e portarlo con se il giorno dell'uscita di pesca</h4>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <a href="permesso/<?= $codice_uscita ?>-<?= date("Y") ?>.pdf" class="btn btn-lg btn-danger btn-block" target="_blank">SCARICA IL PERMESSO</a>
                    </div>
                </div>
                      <?php  } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Hai terminato il numero di uscite disponibili per il tuo abbonamento</h2>
                                </div>
                                <div class="col-md-6 col-md-offset-3">
                                    <br />
                                    <a href="ordine_abbonamento.php" class="btn btn-lg btn-danger btn-block">ACQUISTA UN NUOVO ABBONAMENTO</a>
                                </div>
                            </div>
                            <?php } ?>

                <?php } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Questa possibilità è valida solo per i soci che dispongono di un abbonamento valido</h2>
                                </div>
                                <div class="col-md-4 col-md-offset-4">
                                    <br />
                                    <a href="diventa_socio.php" class="btn btn-lg btn-danger btn-block">DIVENTA SOCIO</a>
                                </div>
                            </div>
                <?php } ?>

                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="titoletto text-center">NON E' POSSIBILE SELEZIONARE UNA DATA PASSATA</h2>
                            </div>
                        </div>
                    <?php } ?>

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
    <div class="col-md-1"><a href="https://www.facebook.com/Associazione-Mosca-Club-Siena-108054580749162/" target="_blank"><i class="fa fa-facebook-square "></i></a></div>
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
<!--<script src="js/validator.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.it.min.js"></script>
<script src="js/odn.js"></script>

<!-- Script to Activate the Carousel -->
<script>
$(function () {
$('[data-toggle="popover"]').popover({html: true});

    $( ":button" ).removeClass( "stripe-button-el" );
    $( "#pagamento :button" ).addClass( "btn btn-success btn-lg");
    $( "#pagamento :button span" ).css("min-height", 0);
    var carta = '<i class="fa fa-credit-card" aria-hidden="true" style="color:#fff; line-height: 2em;"></i>&nbsp;';
    $("#pagamento :button span").html(carta + " " + "Paga con carta di credito");

    $('.datepicker').datepicker({
        language: "it",
        format: "dd-mm-yyyy"
    });


})

$(document).delegate('#vai', 'click', function() {
    $("#form_singola").validate({
    errorPlacement: function(error, element) {
        error.appendTo( element.parent() );
    },
    submitHandler : function(form) {
        form.submit();
        return false;
    }
});
});
</script>

</body>

</html>