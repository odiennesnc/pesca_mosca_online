    <script type="text/javascript">
$(document).ready(function(){  

  $('.gabbe').click(function(){
$.get("richiesta.php", {id:$(this).attr("id")},
function(data) {
          $("#myModal .modal-content").html(data);

          $('#myModal').modal('show')
});
    });
    
    });    
</script> 