<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-6"><p style="line-height: 25px;"><?= $title ?></p></div>
            <div class="col-md-3">
                <a href="permessi.php?action=edit" class="btn btn-success"><i class="fa fa-plus-square"></i> &nbsp;Nuovo permesso</a>
            </div>
        </div>
        <div class="card-body no-padding">
<!--             datatable-->
            <table class="table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Creato il</th>
                    <th>Socio</th>
                    <th>Importo</th>
                    <th class="text-center">Uscite rim.</th>
                    <th class="text-center">Mod.</th>
                    <th class="text-center">El.</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_permessi->getIterator()->count() > 0) {
                    foreach ($lista_permessi as $permesso) {
//                        $lista_uscite_permesso = new ListaUscite();
//                        $lista_uscite_permesso->setSearch($array = array("permesso_id" => $permesso->getId()));
//                        $lista_uscite_permesso->find();
//                        if($lista_uscite_permesso->count() > 0) {
                        $socio = new Soci();
                        $socio->load($permesso->getSocioId());

                ?>
                <tr>
                    <td><?= $permesso->getCreatedAt() ?></td>
                    <td><?= $socio->getCognome() ?> <?= $socio->getNome() ?></td>
                    <td><?= $permesso->getImporto() ?></td>
                    <td class="text-center"><?= $permesso->getUscite() ?></td>
                    <td class="text-center"><a href="permessi.php?action=edit&id=<?= $permesso->getId() ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Mod.</a></td>
                    <td class="text-center"><a href="permessi.php?action=delete&id=<?= $permesso->getId() ?>" onclick="javascript:return confirm('Vuoi veramente cancellare questo permesso?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> El.</a></td>
                </tr>
                <?php // }
                } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>