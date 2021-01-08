<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-6"><p style="line-height: 25px;"><?= $title ?></p></div>
        </div>
        <div class="card-body no-padding">
            <table class="table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Data congresso</th>
                    <th>Data chiusura iscrizioni</th>
                    <th class="text-center">Iscritti</th>
                    <th class="text-center">Questionari</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_congressi->getIterator()->count() > 0) {
                    foreach ($lista_congressi as $congresso) {
                ?>
                <tr>
                    <td><?= $congresso->getTitolo() ?></td>
                    <td><?= $congresso->getInizio() ?></td>
                    <td><?= ($congresso->getDataChiusuraIscrizioni() == "01-01-1970") ? NULL : $congresso->getDataChiusuraIscrizioni() ?></td>
                    <td class="text-center"><a href="iscritti.php?action=lista&congresso_id=<?= $congresso->getId() ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Iscritti</a></td>
                    <td class="text-center"><a href="iscritti.php?action=questionario&congresso_id=<?= $congresso->getId() ?>" class="btn btn-xs btn-warning"><i class="fa fa-dashcube"></i> Questionari</a></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>