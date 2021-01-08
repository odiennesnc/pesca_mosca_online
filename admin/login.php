<?php
include 'config.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Area riservata Odienne snc</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">

</head>
<body>
<div class="app app-default">
    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-header"></div>
            <div class="app-body">

                <div class="loader-container text-center">
                    <div class="icon">
                        <div class="sk-folding-cube">
                            <div class="sk-cube1 sk-cube"></div>
                            <div class="sk-cube2 sk-cube"></div>
                            <div class="sk-cube4 sk-cube"></div>
                            <div class="sk-cube3 sk-cube"></div>
                        </div>
                    </div>
                    <div class="title">
                        Login ....
                    </div>
                </div>
                <div class="app-block">
                    <div class="app-form">
                        <div class="form-header">
                            <div class="app-brand"><span class="highlight">Admin</span> MoscaClub Siena</div>
                        </div>
                        <?php if($_SESSION["error"] === true) { ?>
                            <p class="bg-danger" style="padding: 15px; color:#990000; font-size: 18px;"> <i class="fa fa-ban" aria-hidden="true"></i> Username o password errati!</p>
                        <?php } ?>
                        <form name="accedi" action="index.php" method="POST">
                            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" placeholder="User" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" password="password" name="password" placeholder="Password" aria-describedby="basic-addon2">
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="action" value="login" />
                                <!--                <input type="submit" class="btn btn-success btn-submit" value="Login">-->
                                <button type="submit" class="btn btn-success btn-submit">Login</button>
                            </div>
                        </form>

                        <!--        <div class="form-line">-->
                        <!--          <div class="title">OR</div>-->
                        <!--        </div>-->
                        <!--        <div class="form-footer">-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-6 col-xs-12">-->
                        <!--                <a href="smarrito.php">Smarrito la password?</a>-->
                        <!--            </div>-->
                        <!--            <div class="col-md-6 col-xs-12">-->
                        <!--                <a href="registrati.php">Registrati</a>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        </div>-->
                    </div>
                </div>
            </div>
            <div class="app-footer">
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="assets/js/vendor.js"></script>
<!--  <script type="text/javascript" src="assets/js/app.js"></script>-->

</body>
</html>