<?php
require_once 'connect_db.php';
/**
 * Compteur Online
 */
$temps_session = 15;
$temps_actuel = date("U");
$ip_user = $_SERVER['REMOTE_ADDR'];

$req_ip_exist = $pdo->prepare('SELECT * FROM online WHERE user_ip = ?');
$req_ip_exist->execute(array($ip_user));
$ip_existe = $req_ip_exist->rowCount();

if($ip_existe == 0){
    $add_ip = $pdo->prepare('INSERT INTO online(user_ip,time) VALUES(?,?)');
    $add_ip->execute(array($ip_user,$temps_actuel));
}else{
    $update_ip = $pdo->prepare('UPDATE online SET time = ? WHERE user_ip = ?');
    $update_ip->execute(array($temps_actuel,$ip_user));
}

$session_delete_time = $temps_actuel - $temps_session;
$del_ip = $pdo->prepare('DELETE FROM online WHERE time < ?');
$del_ip->execute(array($session_delete_time));

$show_user_nbr = $pdo->query('SELECT * FROM online');
$user_nbr = $show_user_nbr->rowCount();
/**
 * Fin Compteur Online
 */

/**
 * Compteur de visite
 */
$user_ip = $_SERVER['REMOTE_ADDR'];

$if_ip_existe = $pdo->prepare('SELECT * FROM viewer_site WHERE user_ip = ?');
$if_ip_existe->execute(array($user_ip));
$view_existe = $if_ip_existe->rowCount();

if($view_existe == 0){
    $add_ip1= $pdo->prepare('INSERT INTO viewer_site(user_ip) VALUES(?)');
    $add_ip1->execute(array($user_ip));
}

$view_user_nbr = $pdo->query('SELECT * FROM viewer_site');
$number_views = $view_user_nbr->rowCount();
/**
 * Fin Compteur de visite
 */

/**
 * Compteur de membres
 */
$nbr_membre = $pdo->query('SELECT * FROM membres');
$stats_nbr_membres = $nbr_membre->rowCount();
/**
 * Fin Compteur de membres
*/
?>
