<!DOCTYPE html>
<html>
<head>
    <title>Area Riservata | Mosca Club Siena</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

  <!-- Theme -->
<!--  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">-->
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
<!--  <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">-->
<!--  <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">-->
<!--    <link href="assets/css/select/select2.min.css" rel="stylesheet">-->
<!--    <link href="assets/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">-->
    <? if(file_exists('assets/css/' . $body)) include 'assets/css/' . $body; ?>
</head>
<body>
  <div class="app app-default">

<?php include 'menu_lat.php'; ?>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

<?php include 'top_nav.php'; ?>

<!--  <div class="btn-floating" id="help-actions">-->
<!--  <div class="btn-bg"></div>-->
<!--  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">-->
<!--    <i class="icon fa fa-plus"></i>-->
<!--    <span class="help-text">Shortcut</span>-->
<!--  </button>-->
<!--  <div class="toggle-content">-->
<!--    <ul class="actions">-->
<!--      <li><a href="http://www.odienne.it" target="_blank">www.odienne.it</a></li>-->
<!--      <li><a href="http://blog.odienne.it" target="_blank">blog.odienne.it</a></li>-->
<!--      <li><a href="http://sms.odienne.it" target="_blank">sms.odienne.it</a></li>-->
<!--    </ul>-->
<!--  </div>-->
<!--</div>-->

    <?php include $body; ?>

  <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © <?= date("Y") ?> O(n)
      </div>
    </div>
  </div>
</footer>
</div>

  </div>
  
  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>
  <script src="./assets/js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="./assets/js/select2/select2.full.js"></script>
  <? if(file_exists('assets/js/' . $body)) include 'assets/js/' . $body; ?>
  <script type="text/javascript">
      $(document).ready(function(){

          $( ":button" ).removeClass( "stripe-button-el" );
          $( ":button" ).addClass( "btn btn-danger btn-sm");
          $( ":button span" ).css("min-height", 0);
          var carta = '<i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;';
          $(":button span").html(carta + " " + "Paga con carta");

          $(".select_anagrafica").select2();
      });
</script>
</body>
</html>