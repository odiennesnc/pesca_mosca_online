$(document).ready(function () {

    $(document).on('click', '#singola', function(event) {
        $('#myModal .modal-title').html("Richiesta permesso giornaliero &euro; 10,00");
        // $( ":button" ).removeClass( "stripe-button-el" );
        // $( ":button" ).addClass( "btn btn-danger btn-sm");
        // $( ":button span" ).css("min-height", 0);
        // var carta = '<i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;';
        // $(":button span").html(carta + " " + "Paga con carta");
        $.get('crea_modulo_singola.php', function(data){
            $('#myModal .modal-body').html(data);
        });
        return false
    });

    // $(document).delegate('#vai', 'click', function() {
    //     $("#form_singola").validate({
    //     errorPlacement: function(error, element) {
    //         error.appendTo( element.parent() );
    //     },
    //     submitHandler : function(form) {
    //         $.post('piazza_ordine.php', $(form).serialize(), function(data)
    //         {
    //             $('#myModal .modal-body').html(data)
    //         });
    //         return false;
    //     }
    // });
    // });

    $(document).delegate('#vai_pagamento', 'click', function() {
        $.post('pagamento.php', $('#form_pagamento').serialize(), function(data)
        {
            $('#myModal .modal-body').html(data)
        });
        return false;
    });

});