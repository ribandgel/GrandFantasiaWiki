<?php
require_once 'connect_db.php';

/** Cookie accepte */
if(isset($_COOKIE['accept_cookie'])){
    $showcookie = false;
}else{
    $showcookie = true;
}
/** Fin de Cookie Accepte */

/** Verifie Pseudo existe */
function getIfPseudoExist($pseudo){
    global $pdo;
    $query = 'SELECT COUNT(*) FROM membres WHERE pseudo = :pseudo';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchColumn();
}
/** Fin Verifie Pseudo existe */

/** Verifie Mail existe */
function getIfMailExist($email){
    global $pdo;
    $query = 'SELECT COUNT(*) FROM membres WHERE mail = :email';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':email', $email, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchColumn();
}
/** Fin Verifie mail existe */

/** CREATE MEMBRE */
function createMembre($pseudo,$password,$mail,$date_inscription){
    global $pdo;
    $query = 'INSERT INTO membres(pseudo, password, mail, img_profil, date_inscription, role) VALUE(:pseudo,:password, :mail, :img_profil, :date_inscription, :role)';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);
    $prep->bindValue(':mail', $mail, PDO::PARAM_STR);
    $prep->bindValue(':img_profil', "$pseudo.png", PDO::PARAM_STR);
    $prep->bindValue(':date_inscription', $date_inscription, PDO::PARAM_STR);
    $prep->bindValue(':role', 'U', PDO::PARAM_STR);
    $prep->execute();

}
/** FIN CREATE MEMBRE*/

/** COMMANDE DATABASE */
function allToMine(){
	global $pdo;
	$query = 'SELECT * FROM data_mine';
	return $pdo->query($query)->fetchAll();
}

function getAllinfosItembyName($item){
	global $pdo;
	$query = "SELECT * FROM data_item WHERE nom LIKE :item";
	$prep = $pdo->prepare($query);
	$prep->bindValue(':item', $item, PDO::PARAM_STR);
	$prep->execute();
	return $prep->fetchAll();
}

?>
