<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-8"><p style="line-height: 25px;"><?= $title ?></p></div>
        </div>
        <div class="card-body no-padding">
            <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th> # </th>
                    <th>Cognome</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cellulare</th>
                    <th>Partecipato</th>
                    <th class="text-center">Dettagli</th>
                    <th class="text-center">El.</th>
                </tr>
                </thead>
                <tbody>
                <?php if($lista_iscritti->getIterator()->count() > 0) {
                    foreach ($lista_iscritti as $iscritto) {
                ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="form-control" name="iscritto_id" />
                    </td>
                    <td><?= $iscritto->getCognome() ?></td>
                    <td><?= $iscritto->getNome() ?></td>
                    <td><?= $iscritto->getEmail() ?></td>
                    <td><?= $iscritto->getCell() ?></td>
                    <td class="text-center"><?= $iscritto->getPartecipato() ?></td>
                    <td class="text-center"><a class="btn btn-primary btn-sm gabbe" data-toggle="modal" data-target="#myModal" id="<?= $iscritto->getId() ?>"><i class="icon-pencil"></i> Dettagli</a></td>
                    <td class="text-center"><a href="iscritti.php?action=delete&id=<?= $iscritto->getId() ?>&congresso_id=<?= $_GET["congresso_id"] ?>" onclick="javascript:return confirm('Vuoi veramente cancellare questo iscritto?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> El.</a></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <br /><br />
                    <a href="richieste_excel.php?congresso_id=<?= $_REQUEST["congresso_id"] ?>" target="_blank" class="btn btn-lg btn-success pull-right" style="margin-bottom: 20px">CREA FILE EXCEL</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
</div> <!-- /container -->