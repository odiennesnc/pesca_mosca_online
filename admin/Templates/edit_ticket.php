<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">

            <?php if(!isset($alert)) { ?>

            <form class="form form-horizontal" method="POST" action="ticket.php" enctype="multipart/form-data">
                <div class="section">
                    <div class="section-title">Dati richiesta</div>
                    <div class="section-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Oggetto</label>
                            <div class="col-md-9">
                                <input class="form-control" name="oggetto" placeholder="Motivo della richiesta" value="" type="text">
                            </div>
                        </div>
                   <hr />
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label">Richiesta.</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="messaggio"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-3">
                            <input type="hidden" name="action" value="send" />
                            <button type="submit" class="btn btn-primary btn-block">Invia</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    <strong>Richiesta inviata</strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>