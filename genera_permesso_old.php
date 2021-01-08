<?php

use Dompdf\Dompdf;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$dompdf = new DOMPDF();

$dompdf->setPaper('A4', 'portrait');
$options = new QROptions([
    'version' => 5,
    'maskPattern' => -1,
    'addQuietzone' => false,
    'quietzoneSize' => 0,
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel' => QRCode::ECC_L,
    'scale' => 4
]);

$data = 'https://moscaclubsiena.it/check.php?codice=' . $codice_uscita;

$qrcode = new QRCode($options);

$qr = '<img src="' . $qrcode->render($data) . '" />';

ob_start();
?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Documento senza titolo</title>
        <style type="text/css">

            .contenitore  {
                width:700px;
                height:842px;
            }

            .pic  {

                font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;
                font-size: 20px;
                line-height: 1.6em;
                color: #000;

            }
            .gro  {

                font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;
                font-size: 25px;
                font-weight: 800;
                color: #000;

            }
            .testoprivacy {

                padding:4px;
                font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;
                font-size: 9px;
                text-align:justify;
                color: #000;

            }
            .testoprivacy h2{
                font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;
                font-size: 15px;
                font-weight:800;
                text-align:center;
                color: #000;

            }
            .generale{

                border:1px solid #000;

            }
            .sec{

                border-top:1px solid #000;

            }
            .ter{
                border-bottom:1px solid #000;
            }
            .page_break { page-break-before: always; }
        </style>
    </head>

    <body>
    <div class="contenitore">
        <table width="100%" align="center" class="generale" >
            <tbody>
            <tr><td>
                    <table width="100%" class="ter">
                        <tbody>
                        <tr>
                            <td><img src="permesso/toscana.jpg" width="117" height="150" alt=""/></td>
                            <td style="text-align:center;"><img src="permesso/zrslogo.jpg" width="420" height="150" alt=""/ ></td>
                            <td><img src="permesso/terza.jpg" width="117" height="150" alt=""/></td>  </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" style="margin-left: 20px">
                        <tbody>
                        <tr>
