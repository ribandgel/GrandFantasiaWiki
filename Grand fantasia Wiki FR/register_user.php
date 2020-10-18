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
    <?php
    if (isset($_POST['register'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp1 = htmlspecialchars($_POST['mdp1']);
        $mdp2 = htmlspecialchars($_POST['mdp2']);
        $mail1 = htmlspecialchars($_POST['mail1']);
        $mail2 = htmlspecialchars($_POST['mail2']);

        if(!empty($_POST['pseudo']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2']) && !empty($_POST['mail1']) && !empty($_POST['mail2'])){
            $pseudolenght = strlen($pseudo);
            $mdp1lenght = strlen($mdp1);
            $mail_existe = getIfMailExist($mail1);
            $pseudo_existe = getIfPseudoExist($pseudo);

            if($pseudolenght <= 20){
                if($pseudo_existe == 0){
                    if($mdp1lenght >= 10 && $mdp1lenght <= 30){
                        if(filter_var($mail1, FILTER_VALIDATE_EMAIL)) {
                            if ($mail_existe == 0) {
                                if ($mdp1 == $mdp2) {
                                    if ($mail1 == $mail2) {
                                        $sha1_mdp1 = sha1($mdp1);
                                        $sha1_mdp2 = sha1($mdp2);
                                        $date_inscription = date('d M Y');
                                        $inscription = createMembre($pseudo, $mdp1,$mail1,$date_inscription);
                                    } else {
                                        $erreur = "Vos adresses mail doivent être identique !";
                                    }
                                } else {
                                    $erreur = "Les mots de passes doivent être identique !";
                                }
                            } else {
                                $erreur = "Un compte existe déjà avec cette adresse mail.";
                            }
                        }else{
                            $erreur = "adresse mail non valide !";
                        }
                    }else{
                        $erreur = "Votre Mot de passe doit faire entre 10 et 30 caractères !";
                    }
                }else{
                    $erreur = "le pseudo <strong style='font-style: italic'>$pseudo</strong> n'est pas disponible !";
                }
            }else{
                $erreur = "Votre Pseudo ne doit pas dépasser 20 caractères !";
            }
        }else {
            $erreur = "Tout les champs doivent être complétés !";
        }
    }
    ?>
    <div class="container">
        <img src="img/logo_site.png">
        <div class="row100">
            <form method="post" action="">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo($pseudo);}?>" required="">
                        <span class="text">Pseudo</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="password" name="mdp1" value="<?php if(isset($mdp1)){echo($mdp1);}?>" required="">
                        <span class="text">Mot de passe</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="password" name="mdp2" value="<?php if(isset($mdp2)){echo($mdp2);}?>" required="">
                        <span class="text">Confirmation mot de passe</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="mail1" value="<?php if(isset($mail1)){echo($mail1);}?>" required="">
                        <span class="text">Email</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="mail2" value="<?php if(isset($mail2)){echo($mail2);}?>" required="">
                        <span class="text">Connfirmer email</span>
                        <span class="line"></span>
                    </div>
                </div>
                <?php
                if(isset($_POST['register'])){
                    if(isset($erreur)){
                        ?>
                        <p style="margin-bottom: 0px;color: red"><?php echo($erreur);?></p>
                        <?php
                    }else{
                        ?>
                        <p style="margin-bottom: 0px;color: green">Féliciation ! ton compte à bien été crée</p>
                        <?php
                    }
                }
                ?>
                <div class="row100">
                    <div class="col button_connect">
                        <input type="submit" name="register" value="S'enregistrer">
                    </div>
                </div>
            </form>
            <hr class="page_separator_connect">
            <div class="row100">
                <p>J'ai déjà un compte</p>
                <div class="col_register">
                    <a href="connect_user.php" class="but_register_connect">se connecter</a>
                </div>
            </div>
            <div class="row100">
                <div class="col">
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
