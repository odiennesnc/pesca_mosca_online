<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="/"><span class="highlight">MoscaClub</span></a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="active">
                <a href="index.php">
                    <div class="icon">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="title">Dashboard</div>
                </a>
            </li>
            <?php if($_SESSION["ruolo"] != 2) { ?>
            <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="icon">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                    </div>
                    <div class="title">Pagine</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Contenuti</li>
                        <li><a href="soci.php?socio=s">Gestisci Soci</a></li>
                        <li><a href="soci_2019.php?socio=s">Gestisci Soci 2019</a></li>
                        <li><a href="soci.php?socio=n">Pescatori non Soci</a></li>
                        <li><a href="permessi.php">Gestisci Permessi</a></li>
                        <li><a href="uscite.php">Gestisci Uscite</a></li>
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="icon">
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                    </div>
                    <div class="title">Assistenza</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Assistenza</li>
                        <li><a href="ticket.php">Inviaci una richiesta</a></li>
                        <li class="line"></li>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> O(n)</li>
                        <li><strong>Tel.</strong>: 0577 378877</li>
                        <li><strong>E-mail</strong>: info@odienne.it</li>
<!--                        <li><a href="http://sms.odienne.it" target="_blank">SMS O(n)</a></li>-->
                    </ul>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class="sidebar-footer">
<!--        <ul class="menu">-->
<!--            <li>-->
<!--                <a href="/" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                    <i class="fa fa-cogs" aria-hidden="true"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>-->
<!--        </ul>-->
    </div>
</aside>