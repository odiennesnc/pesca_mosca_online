<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-3"><p style="line-height: 25px;"><?= $title ?></p></div>
            <div class="col-md-3">
                <a href="soci.php?action=edit" class="btn btn-success"><i class="fa fa-plus-square"></i> &nbsp;Nuovo socio</a>
            </div>
        </div>
        <div class="card-body no-padding">

            <table class=" table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th> # </th>
                    <th>Cognome</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th class="text-center">Uscite.</th>
                    <th class="text-center">Mod.</th>
                    <th class="text-center">El.</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_soci->getIterator()->count() > 0) {
                    foreach ($lista_soci as $socio) {
                        $lista_uscite_socio = new ListaUscite();
                        $lista_uscite_socio->findBySocio($socio->getId());
                        $n_uscite = $lista_uscite_socio->count();
                ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="form-control" name="iscritto_id" />
                    </td>
                    <td><?= $socio->getCognome() ?></td>
                    <td><?= $socio->getNome() ?></td>
                    <td><?= $socio->getEmail() ?></td>
                    <td><?= $socio->getTelefono() ?></td>
                    <td class="text-center">
                        <?php if($n_uscite > 0) { ?>
                            <a href="uscite.php?action=list&id_socio=<?= $socio->getId() ?>" class="btn btn-xs btn-info"><i class="fa fa-archive"></i> <span class="badge"><?= $n_uscite ?></span></a>
                        <?php } ?>
                    </td>
                    <td class="text-center"><a href="soci.php?action=edit&id=<?= $socio->getId() ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> </a></td>
                    <td class="text-center"><a href="soci.php?action=delete&id=<?= $socio->getId() ?>&socio=<?= $_REQUEST["socio"] ?>" onclick="javascript:return confirm('Vuoi veramente cancellare questo socio?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a></td>
                </tr>
                <?php } }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>