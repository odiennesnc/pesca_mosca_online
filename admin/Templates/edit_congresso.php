<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="congressi.php" enctype="multipart/form-data">
                <div class="section">
                    <div class="section-title">Dati congresso</div>
                    <div class="section-body">
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="col-md-3 control-label">Tipologia modulo</label>
                                    <div class="col-md-9">
                                        <select name="tipo" class="form-control">
                                            <?php foreach($array_tipologia as $chiave => $valore) { ?>
                                                <option value="<?= $chiave ?>" <?= ($chiave == $congresso->getTipo()) ? " selected" : "" ?>><?= $valore ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Prefisso url congresso es. triregionale</label>
                            <div class="col-md-9">
                                <input class="form-control" name="slug" placeholder="triregionale" value="<?= $congresso->getSlug() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">URL Web</label>
                            <div class="col-md-9">
                                <input class="form-control" name="url" placeholder="https://triregionalesin.sienacongress.it/" value="<?= $congresso->getUrl() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Data chiusura iscrizioni</label>
                            <div class="col-md-9">
                                <input class="form-control datepicker" name="data_chiusura_iscrizioni" placeholder="" value="<?= ($congresso->getDataChiusuraIscrizioni() != NULL AND $congresso->getDataChiusuraIscrizioni()!='01-01-1970') ? $congresso->getDataChiusuraIscrizioni() : "" ?>" date-format="dd-mm-YYYY" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Titolo</label>
                            <div class="col-md-9">
                                <input class="form-control" name="titolo" placeholder="" value="<?= $congresso->getTitolo() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Località</label>
                            <div class="col-md-9">
                                <input class="form-control" name="localita" placeholder="" value="<?= $congresso->getLocalita() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Città</label>
                            <div class="col-md-9">
                                <input class="form-control" name="citta" placeholder="" value="<?= $congresso->getCitta() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Indirizzo</label>
                            <div class="col-md-9">
                                <input class="form-control" name="indirizzo" placeholder="" value="<?= $congresso->getIndirizzo() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">CAP</label>
                            <div class="col-md-9">
                                <input class="form-control" name="cap" placeholder="" value="<?= $congresso->getCap() ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label">Codice Mappa Google</label>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control" name="mappa" rows="10"><?= htmlentities($congresso->getMappa()) ?></textarea>
                            </div>
                            <div class="col-md-5" style="">
                                <div class="embed-responsive embed-responsive-16by9">
                                <?= $congresso->getMappa() ?>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label class="col-md-3 control-label">Data inizio</label>
                            <div class="col-md-9">
                                <input class="form-control datepicker" name="inizio" placeholder="" value="<?= ($congresso->getInizio() != NULL AND $congresso->getInizio()!='01-01-1970') ? $congresso->getInizio() : "" ?>" date-format="dd-mm-YYYY" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Data fine</label>
                            <div class="col-md-9">
                                <input class="form-control datepicker" name="fine" placeholder="" value="<?= ($congresso->getFine() != NULL AND $congresso->getFine()!='01-01-1970') ? $congresso->getFine() : "" ?>" date-format="dd-mm-YYYY" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Crediti ECM ottenuti</label>
                            <div class="col-md-9">
                                <input class="form-control" name="crediti_ecm" placeholder="" value="<?= $congresso->getCreditiEcm() ?>" type="text">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label">Obiettivo formativo</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="obiettivo_formativo"><?= $congresso->getObiettivoFormativo() ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />

                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label">Descrizione</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control ckeditor" name="descrizione"><?= $congresso->getDescrizione() ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                            <input class="form-control" type="file" id="upload" name="foto">
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <?php if($congresso->getFoto() !="") { ?>
                                        <img src="../media/congressi/<?= $congresso->getFoto() ?>" style="width: 75px; height: auto;"/>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-2 text-left">
                                        <div class="checkbox checkbox-inline">
                                            <input type="checkbox" id="radio10" name="rem_img" value="s">
                                            <label for="radio10">
                                                Rimuovi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />

                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label">Testo quota comprende</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control ckeditor" name="testo_quota"><?= $congresso->getTestoQuota() ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />

                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label">Testo risposta iscrizione</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control ckeditor" name="testo_mail"><?= $congresso->getTestoMail() ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">Links correlati al congresso</div>
                            </div>
                        </div>
                        <?php
                        $c = 0;
                        if(sizeof($congresso->lista_links) > 0) { ?>
                            <div class="row well">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Titolo</th>
                                            <th>Link</th>
                                            <th>El.</th>
                                        </tr>
                                        <?php
                                        foreach ($congresso->lista_links as $link) { ?>
                                            <tr class="link_<?= $link->getId() ?>">
                                                <td><?= $link->getTitolo() ?></td>
                                                <td><?= $link->getLink() ?></td>
                                                <td><a href="#" class="btn btn-xs btn-danger elimina_link" rel="<?= $link->getId() ?>"><i class="fa fa-trash"></i> El.</a></td>
                                            </tr>
                                            <?php $c++; } ?>
                                    </table>
                                </div>

                            </div>
                        <?php } ?>
                        <div class="row" id="links" style="margin-top: 25px;">
                            <div class="col-md-10 riga_<?= $c ?>">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Link</label>
                                    <div class="col-md-3">
                                        <input class="form-control" name="links[<?= $c ?>][titolo]" placeholder="titolo" type="text">
                                    </div>
                                    <div class="col-md-7">
                                        <input class="form-control" name="links[<?= $c ?>][link]" placeholder="link" aria-label="link" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 riga_<?= $c ?>" style="line-height: 40px">
                                <a href="#" class="add_link" rel="<?= $c ?>"><span class="fa fa-plus" aria-hidden="true"></span> Add</a>
                            </div>
                            <div class="col-md-1 riga_<?= $c ?>" style="line-height: 40px">
                                <a href="#" class="rem_link" rel="<?= $c ?>"><span class="fa fa-minus" aria-hidden="true"></span> Del</a>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 50px">
                            <div class="col-md-12">
                                <div class="section-title">Files allegati congresso</div>
                            </div>
                        </div>
                        <?php
                        $c = 0;
                        if(sizeof($congresso->lista_allegati) > 0) { ?>
                            <div class="row well">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Titolo</th>
                                            <th>Link</th>
                                            <th>El.</th>
                                        </tr>
                                        <?php
                                        foreach ($congresso->lista_allegati as $allegato) { ?>
                                            <tr class="allegato_<?= $allegato->getId() ?>">
                                                <td><?= $allegato->getTitolo() ?></td>
                                                <td><?= $allegato->getAllegato() ?></td>
                                                <td><a href="#" class="btn btn-xs btn-danger elimina_allegato" rel="<?= $allegato->getId() ?>"><i class="fa fa-trash"></i> El.</a></td>
                                            </tr>
                                            <?php $c++; } ?>
                                    </table>
                                </div>

                            </div>
                        <?php } ?>
                        <div class="row" id="allegati" style="margin-top: 25px;">
                            <div class="col-md-10 all_0">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Allegato</label>
                                    <div class="col-md-3">
                                        <input class="form-control" name="titoli_allegati[]" placeholder="titolo" type="text">
                                    </div>
                                    <div class="col-md-7">
                                        <input class="form-control" name="files[]" placeholder="allegato" aria-label="allegato" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 all_0" style="line-height: 40px">
                                <a href="#" class="add_all" rel="0"><span class="fa fa-plus" aria-hidden="true"></span> Add</a>
                            </div>
                            <div class="col-md-1 all_0" style="line-height: 40px">
                                <a href="#" class="rem_all" rel="0"><span class="fa fa-minus" aria-hidden="true"></span> Del</a>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 50px">
                            <div class="col-md-12">
                                <div class="section-title">Quote iscrizione congresso</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="col-md-3 control-label">Tipologia quota iscrizione</label>
                                    <div class="col-md-4">
                                        <select name="tipo_quota" class="form-control">
                                                <option value="s" <?= ($congresso->getTipoQuota() == "s") ? " selected" : "" ?>>SINGOLA</option>
                                                <option value="d" <?= ($congresso->getTipoQuota() == "d") ? " selected" : "" ?>>DOPPIA</option>
                                                <option value="t" <?= ($congresso->getTipoQuota() == "t") ? " selected" : "" ?>>TRIPLA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Et. 1</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="etichetta1" placeholder="es. fino al ..." value="<?= $congresso->getEtichetta1() ?>" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Et. 2</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="etichetta2" placeholder="es. dopo il ..." value="<?= $congresso->getEtichetta2() ?>" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Et. 3</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="etichetta3" placeholder="es. dopo il ..." value="<?= $congresso->getEtichetta3() ?>" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $c = 0;
                        if(sizeof($congresso->lista_quote) > 0) { ?>
                            <div class="row well">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Tipologia</th>
                                            <th class="text-center">Prezzo <?= $congresso->getEtichetta1() ?></th>
                                            <th class="text-center">Prezzo <?= $congresso->getEtichetta2() ?></th>
                                            <th class="text-center">Prezzo <?= $congresso->getEtichetta3() ?></th>
                                            <th>El.</th>
                                        </tr>
                                        <?php
                                        foreach ($congresso->lista_quote as $quota) { ?>
                                            <tr class="quota_<?= $quota->getId() ?>">
                                                <td><?= $quota->getTipologia() ?></td>
                                                <td class="text-center"><?= $quota->getPrezzo() ?></td>
                                                <td class="text-center"><?= $quota->getPrezzo1() ?></td>
                                                <td class="text-center"><?= $quota->getPrezzo2() ?></td>
                                                <td><a href="#" class="btn btn-xs btn-danger elimina_quota" rel="<?= $quota->getId() ?>"><i class="fa fa-trash"></i> El.</a></td>
                                            </tr>
                                            <?php $c++; } ?>
                                    </table>
                                </div>

                            </div>
                        <?php } ?>
                        <div class="row" id="quote" style="margin-top: 25px;">
                            <div class="col-md-10 all_0">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Quota iscrizione</label>
                                    <div class="col-md-3">
                                        <input class="form-control" name="tipologia_quota[]" placeholder="tipologia quota" type="text">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" name="prezzo_quota[]" placeholder="quota" type="text">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" name="prezzo_quota1[]" placeholder="quota 1" type="text">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" name="prezzo_quota2[]" placeholder="quota 2" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 quo_0" style="line-height: 40px">
                                <a href="#" class="add_quo" rel="0"><span class="fa fa-plus" aria-hidden="true"></span> Add</a>
                            </div>
                            <div class="col-md-1 all_0" style="line-height: 40px">
                                <a href="#" class="rem_quo" rel="0"><span class="fa fa-minus" aria-hidden="true"></span> Del</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            <input type="hidden" name="action" value="write" />
                            <input type="hidden" name="foto" value="<?= $congresso->getFoto() ?>" />
                            <?php if($_REQUEST["id"]) { ?>
                                    <input type="hidden" name="id" value="<?= $congresso->getId() ?>" />
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