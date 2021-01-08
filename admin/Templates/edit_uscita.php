<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="soci.php" enctype="multipart/form-data">
                <div class="section">
                    <div class="section-title">Dati Uscita</div>
                    <div class="section-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Socio</label>
                            <div class="col-md-9">
                                <select class="select_anagrafica" name="socio_id">
                                    <option value="">Seleziona</option>
                                    <?php
                                    if($lista_soci->getIterator()->count() > 0) {
                                        foreach($lista_soci as $socio) { ?>
                                            <option value="<?= $socio->getId() ?>" <?= ($socio->getId() == $permesso->getSocioId()) ? " selected" : "" ?>><?= $socio->getCognome() ?>   <?= $socio->getNome() ?></option>
                                        <?php } } ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Importo</label>
                            <div class="col-md-9">
                                <input class="form-control" name="importo" placeholder="Importo" id="importo" value="<?= $permesso->getImporto() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">N. Uscite rimanenti</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="uscite" id="uscite" value="<?= $permesso->getUscite() ?>" placeholder="Uscite">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Creato il</label>
                            <div class="col-md-9">
                                <input type="tex" class="form-control" id="created_at" name="created_at" value="<?= $permesso->getCreatedAt() ?>" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            <input type="hidden" name="action" value="write" />
                            <?php if($_REQUEST["id"]) { ?>
                                    <input type="hidden" name="id" value="<?= $permesso->getId() ?>" />
                              <?php }  ?>
                            <button type="submit" class="btn btn-primary btn-block">Salva</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>