<?php
require_once('./php/manager_db.php');
require_once('./php/stats.php');
?>
    <?php if($showcookie) {
        echo('
        <div class="cookie-alert">
        En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies pour vous proposer des contenus et services adaptés à vos centres d’intérêts .<br /><a href = "./php/accept_cookie.php" > OK</a >
    </div>');
    }
    ?>
    <header>
        <a class="logo" href="./"><img class="logo" src="img/logo_site.png" alt="logo"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="./">Accueil</a></li>
                <li><a href="./database.php">Database</a></li>
                <!--<li><a href="#">Projects</a></li>
                <li><a href="#">About</a></li>-->
            </ul>
        </nav>
        <a class="but_connect" href="./connect_user.php"><button>Se connecter</button></a>
        <a class="but_register" href="./register_user.php"><button>S'enregistrer</button></a>
    </header>
