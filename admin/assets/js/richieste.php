    <script type="text/javascript">
$(document).ready(function(){  

  $('.gabbe').click(function(){
$.get("richiesta.php", {id:$(this).attr("id")},
function(data) {
          $("#myModal .modal-content").html(data);

          $('#myModal').modal('show')
});
    });
    
$(document).delegate('.salva_invia','click',function(){

                  $.post('send_preventivo.php', $('#modulo_invio_preventivo').serialize(), function(data)
                  {
                    $('#myModal .modal-content').html(data);
                  });
                  return false;               
    });     
    
    });    
</script> 