<!--                            <td width="15%" >--><?//= $qr ?><!--</td>-->
                            <td width="15%" ><img src="permesso/qr.jpg" /></td>
                            <td width="30%"><div align="left" style="padding-left: 10px;"><span class="pic">PERMESSO N.<br />
                DATA</span></div></td>
                            <td width="70%"><div align="left"><span class="gro"><?= $codice_uscita ?> - <?= date("Y") ?><br /><?= date("d-m-Y", strtotime($_SESSION["datauscita"])) ?></span></div></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tbody>
                        <tr>
                            <td width="45%" style="padding-left:18px;" ><span class="pic">Nome:</span></td>
                            <td width="55%"><span class="gro"><?= $socio->getNome() ?></span></td>

                        </tr>
                        <tr>
                            <td width="45%" style="padding-left:18px;" ><span class="pic">Cognome:</span></td>
                            <td width="55%"><span class="gro"><?= $socio->getCognome() ?></span></td>

                        </tr>
                        <tr>
                            <td width="45%" style="padding-left:18px;" ><span class="pic">Codice Fiscale:</span></td>
                            <td width="55%"><span class="gro"><?= $socio->getCodiceFiscale() ?></span></td>

                        </tr>
                        <tr>
                            <td width="45%" style="padding-left:18px;" ><span class="pic">Comune di Residenza:</span></td>
                            <td width="55%"><span class="gro"><?= $socio->getCitta() ?></span></td>

                        </tr>
                        </tbody>
                    </table></td>
            </tr>
            <tr><td>

                    <div class="testoprivacy sec">
                        <strong>Informativa ai sensi dell’art. 13 del Regolamento europeo 679/2016 e consenso</strong>
                        <br />
                        Ai sensi dell’art. 13 del Regolamento europeo (UE) 2016/679 (di seguito GDPR), e in relazione ai dati personali di cui l’Associazione entrerà nella disponibilità con la sua richiesta di permesso per la pesca sportiva, Le comunichiamo quanto segue:<br />
                        <strong>Titolare del trattamento e responsabile della protezione dei dati personali</strong><br />
                        Titolare del trattamento è l’associazione di volontariato “Mosca Club Siena”, con sede a Siena - info@moscaclubsiena.it. Il Titolare (ha/non ha) nominato un responsabile della protezione dei dati personali (RPD) .
                        <strong>Finalità del trattamento dei dati</strong><br />
                        Il trattamento è finalizzato esclusivamente allo svolgimento dell’attività istituzionale e per la corretta gestione degli ingressi nel tratto di fiume che insiste nella Z.R.S. Pianella, gestito dall’Associazione ed in particolare per:<br />
                        -        il pagamento della quota <br />
                        -        l’adempimento degli obblighi di legge<br />
                        I dati personali potranno essere trattati a mezzo sia di archivi cartacei che informatici (ivi compresi dispositivi portatili) e trattati con modalità strettamente necessarie a far fronte alle finalità sopra indicate.<br />
                        I dati non saranno comunicati a terzi né saranno diffusi. <br />
                        L’indicazione del nome, data di nascita, indirizzo, telefono e mail è necessaria per  l’adempimento degli obblighi di legge. Il conferimento degli altri dati è facoltativo.<br />
                        Conclusa la Sua attività di pesca, i dati non saranno più trattati e saranno conservati esclusivamente in formato cartaceo presso l’Associazione.<br />
                        Ove i dati personali siano trasferiti verso paesi dell’Unione Europea o verso paesi terzi o ad un’organizzazione internazionale, nell’ambito delle finalità sopra indicate, Le sarà comunicato se esista o meno una decisione di adeguatezza della Commissione UE.
                        <br />
                        <strong>Base giuridica del trattamento</strong><br />
                        L’Associazione tratta i Suoi dati personali lecitamente, laddove il trattamento:<ul>
                            <li>sia necessario all’esecuzione del mandato;</li>
                            <li>sia necessario per adempiere un obbligo legale incombente sull’Associazione;</li>
                        </ul>
                        <strong>Conservazione dei dati</strong><br />
                        I Suoi dati personali, oggetto di trattamento per le finalità sopra indicate, saranno conservati per il periodo di durata del rapporto e, successivamente, per il tempo in cui l’Associazione sia soggetta a obblighi di conservazione  per finalità fiscali o per altre finalità, previste, da norme di legge o regolamento.
                        <br />
                        <strong>Comunicazione dei dati</strong><br />
                        I Suoi dati personali potranno essere comunicati a:<br />
                        1. soggetti che elaborano i dati in esecuzione di specifici obblighi di legge;<br />
                        4. Autorità giudiziarie o amministrative, per l’adempimento degli obblighi di legge.
                        <br />
                        <strong>Profilazione e Diffusione dei dati</strong><br />
                        I Suoi dati personali non sono soggetti a diffusione né ad alcun processo decisionale interamente automatizzato, ivi compresa la profilazione.
                        <br />
                        <strong>Diritti dell’interessato</strong><br />
                        Tra i diritti a Lei riconosciuti dal GDPR rientrano quelli di:
                        <ul>
                            <li>chiedere all’Associazione l'accesso 	ai Suoi dati personali ed alle informazioni relative agli stessi; la rettifica dei dati inesatti o l'integrazione di quelli incompleti; la cancellazione dei dati personali che La riguardano (al verificarsi di una delle condizioni indicate nel GDPR e nel rispetto delle eccezioni previste nello stesso); la limitazione del trattamento dei Suoi dati personali (al ricorrere di una delle ipotesi indicate nel GDPR);</li>
                            <li>richiedere ed ottenere dall’Associazione - nelle ipotesi in cui la base giuridica del trattamento sia il contratto o il consenso, e lo stesso sia effettuato con mezzi automatizzati - i Suoi dati personali in un formato strutturato e leggibile da dispositivo automatico, anche al fine di comunicare tali dati ad un altro titolare del trattamento (c.d. diritto alla portabilità dei dati personali);</li>
                            <li>opporsi in qualsiasi momento al trattamento dei Suoi dati personali al ricorrere di situazioni particolari che La riguardano;</li>
                            <li>revocare il consenso in qualsiasi momento, limitatamente alle ipotesi in cui il trattamento sia basato sul Suo consenso per una o più specifiche finalità e riguardi dati personali comuni (ad esempio data e luogo di nascita o luogo di residenza), oppure particolari categorie di dati (ad esempio dati che rivelano la Sua origine razziale, le Sue opinioni politiche, le Sue convinzioni religiose, lo stato di salute o la vita sessuale). Il trattamento basato sul consenso ed effettuato antecedentemente alla revoca dello stesso conserva, comunque, la sua liceità;</li>
                            <li>proporre reclamo a un'autorità di controllo (Autorità Garante per la protezione dei dati personali – www.garanteprivacy.it).
                        </ul>
                    </div>

                </td></tr>

            </tbody>
        </table>
    </div>
    </body>
    </html>

<?php

$html = ob_get_contents();
ob_end_clean();

$dompdf->loadHtml($html);
$dompdf->render();

$outputFile = $dompdf->output();
file_put_contents("permesso/" . $codice_uscita . "-" . date("Y") . ".pdf", $outputFile);