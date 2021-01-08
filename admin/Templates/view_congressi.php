<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-3"><p style="line-height: 25px;"><?= $title ?></p></div>
            <div class="col-md-3">
                <a href="congressi.php?action=edit" class="btn btn-success"><i class="fa fa-plus-square"></i> &nbsp;Nuovo congresso</a>
            </div>
        </div>
        <div class="card-body no-padding">
            <table class=" table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center"> # </th>
                    <th>Titolo</th>
                    <th>Data inizio</th>
                    <th>Data fine</th>
                    <th>Descrizione</th>
                    <th class="text-center">Mod.</th>
                    <th class="text-center">El.</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_congressi->getIterator()->count() > 0) {
                    foreach ($lista_congressi as $congresso) {
                ?>
                <tr>
                    <td class="text-center">
                        <?php if($congresso->getFoto() !="") { ?>
                            <img src="../media/congressi/<?= $congresso->getFoto() ?>" style="width: 50px; height: auto;"/>
                            <?php } ?>
                    </td>
                    <td><?= $congresso->getTitolo() ?></td>
                    <td><?= $congresso->getInizio() ?></td>
                    <td><?= $congresso->getFine() ?></td>
                    <td><?= $congresso->getDescrizione() ?></td>
                    <td class="text-center"><a href="congressi.php?action=edit&id=<?= $congresso->getId() ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Mod.</a></td>
                    <td class="text-center"><a href="congressi.php?action=delete&id=<?= $congresso->getId() ?>" onclick="javascript:return confirm('Vuoi veramente cancellare questo congresso?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> El.</a></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>