<!DOCTYPE html>
<html>
<?php
include('inc/head.php');
?>
<body>
<?php
require_once ('./inc/header.php');
?>
    <div id="web_page">
        <div class="in_page">
            <div class="page_accueil">
                <div class="page_left">
                    <h1 class="title_page">Accueil</h1>
                    <hr class="page_separator">
                    <div class="article" id="article" name="article">
                        <?php
                        $text = file_get_contents('./articles/page_accueil/article_1.txt');
                        echo $text;
                        ?>
                        <form method="POST" action="">
                            <textarea id="text_article" name="text_article"><?php echo($text);?></textarea>
                            <button id="save" name="save">save</button>
                        </form>
                        <?php
                        if(isset($_POST['save'])){
                            $article = htmlspecialchars($_POST['text_article']);
							echo($article);
                        }
                        ?>
                    </div>
                </div>
                <?php
                require_once ('./page/page_accueil/menu_right.php');
                ?>
            </div>
        </div>
    </div>
<?php
require_once('./inc/footer.php');
?>
    <script>
        setInterval('load_stats()', 5000);
        function load_stats(){
            $('.reload').load('./php/stats.php');
        }
    </script>
</body>
</html>
<!--
<nav class="menu_in_page">
</nav>
<div class="page_in">
    BONJOUR !
</div>-->