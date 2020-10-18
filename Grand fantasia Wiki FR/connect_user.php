<!DOCTYPE html>
<html>
<?php
require_once('php/manager_db.php');
require_once ('inc/head.php');
?>
<body>
<?php if($showcookie) {
    echo('
        <div class="cookie-alert">
        En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies pour vous proposer des contenus et services adaptés à vos centres d’intérêts .<br /><a href = "../php/accept_cookie.php" > OK</a >
    </div>');
}
?>
    <div class="page_connect">
        <div class="container">
            <img src="img/logo_site.png">
            <div class="row100">
                <form method="post" action="">
                    <div class="col">
                        <div class="inputBox">
                            <input type="text" name="identifiant" required="required">
                            <span class="text">Email ou Pseudo</span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inputBox">
                            <input type="password" name="password" required="required">
                            <span class="text">Mot de passe</span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="row100">
                        <div class="col button_connect">
                            <input name="connect" type="submit" value="Se connecter">
                        </div>
                    </div>
					                <?php
                if(isset($_POST['connect'])){
                    if(isset($erreur)){
                        ?>
                        <p style="margin-bottom: 0px;color: red"><?php echo($erreur);?></p>
                        <?php
                    }else{
                        ?>
                        <p style="margin-bottom: 0px;color: green">connexion GOOD</p>
                        <?php
                    }
                }
                ?>
                </form>
                <hr class="page_separator_connect">
                <div class="row100">
                    <p>J'ai pas de compte !</p>
                    <div class="col_register">
                        <a href="register_user.php" class="but_register_connect">S'enregistrer</a>
                    </div>
                </div>
                <div class="row100">
                    <div class="col">
                        <div class="bas_connect_left">
                            <a href="#">Mot de passe oublié</a>
                        </div>
                        <div class="bas_connect_right">
                            <a href="index.php">Retourner à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
	$annee = date("Y");
?>
<footer style="position: absolute; bottom: 0;">
<div class="bas_footer">
<p>Grand Fantasia Wiki | <?php echo($annee); ?> © Tous droits réservés. Une partie des images présente sur le site sont la propriété <a target="_blank" href="http://corporate.aeriagames.com/" title="En savoir plus sur Aerie Games ©."><span style="text-decoration: underline">© <?php echo($annee); ?> Aeria Games GmbH</span></a></p>
</div>
</footer>
</body>
</html>
