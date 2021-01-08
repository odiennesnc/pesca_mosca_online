<?php
include 'config.inc.php';

$dati = json_decode(Utils::myodn_fattura($_GET["id_fattura"]),true);
$fattura = $dati["fattura"];
$prodotti_in_fattura = $dati["prodotti_in_fattura"];

//var_dump($fattura);
//echo "<br />";
//var_dump($prodotti_in_fattura);

//require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('enable_html5_parser', true);
$dompdf = new DOMPDF($options);

//$html = <<<'ENDHTML'
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fattura n. <?= $fattura["fattura_numero"]  ?> - <?= $dati_utente["anagrafica"]["ragione_sociale"] ?></title>
<link rel="stylesheet" href="assets/css/style_fatture.css" media="all" />

  </head>
  <body style="font-size: 10px">

      <div class="contienti">
          <table>
              <tr>
                  <td style="padding: 0px; background-color: #ffffff;">
                      <div id="logo">
                      <img src="assets/images/logo_fatture.jpg">
                      </div>
                  </td>
              </tr>
              <tr>
                  <td class="text-right">
      <h1 style="padding-right: 30px; padding-bottom: 5px; padding-top: 5px;">Fattura n. <?= $fattura["fattura_numero"]  ?> | del: <?=  date('d-m-Y', strtotime($fattura["data_fattura"])) ?></h1>
                  </td>
              </tr>
          </table>
          <table>
               <tr>
                  <td style="text-align: left; font-family: 'DejaVu Serif'; font-size: 12px;">
          <div><strong>INTESTATARIO:</strong></div><br />
          <div><strong><?= $dati_utente["anagrafica"]["ragione_sociale"] ?></strong></div>
          <div><?= $dati_utente["anagrafica"]["indirizzo"] ?></div>
          <div><?= $dati_utente["anagrafica"]["cap"] ?> - <?= $dati_utente["anagrafica"]["citta"] ?></div>
          <div>P.IVA: <?= $dati_utente["anagrafica"]["piva"] ?></div>
        <?php if($dati_utente["anagrafica"]["cod_fisc"] !="") { ?>
        <div>Cod.Fisc.: <?= $dati_utente["anagrafica"]["cod_fisc"] ?></div>
       <?php } ?>
                  </td>
                  <td class="text-right">
                     <div><strong>Odienne snc</strong></div>
        <div>Strada della Tressa, 7</div>
        <div>53100 - Siena</div>
        <div>P.IVA: 01271010520</div>        
        <div>+39 0577 378877</div>  
        <div><a href="http://www.odienne.it" target="_blank" style="text-decoration: none;">www.odienne.it</a></div>
        <div><a href="mailto:info@odienne.it" style="text-decoration: none;">info@odienne.it</a></div>                    
                  </td>                  
              </tr>
          </table>

    <main>
      <table>
        <thead>
          <tr>
