<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-6"><p style="line-height: 25px;"><?= $title ?></p></div>
<!--            <div class="col-md-3">-->
<!--                <a href="permessi.php?action=edit" class="btn btn-success"><i class="fa fa-plus-square"></i> &nbsp;Nuovo permesso</a>-->
<!--            </div>-->
        </div>
        <div class="card-body no-padding">
            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Socio</th>
                    <th>Data uscita</th>
                    <th>Cod. uscita</th>
                    <th>PDF</th>
                    <th class="text-center">El.</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_uscite_socio->getIterator()->count() > 0) {
                    foreach ($lista_uscite_socio as $uscita) {
                        $array_uscita = explode("-", $uscita->getDataUscita());
                        $pdf = $uscita->getCodiceUscita() . "-" . $array_uscita[2];
                ?>
                <tr>
                    <td><?= $socio->getCognome() ?> <?= $socio->getNome() ?></td>
                    <td><?= $uscita->getDataUscita() ?></td>
                    <td><?= $uscita->getCodiceUscita() ?></td>
                    <td><a href="../permesso/<?= $pdf ?>.pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
                    <td class="text-center"><a href="uscite.php?action=delete&id=<?= $uscita->getId() ?>" onclick="javascript:return confirm('Vuoi veramente cancellare questa uscita?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> El.</a></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>