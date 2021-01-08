<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-3"><p style="line-height: 25px;"><?= $title ?></p></div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="card-body no-padding">

            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th> # </th>
                    <th>Cognome</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th class="text-center">Vedi</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_soci->getIterator()->count() > 0) {
                    foreach ($lista_soci as $socio) {
                ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="form-control" name="iscritto_id" />
                    </td>
                    <td><?= $socio->getCognome() ?></td>
                    <td><?= $socio->getNome() ?></td>
                    <td><?= $socio->getEmail() ?></td>
                    <td><?= $socio->getTelefono() ?></td>
                    <td class="text-center"><a href="soci_2019.php?action=edit&id=<?= $socio->getId() ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> </a></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>