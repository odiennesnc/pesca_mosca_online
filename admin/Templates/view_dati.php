<div class="row">
    <div class="col-xs-12">
    <div class="card" style="min-height: 400px;">
    <div class="card-header">Area riservata | Enotecalevolte.com</div>
        <div class="card-body">
            <address>
                <strong><?= $anagrafica["ragione_sociale"] ?></strong><br>
                <?= $anagrafica["indirizzo"] ?><br>
                <?= $anagrafica["cap"] ?> - <?= $anagrafica["citta"] ?><br>
                <abbr title="PIVA">PIVA:</abbr> <?= $anagrafica["piva"] ?>
            </address>

            <address>
                <strong>E-mail</strong><br>
                <a href="mailto:#"><?= $anagrafica["email"] ?></a>
            </address>
        </div>
    </div>
    </div>
</div>