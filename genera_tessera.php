<?php

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('enable_html5_parser', true);

$dompdf = new DOMPDF($options);
$dompdf->setPaper('A4', 'portrait');

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
<!--                    <table width="100%" class="ter">-->
<!--                        <tbody>-->
<!--                        <tr>-->
<!--                            <td><img src="permesso/toscana.jpg" width="117" height="150" alt=""/></td>-->
<!--                            <td style="text-align:center;"><img src="img/zrs_cerreto.jpg" width="420" height="150" alt=""/ ></td>-->
<!--                            <td><img src="permesso/terza.jpg" width="117" height="150" alt=""/></td> -->
<!--                        </tr>-->
<!--                        </tbody>-->
<!--                    </table>-->
                </td>
            </tr>
            <tr>
                <td>
                    <br />
                    <table width="100%" style="margin-left: 20px">
                        <tbody>
                        <tr>
                            <td><img src="permesso/terza.jpg" width="117" height="150" alt=""/></td>
                            <td width="50%"><div align="left" style="padding-left: 10px;">
                                    <span class="pic">
                                        TESSERA SOCIO N.:<br />
                                    </span></div></td>
                            <td width="50%"><div align="left">
                                    <span class="gro">
                                        <?= $socio->getNumeroTessera() ?> - <?= date("Y") ?><br />
                                    </span></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <br /><br />
                                <div align="left" style="padding-left: 10px;">
                                    <span class="pic">
                                        TIPO SOCIO:<br />
                                    </span></div></td>
                            <td width="50%">
                                <br /><br />
                                <div align="left">
                                    <span class="gro">
                                        <?= $socio->getTipoSocio() ?><br />
                                    </span></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><div align="left" style="padding-left: 10px;">
                                    <span class="pic">
                                        DATA ACQUISTO:<br />
                                    </span></div></td>
                            <td width="50%"><div align="left">
                                    <span class="gro">
                                        <?= date("d-m-Y") ?><br />
                                    </span></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><div align="left" style="padding-left: 10px;">
                                    <span class="pic">
                                        IMPORTO:<br />
                                    </span></div></td>
                            <td width="50%"><div align="left">
                                    <span class="gro">
                                        <?= str_replace(".", ",", sprintf("%01.2f", $socio->getImportoPagato())) ?><br />
                                    </span></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><div align="left" style="padding-left: 10px;">
                                    <span class="pic">
                                        VALIDITA':
                                    </span></div></td>
                            <td width="50%"><div align="left">
                                    <span class="gro">
                                        <?= $socio->getValidoFino() ?>
                                    </span></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <br /><br />
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
                            <td width="55%"><span class="gro"><?= strtoupper($socio->getCodiceFiscale()) ?></span></td>

                        </tr>
                        <tr>
                            <td width="45%" style="padding-left:18px;" ><span class="pic">Comune di Residenza:</span></td>
                            <td width="55%"><span class="gro"><?= $socio->getCitta() ?></span></td>

                        </tr>
                        </tbody>
                    </table></td>
            </tr>
            <tr><td>
                    <!--
                    <table>
                        <tr>
                            <td class="testoprivacy">
                                Art. 1 Nel tratto della ZRS – “Cerreto” la pesca è consentita, ai pescatori muniti di regolare licenza e di
                                permesso giornaliero di pesca della zona. Il costo del permesso giornaliero è di euro 10,00 non rimborsabili.
                                È previsto il rilascio di abbonamenti da 10 uscite, al costo di €. 60.00 e da 5 uscite, al costo di €. 35.00. Il
                                rilascio dell&#39;abbonamento e riservato esclusivamente ai soci dell’Associazione Mosca Club Siena e di tutti i
                                soci delle associazioni affiliate al Coordinamento Toscano Pescatori a Mosca, nonchè a tutte le associazioni
                                di pesca dilettantistica locali che collaborino con la gestione, a titolo di agevolazione per i pescatori che
                                partecipano alle attività sul territorio e quindi al mantenimento della stessa ZRS “Cerreto”. I bambini che
                                non hanno compiuto il dodicesimo anno di età potranno pescare nella ZRS senza permesso, a condizione che
                                siano accompagnati da un maggiorenne munito di licenza di pesca e da regolare permesso acquisito con le
                                modalità riportate nel presente regolamento.
                                <br />
                                Art. 2 L’esercizio della pesca è consentito in tutti i giorni della settimana, dal 01 Gennaio al 30 Giugno e dal
                                01 Ottobre al 31 Dicembre di ogni anno. Il numero massimo giornaliero delle presenze è di n. 20.
                                <br/>
                                Art. 3 Il rilascio dei permessi avviene tramite procedura on-line, collegandosi al sito dell’Associazione:
                                www.moscaclubsiena.it. Il sistema rilascia il permesso e gli abbonamenti previa il pagamento della somma
                                stabilita, anche per conto di terzi soggetti. Ovvero, al pagamento della somma stabilità il sistema rilascia il
                                permesso anche ad un soggetto diverso dall’intestatario della carta che effettua il pagamento. Gli
                                abbonamenti saranno riconosciuti dal sistema previa pagamento della quota stabilita, dopodichè sarà
                                comunque necessario acquisire il permesso giornaliero, sempre tramite il medesimo portale che provvederà a
                                scalare la giornata di pesca dal cumulativo. L&#39;abbonamento non può essere ceduto neanche parzialmente, le
                                uscite di pesca acquistate dovranno essere consumate dal medesimo soggetto a cui è intestato l&#39;abbonamento.
                                Maggiori dettagli sono disponibili sul portale.
                               <br />
                                Art. 4 La pesca è consentita esclusivamente mediante l’uso della mosca artificiale galleggiante o sommersa
                                lanciata con la coda di topo e munita di amo privo di ardiglione o con ardiglione schiacciato, con il limite
                                massimo di due artificiali per montatura; e’ altresì consentita la pesca con l’uso di esche artificiali munite di
                                amo singolo privo di ardiglione o con ardiglione schiacciato mediante la tecnica dello Spinning.
                                <br />
                                Art. 5 Divieti<br />
                                a) È fatto divieto di utilizzare esche diverse da quelle indicate dall’ art. 4;<br />
                                b) utilizzare o detenere esche siliconiche;<br />
                                c) utilizzare o detenere uova di pesci, larve di mosca, o loro imitazioni;<br />
                                d) la pasturazione;<br />
                                e) portare al seguito durante l’esercizio di pesca pesci di qualsiasi specie catturati in altro luogo;<br />
                                f) Sono fatti salvi tutti gli altri divieti previsti dall’art. 7 del D.P.G.R. n. 54/r del 22/08/2005.
                                <br />
                                Art. 6 È fatto divieto di trattenere il pescato di qualsiasi specie. Il pescatore ha l’obbligo di reimmettere in
                                acqua il pesce immediatamente dopo la cattura. La slamatura deve essere effettuata con mano bagnata.
                                <br />
                                Art. 7 L’acquisizione del permesso di pesca, determina l’accettazione del presente regolamento.
                                <br />
                                Art. 8 Le infrazioni al presente regolamento sono sanzionate ai sensi della L.R. n. 7/2005. La gestione si
                                riserva inoltre la facoltà di agire per danni nei confronti di attività illecite svolte nei confronti del patrimonio
                                ittico presente e dei fruitori dell’area.
                               <br />
                                Art. 9 Il pescatore che esercita la pesca nella ZRS – Cerreto esonera la gestione da qualsiasi responsabilità
                                per danni o sinistri che dovessero verificarsi nell’esercizio dell’attività.
                            </td>
                        </tr>
                    </table>
                    -->
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
file_put_contents("tessere/" . $socio->getId() . "-" . date("Y") . ".pdf", $outputFile);