<!--            <th class="service">SERVICE</th>-->
            <th class="desc">DESCRIZIONE</th>
            <th class="text-right">PREZZO</th>
            <th class="text-center">QT.</th>
            <th class="text-right">TOTALE</th>
          </tr>
        </thead>
        <tbody>
           <?php 
                $totale = 0;
                $parziale = 0;

                foreach($prodotti_in_fattura as $prodotto) {
                    ?>
                    <tr>
                        <td><?= nl2br($prodotto["descrizione"]) ?></td>
                        <?php $prezzo = $prodotto["prezzo"] ?>
                        <td class="text-right">&euro; <?= number_format($prezzo, 2, ',', ' ') ?></td>
                        <td class="text-center"><?= $prodotto["qty"] ?></td>
                        <?php $subtotale = $prodotto["prezzo"] * $prodotto["qty"]; ?>
                        <td class="text-right">&euro; <?= number_format($subtotale, 2, ',', ' ') ?></td>
                    </tr>
                    <?php
                    $parziale += $subtotale;
                }
                ?>
        </tbody>
      </table>
        <table>
          <tr>
              <td>&nbsp;</td>
          </tr>
        </table>
            <table>
          <tr>
              <td colspan="2" class="text-right" style="padding-right: 20px;">SUBTOTALE</td>
              <td>&nbsp;</td>
            <td class="text-right">&euro; <?= number_format($parziale, 2, ',', ' ') ?></td>
          </tr>
          <?php if($fattura["sconto"] > 0) { ?>
            <tr>
              <td colspan="2" class="text-right" style="padding-right: 20px;">SCONTO</td>
              <?php 
                $parziale -= $fattura["sconto"];
                ?> 
              <td>&nbsp;</td>    
              <td class="text-right">&euro; <?= number_format($fattura["sconto"], 2, ',', ' ') ?></td>
            </tr>
            <tr>
              <td colspan="2" class="text-right" style="padding-right: 20px;">IMPONIBILE</td>
              <td>&nbsp;</td>    
              <td class="text-right">&euro; <?= number_format($parziale, 2, ',', ' ') ?></td>
            </tr>            
          <?php } ?>
          
          <tr>
            <td colspan="2" class="text-right" style="padding-right: 20px;">IVA <?= $iva_conf ?></td>
            <td>&nbsp;</td>     
             <?php 
                $iva = ($parziale * $iva_conf)/100;
                $totale = $parziale + $iva;
                ?>
            <td class="text-right">&euro; <?= number_format($iva, 2, ',', ' ') ?></td>
          </tr>
          <?php if($fattura["modalita_pagamento"] == "riba") { ?>
                <?php  $totale += $fattura["spese_riba"]; ?>
            <tr>
              <td colspan="2" class="text-right" style="padding-right: 20px;">Spese incasso es. art. 15</td>
              <td>&nbsp;</td>    
              <td class="text-right">&euro; <?= number_format($fattura["spese_riba"], 2, ',', ' ') ?></td>
            </tr>
          <?php } ?>
          
          <tr>
              <td colspan="2" class="text-right" style="padding-right: 20px;"><strong>TOTALE FATTURA</strong></td>
            <td>&nbsp;</td>
           
            <td class="text-right"><strong>&euro; <?= number_format($totale, 2, ',', ' ') ?></strong></td>
          </tr>
          
        </tbody>
      </table>
        <br /><br />
      <div id="notices">
        <div>NOTE AGGIUNTIVE:</div>
        <?php switch($fattura["modalita_pagamento"]) {
            case "contanti":
                $modalita = "Contanti vista fattura";
                break;
            case "bonifico":
                $modalita = "Bonifico bancario";
                break;  
            case "carta":
                $modalita = "Carta di credito";
                break;    
            case "riba":
                $modalita = "Ricevuta bancaria";
                break; 
            case "paypal":
                $modalita = "Paypal";
                break; 
            default :
                $modalita = "";
            break; 
        }
        ?>        

        <p><strong>Modalità di pagamento:</strong> <?= $modalita ?></p>

                    <?php if($fattura["modalita_pagamento"] == "riba") { ?>
                        <?php if($fattura["scadenza1"] != "1970-01-01") { ?>
                            <p><strong>Prima scadenza:</strong> <?= date('d-m-Y', strtotime($fattura["scadenza1"])) ?></p>
                        <?php } ?>
                        <?php if($fattura_["scadenza2"] != "1970-01-01") { ?>
                            <p><strong>Seconda scadenza:</strong> <?= date('d-m-Y', strtotime($fattura["scadenza2"])) ?></p>
                        <?php } ?>
                        <?php if($fattura["scadenza3"] != "1970-01-01") { ?>
                            <p><strong>Terza scadenza:</strong> <?php date('d-m-Y', strtotime($fattura["scadenza3"])) ?></p>
                        <?php } ?>                            
                    <?php } ?>
                    <?php if($fattura["modalita_pagamento"] == "bonifico") {
                             if($fattura["banca"] != "cambiano") {
                        ?> 
                            <p><strong>Coordinate Bancarie:</strong><br />
                            BANCA: CHIANTI BANCA<br />
                            IBAN: IT 36 W 08673 71940 012007120353</p>                            
                    <?php } else { ?>
                            <p><strong>Coordinate Bancarie:</strong><br />
                            BANCA: BANCA DI CAMBIANO<br />                                
                            IBAN: IT 23 Q 08425 71790 000040499667<br />
                            BIC: CRACIT33</p>                              
                    <?php } }?>
                    <?php if($fattura["note_pagamento"] != "") { ?>
                            <p><strong>Note:</strong> <br />
                            <?= $fattura_generata["note_pagamento"] ?></p>
                    <?php } ?>                             

        <div class="notice">
              <?php if($fattura["saldata"] == "s") { ?>
           
            <p><strong>Pagata: </strong> SI  |
                  <strong>Data saldo:</strong> <?= date('d-m-Y', strtotime($fattura["saldata_il"])) ?>
            </p>

              <?php } ?>        
        </div>
      </div>
    </main>
      </div>
  </body>
</html>
<?php
//ENDHTML;
$html = ob_get_contents();
ob_end_clean();

$dompdf->load_html($html);
$dompdf->render();

$dompdf->stream("fattura-" . $fattura["fattura_numero"] .".pdf");
?>