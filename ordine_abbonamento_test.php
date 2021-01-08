<?php
    include 'config.inc.php';
    require_once('admin/vendor/stripe/stripe-php/init.php');
    include 'ListaSoci.php';
    include 'ListaPermessi.php';
    include 'ListaUscite.php';

    $socio = new Soci();
    if($_REQUEST["id_socio"]) {
        $socio->load($_REQUEST["id_socio"]);
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
    <li><a href="galleria.html">Galleria Fotografica</a></li>   
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
                ZRS PIANELLA ABBONAMENTI
            </h1>
                <div class="col-md-12">
                    <?php if(!$_POST) { ?>

                    <div class="well text-center">
                        <h4>Per abbonarsi è necessario collaborare alla gestione e quindi essere soci come da regolamento</h4>
                    </div>

                    <form action="ordine_abbonamento_test.php" name="form_singola" id="form_singola" method="POST" role="form">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?= $socio->getNome() ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" class="form-control" name="cognome" id="cognome" value="<?= $socio->getCognome() ?>" placeholder="Cognome" required>
                        </div>
                        <div class="form-group">
                            <label for="codice_fiscale">Codice Fiscale</label>
                            <input type="text" class="form-control" name="codice_fiscale" id="codice_fiscale" value="<?= $socio->getCodiceFiscale() ?>" placeholder="Codice Fiscale" required>
                        </div>
                        <hr />
                        <div class="radio">
                            <label>
                                <input type="radio" name="uscite" id="radio1" value="5" checked>
                                <h4 style="margin-top: 0px">ABBONAMENTO 5 USCITE: &euro; 35,00</h4>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="uscite" id="radio2" value="10">
                                <h4 style="margin-top: 0px">ABBONAMENTO 10 USCITE: &euro; 60,00</h4>
                            </label>
                        </div>
<hr />
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="si" name="acconsento" required> Accetto i termini della privacy policy e presto il consenso
                            </label>
                        </div>
           
                        <!-- Large modal -->
<button type="button" class="btn btn-primary informativa" data-toggle="modal" data-target=".bs-example-modal-lg">Leggi l'informativa completa</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   <div class="testoprivacymo"><h2>Informativa ai sensi dell’art. 13 del Regolamento europeo 679/2016 e consenso</h2>

Ai sensi dell’art. 13 del Regolamento europeo (UE) 2016/679 (di seguito GDPR), e in relazione ai dati personali di cui l’Associazione entrerà nella disponibilità con la sua richiesta di permesso per la pesca sportiva, Le comunichiamo quanto segue:<br />
          <h2>Titolare del trattamento e responsabile della protezione dei dati personali</h2>
Titolare del trattamento è l’associazione di volontariato “Mosca Club Siena”, con sede a Siena - info@moscaclubsiena.it. Il Titolare (ha/non ha) nominato un responsabile della protezione dei dati personali (RPD) .
          <h2>Finalità del trattamento dei dati</h2>
Il trattamento è finalizzato esclusivamente allo svolgimento dell’attività istituzionale e per la corretta gestione degli ingressi nel tratto di fiume che insiste nella Z.R.S. Pianella, gestito dall’Associazione ed in particolare per:<br />
-        il pagamento della quota <br />
-        l’adempimento degli obblighi di legge<br /> 
I dati personali potranno essere trattati a mezzo sia di archivi cartacei che informatici (ivi compresi dispositivi portatili) e trattati con modalità strettamente necessarie a far fronte alle finalità sopra indicate.<br />
I dati non saranno comunicati a terzi né saranno diffusi. <br />
L’indicazione del nome, data di nascita, indirizzo, telefono e mail è necessaria per  l’adempimento degli obblighi di legge. Il conferimento degli altri dati è facoltativo.<br />
Conclusa la Sua attività di pesca, i dati non saranno più trattati e saranno conservati esclusivamente in formato cartaceo presso l’Associazione.<br />
Ove i dati personali siano trasferiti verso paesi dell’Unione Europea o verso paesi terzi o ad un’organizzazione internazionale, nell’ambito delle finalità sopra indicate, Le sarà comunicato se esista o meno una decisione di adeguatezza della Commissione UE.

<h2>Base giuridica del trattamento</h2>
L’Associazione tratta i Suoi dati personali lecitamente, laddove il trattamento:<ul>
<li>sia necessario all’esecuzione del mandato;</li>
<li>sia necessario per adempiere un obbligo legale incombente sull’Associazione;</li>
          </ul>

<h2>Conservazione dei dati</h2>
I Suoi dati personali, oggetto di trattamento per le finalità sopra indicate, saranno conservati per il periodo di durata del rapporto e, successivamente, per il tempo in cui l’Associazione sia soggetta a obblighi di conservazione  per finalità fiscali o per altre finalità, previste, da norme di legge o regolamento.
          <h2>Comunicazione dei dati</h2>
I Suoi dati personali potranno essere comunicati a:<br />
1. soggetti che elaborano i dati in esecuzione di specifici obblighi di legge;<br />
4. Autorità giudiziarie o amministrative, per l’adempimento degli obblighi di legge.

<h2>Profilazione e Diffusione dei dati</h2>
I Suoi dati personali non sono soggetti a diffusione né ad alcun processo decisionale interamente automatizzato, ivi compresa la profilazione.

          <h2>Diritti dell’interessato</h2>
Tra i diritti a Lei riconosciuti dal GDPR rientrano quelli di:<ul>
<li>chiedere all’Associazione l'accesso 	ai Suoi dati personali ed alle informazioni relative agli stessi; la rettifica dei dati inesatti o l'integrazione di quelli incompleti; la cancellazione dei dati personali che La riguardano (al verificarsi di una delle condizioni indicate nel GDPR e nel rispetto delle eccezioni previste nello stesso); la limitazione del trattamento dei Suoi dati personali (al ricorrere di una delle ipotesi indicate nel GDPR);</li>
<li>richiedere ed ottenere dall’Associazione - nelle ipotesi in cui la base giuridica del trattamento sia il contratto o il consenso, e lo stesso sia effettuato con mezzi automatizzati - i Suoi dati personali in un formato strutturato e leggibile da dispositivo automatico, anche al fine di comunicare tali dati ad un altro titolare del trattamento (c.d. diritto alla portabilità dei dati personali);</li>
<li>opporsi in qualsiasi momento al trattamento dei Suoi dati personali al ricorrere di situazioni particolari che La riguardano;</li>
<li>revocare il consenso in qualsiasi momento, limitatamente alle ipotesi in cui il trattamento sia basato sul Suo consenso per una o più specifiche finalità e riguardi dati personali comuni (ad esempio data e luogo di nascita o luogo di residenza), oppure particolari categorie di dati (ad esempio dati che rivelano la Sua origine razziale, le Sue opinioni politiche, le Sue convinzioni religiose, lo stato di salute o la vita sessuale). Il trattamento basato sul consenso ed effettuato antecedentemente alla revoca dello stesso conserva, comunque, la sua liceità;</li>
<li>proporre reclamo a un'autorità di controllo (Autorità Garante per la protezione dei dati personali – www.garanteprivacy.it).</ul></div>
         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
      </div>
    </div>
  </div>
</div>
                        <br /><br />
                        <input type="hidden" name="importo" value="10" />
                        <button type="submit" class="btn btn-success btn-block btn-lg" id="vai">Vai al pagamento</button>
                    </form>
                </div>

                    <?php } else {
                        $socio = new Soci();
                        $socio->loadByCodice($_POST["codice_fiscale"]);
                        if($socio->getId() != "" and $socio->getSocio() == "s") {
                            $socio->updateLogin();
                            $id_socio = $socio->getId();
                            $permessi_socio = new ListaPermessi();
                            $permessi_socio->setSearch($array = array("socio_id" => $id_socio, "uscite" => true));
                            $permessi_socio->find();
                         //  $xx = $permessi_socio->getIterator()->count();
                           if($permessi_socio->getIterator()->count() <= 0){

                               if($_POST["uscite"] == 5) {
                                   $importo = 35;
                               } else { $importo = 60; }

                               $_SESSION["codicefiscale"] = $_POST["codice_fiscale"];
                               $_SESSION["socioId"] = $id_socio;
                               $_SESSION["importo"] = $importo;
                               $_SESSION["uscite"] = $_POST["uscite"];

                               ?>
                               <div class="col-md-12 text-center">
                                   <?php $importo = $importo * 100; ?>
                                   <form action="risposta_abbonamento_test.php" method="POST" id="pagamento">
                                       <script
                                               src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                               data-key="pk_test_zCuHdnDDhIYpxIuTsMUuZcDk"
                                               data-amount="<?= $importo ?>"
                                               data-name="Mosca Club Siena"
                                               data-description="Abbonamento <?= $_POST["uscite"] ?> uscite: &euro; <?= $importo ?>"
                                               data-image="http://moscaclubsiena.it/img/logo.jpg"
                                               data-locale="it"
                                               data-label="Paga con carta"
                                               data-email="info@moscaclubsiena.it"
                                               data-currency="eur"
                                               data-allow-remember-me="false"
                                               data-zip-code="false">
                                       </script>
                                   </form>
                               </div>

                        <?php } else {
                               if($permessi_socio->getIterator()->count() <= 0){
                               $n_uscite = 0;
                               foreach ($permessi_socio as $permesso) {
                                   $n_uscite = $permesso->getUscite();
                               } }
                               ?>
                               <div class="row">
                                   <div class="col-md-12">
                                       <h2>Hai ancora n. <?= $n_uscite ?> a disposizione nel tuo abbonamento</h2>
                                   </div>
                                   <div class="col-md-6 col-md-offset-3">
                                       <br />
                                       <a href="segna_uscita.php" class="btn btn-lg btn-danger btn-block">SEGNA L'USCITA</a>
                                   </div>
                               </div>
                               <?php } ?>
                     <?php } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="titoletto text-center">NESSUN SOCIO CORRISPONDE AI DATI INSERITI</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-3">
                                    <a href="zrspianella.php" class="btn btn-block btn-warning btn-lg">TORNA INDIETRO</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="diventa_socio.php" class="btn btn-block btn-info btn-lg">DIVENTA SOCIO</a>
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
<!--<script src="js/validator.js"></script>-->
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