<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <div class="container"><a class="navbar-brand" href="#">FREDI</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Période</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Note de frais</a></li>
            </ul>
            <span class="navbar-text actions">
                <?php
                if(isset($_SESSION['user'])) {
                    echo '
                    <a class="btn btn-light action-button" role="button" href="mon_compte.php">Mon compte</a>
                    ';
                } else {
                    echo '
                    <a class="login" href="connexion.php">Connexion</a>
                    <a class="btn btn-light action-button" role="button" href="inscription.php">Inscription</a>
                    ';
                }
                ?>
            </span>
        </div>
    </div>
</nav>