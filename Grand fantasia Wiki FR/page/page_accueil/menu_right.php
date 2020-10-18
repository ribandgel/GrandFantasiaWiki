<div class="menu_right">
    <div class="menu_stats">
        <h2 class="title_menu">Statistiques</h2>
        <hr class="page_separator">
        <div class="stats">
            <div class="conteneur_stats"><i class="material-icons">remove_red_eye</i><span><?php echo($number_views); ?></span><p><?php if($number_views != 1 ){ echo'Vues';}else{ echo 'Vue';} ?></p></div>
        </div>
        <div class="stats">
            <div class="conteneur_stats"><i class="material-icons">group</i><span><?php echo($stats_nbr_membres); ?></span><p><?php if($stats_nbr_membres != 1 ){ echo'membres';}else{ echo 'membre';} ?></p></div>
        </div>
        <div class="stats">
            <div class="conteneur_stats"><i class="material-icons">personal_video</i><span><?php echo($user_nbr); ?></span><p><?php if($user_nbr != 1 ){ echo'Personnes en lignes';}else{ echo 'Personne en ligne';} ?></p></div>
        </div>
    </div>
    <div class="menu__links">
        <h2 class="title_menu">liens Utiles</h2>
        <hr class="page_separator">
        <div class="menu_links">
            <a href="https://www.facebook.com/grandfantasiafr/" target="_blank">
                <div class="conteneur_links">
                    <i class="fa fa-facebook-square"></i>
                    @grandfantasiafr
                </div>
            </a>
        </div>
        <div class="menu_links">
            <a href="https://fr.grandfantasia.aeriagames.com/" target="_blank">
                <div class="conteneur_links">
                    <i class="material-icons">computer</i>
                    fr.grandfantasia.aeriagames.com
                </div>
            </a>
        </div>
        <div class="menu_links">
            <a href="https://twitter.com/grandfantasiafr" target="_blank">
                <div class="conteneur_links">
                    <i class="fa fa-twitter-square"></i>
                    @GrandFantasiaFR
                </div>
            </a>
        </div>
        <!--<div class="menu_links">
            <a href="https://fr.grandfantasia.info/" target="_blank">
                <div class="conteneur_links">
                    <i class="fa fa-database"></i>
                    Grand Fantasia DATABASE
                </div>
            </a>
        </div>-->
    </div>
</div>