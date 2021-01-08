<div class="row">
    <div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="col-md-3"><p style="line-height: 25px;"><?= $title ?></p></div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="card-body no-padding">

            <?php if($ultime_richieste->getIterator()->count() != 0) { ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Ricevuta il</th>
                        <th>Email</th>
                        <th>Linguia</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach($ultime_richieste as $richiesta) {
                        ?>
                        <tr>
                            <td><?= date("d/m/Y", strtotime($richiesta->getRicevuta_il())) ?></td>
                            <td><?= $richiesta->getEmail() ?></td>
                            <td><?= $richiesta->getLingua() ?></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm gabbe" data-toggle="modal" data-target="#myModal" id="<?= $richiesta->getId() ?>"><i class="icon-pencil"></i> Dettagli</a></td>

                            <td class="text-center"><a class="btn btn-danger btn-sm" onclick="javascript:return confirm('Vuoi veramente cancellare la richiesta di: <?= $richiesta->getEmail() ?> ?')" href="richieste.php?action=delete&id=<?= $richiesta->getId() ?>"><i class="icon-trash"></i> Elimina</a></td>
                        </tr>
                    <?php } ?>
                </table>

            <?php }  else { ?>
                Nessuna richiesta presente.
            <?php } ?>


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
        </div>
    </div>
</div>
</div>