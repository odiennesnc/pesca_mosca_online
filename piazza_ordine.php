<?php $importo = 1000; ?>
<form action="risposta.php" method="POST">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_woN7MdaimC2BCmhjvetkqALt"
        data-amount="<?= $importo ?>"
        data-name="Mosca Club Siena"
        data-description="Permesso giornaliero"
        data-image="http://moscaclubsiena.it/img/logo.jpg"
        data-locale="it"
        data-label="Paga con carta"
        data-email="gabriele@odienne.it"
        data-currency="eur"
        data-allow-remember-me="false"
        data-zip-code="false">
    </script>
</form>