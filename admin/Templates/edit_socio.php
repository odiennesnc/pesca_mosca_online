<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="soci.php" enctype="multipart/form-data">
                <div class="section">
                    <div class="section-title">Dati Socio</div>
                    <div class="section-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome</label>
                            <div class="col-md-9">
                                <input class="form-control" name="nome" placeholder="Nome" id="nome" value="<?= $socio->getNome() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cognome</label>
                            <div class="col-md-9">
                                <input class="form-control" name="cognome" placeholder="Cognome" id="cognome" value="<?= $socio->getCognome() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Luogo di nascita</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="luogo_nascita" id="luogo_nascita" value="<?= $socio->getLuogoNascita() ?>" placeholder="Luogo di nascita">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Data di nascita</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="data_nascita" name="data_nascita" value="<?= $socio->getDataNascitaNormale() ?>" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Codice Fiscale</label>
                            <div class="col-md-9">
                                <input class="form-control" name="codice_fiscale" placeholder="Codice Fiscale" id="codice_fiscale" value="<?= $socio->getCodiceFiscale() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Indirizzo</label>
                            <div class="col-md-9">
                                <input class="form-control" name="indirizzo" placeholder="Indirizzo" id="indirizzo" value="<?= $socio->getIndirizzo() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Città</label>
                            <div class="col-md-9">
                                <input class="form-control" name="citta" placeholder="Città" id="citta" value="<?= $socio->getCitta() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">CAP</label>
                            <div class="col-md-9">
                                <input class="form-control" name="cap" placeholder="Cap" id="cap" value="<?= $socio->getCap() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Telefono</label>
                            <div class="col-md-9">
                                <input class="form-control" name="telefono" placeholder="Indirizzo" id="telefono" value="<?= $socio->getTelefono() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">E-mail</label>
                            <div class="col-md-9">
                                <input class="form-control" name="email" placeholder="E-mail" id="email" value="<?= $socio->getEmail() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Importo pagato</label>
                            <div class="col-md-9">
                                <input class="form-control" name="importo_pagato" placeholder="Importo pagato" id="importo_pagato" value="<?= ($socio->getImportoPagato()!= "") ? $socio->getImportoPagato() : 0 ?>" type="text">
                            </div>
                        </div>
                        <?php if($socio->getId() != "") { ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Numero tessera</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="numero_tessera" id="numero_tessera" value="<?= $socio->getNumeroTessera() ?>" type="text">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            <input type="hidden" name="action" value="write" />

                            <?php if($_REQUEST["id"]) { ?>
                                    <input type="hidden" name="created_at" value="<?= $socio->getCreatedAt() ?>" />
                                    <input type="hidden" name="last_login" value="<?= $socio->getLastLogin() ?>" />
                                    <input type="hidden" name="associazione" value="<?= $socio->getAssociazione() ?>" />
                                    <input type="hidden" name="valido_fino" value="<?= $socio->getValidoFino() ?>" />
                                    <input type="hidden" name="socio" value="<?= $socio->getSocio() ?>" />
                                    <input type="hidden" name="id" value="<?= $socio->getId() ?>" />
                              <?php } else { ?>
                                <input type="hidden" name="socio" value="s" />
                                <input type="hidden" name="associazione" value="2" />
                            <?php } ?>
                            <button type="submit" class="btn btn-primary btn-block">Salva</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>