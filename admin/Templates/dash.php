<!--<div class="row">-->
<!--    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--        <div class="card card-mini">-->
<!--            <div class="card-header">-->
<!--                <div class="card-title">Ultimi 5 permessi richiesti</div>-->
<!--            </div>-->
<!--            <div class="card-body no-padding table-responsive">-->
<!--                <table class="table card-table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>Ricevuta il</th>-->
<!--                        <th>Nominativo</th>-->
<!--                        <th class="right">E-mail</th>-->
<!--                        <th>Dett.</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php //if($lista_richieste->getIterator()->count() >0) {
//                        foreach ($lista_richieste as $richiesta) {
//                    ?>
<!--                    <tr>-->
<!--                        <td>--><?//= $richiesta->getRicevuta_il() ?><!--</td>-->
<!--                        <td>--><?//= $richiesta->getNominativo() ?><!--</td>-->
<!--                        <td class="right">--><?//= $richiesta->getEmail() ?><!--</td>-->
<!--                        <td><a class="btn btn-primary btn-sm gabbe" data-toggle="modal" data-target="#myModal" id="--><?//= $richiesta->getId() ?><!--"><i class="icon-pencil"></i> Dettagli</a></td>-->
<!--                    </tr>-->
<!--                    --><?php //} } ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-mini">
            <div class="card-header">
                <div class="card-title">Prossime uscite previste</div>
            </div>
            <div class="card-body no-padding table-responsive">
                <table class="table card-table">
                    <thead>
                    <tr>
                        <th>Data uscita</th>
                        <th>Socio | Nominativo</th>
                        <th>Codice uscita</th>
                        <th class="text-right">Elimiina</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($lista_uscite->getIterator()->count() >0) {
                        foreach ($lista_uscite as $uscita) {
                            $permesso = new Permessi();
                            $permesso->load($uscita->getPermessoId());
                            $socio = new Soci();
                            $socio->load($permesso->getSocioId());
                    ?>
                    <tr>
                        <td><?= $uscita->getDataUScita() ?></td>
                        <td><?= $socio->getCognome() ?> <?= $socio->getNome() ?></td>
                        <td><?= $uscita->getCodiceUscita() ?></td>
                        <td class="text-right"><a href="uscite.php?action=delete&id=<?= $uscita->getId() ?>" onclick="javascript:return confirm('Vuoi veramente cancellare questa uscita?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> El.</a></td>
                    </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="4">
                            <h4>Non ci sono uscite previste al momento!</h4>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php if($_SESSION["ruolo"] != 2) { ?>

<?php foreach($array_anagrafiche as $id_anagrafica => $ragione) {
    $dati_my_odn = Utils::myodn_data($id_anagrafica);
    $dati_utente = json_decode($dati_my_odn, TRUE);
    $fatture = $dati_utente["fatture"];
?>

    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-mini">
            <div class="card-header">
                <div class="card-title">Ultime 5 fatture <?= $ragione ?></div>
                <ul class="card-action">
                    <li>
                        <a href="/">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body no-padding table-responsive">
                <table class="table card-table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Fatt. n.</th>
                        <th>Importo</th>
                        <th class="text-center">Stato</th>
                        <th class="text-center"> # </th>
                        <th class="text-center"> # </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($fatture as $fattura) { ?>
                    <tr>
                        <td><?= date('d-m-Y', strtotime($fattura["data_fattura"])) ?></td>
                        <td><?= $fattura["fattura_numero"] ?></td>
                        <td><?= number_format($fattura["importo"], 2, ',', '.') ?></td>
                        <td class="text-center"><?php
                            if($fattura["saldata"] == "s") {
                                $stato = '<span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Pagata</span></span>';
                            } else {
                                $stato = '<span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Da saldare</span></span>';
                            }
                            echo $stato;
                            ?></td>
                        <td class="text-center"><a href="stampa_fattura.php?id_fattura=<?= $fattura["id"] ?>" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Stampa</a></td>
                        <td class="text-center">
                            <!--
                            <?php if($fattura["saldata"] != "s") {
                                $importo_da_saldare = $fattura["importo"] * 100;
                                ?>

                                <form action="index.php" method="post">
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="<?php echo $stripe['publishable_key']; ?>"
                                            data-description="Saldo fattura n. <?= $fattura["fattura_numero"] ?>"
                                            data-amount="<?= $importo_da_saldare ?>"
                                            data-label="Paga con carta"
                                            data-currency = "EUR"
                                            data-locale = "auto"
                                            data-locale="auto"></script>

                                    <input type="hidden" name="importo" value="<?= $fattura["importo"] ?>" />
                                    <input type="hidden" name="importo_da_saldare" value="<?= $importo_da_saldare ?>" />
                                    <input type="hidden" name="action" value="paga" />
                                    <input type="hidden" name="id_fattura" value="<?= $fattura["id"] ?>" />
                                </form>
                            <?php } ?>
                            -->
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php } ?>

<!--<div class="row">-->
<!--    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--        <div class="card card-mini">-->
<!--            <div class="card-header">-->
<!--                <div class="card-title">Prossimi prodotti O(n) in scadenza</div>-->
<!--                <ul class="card-action">-->
<!--                    <li>-->
<!--                        <a href="/">-->
<!--                            <i class="fa fa-refresh"></i>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="card-body no-padding table-responsive">-->
<!--                <table class="table card-table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>Products</th>-->
<!--                        <th class="right">Amount</th>-->
<!--                        <th>Status</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <td>MicroSD 64Gb</td>-->
<!--                        <td class="right">12</td>-->
<!--                        <td><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Complete</span></span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>MiniPC i5</td>-->
<!--                        <td class="right">5</td>-->
<!--                        <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Pending</span></span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Mountain Bike</td>-->
<!--                        <td class="right">1</td>-->
<!--                        <td><span class="badge badge-info badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirm Payment</span></span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Notebook</td>-->
<!--                        <td class="right">10</td>-->
<!--                        <td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Cancelled</span></span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Raspberry Pi2</td>-->
<!--                        <td class="right">6</td>-->
<!--                        <td><span class="badge badge-primary badge-icon"><i class="fa fa-truck" aria-hidden="true"></i><span>Shipped</span></span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Flashdrive 128Mb</td>-->
<!--                        <td class="right">40</td>-->
<!--                        <td><span class="badge badge-info badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirm Payment</span></span></td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>