<!DOCTYPE html>
<html>
<?php
include('inc/head.php');
?>
<body>
<?php
require_once ('./inc/header.php');
if(isset($_POST['submit_data']) && isset($_POST['cherche_data'])){
	if(!empty($_POST['submit_data']) && !empty($_POST['cherche_data'])){
		$objet_chercher = '%'.$_POST['cherche_data'].'%';
		$recherche = getAllinfosItembyName($objet_chercher);
	}
}
?>
    <div id="web_page">
		<div class="in_page">
			<div class="page_no_spe">
				<?php
				require_once("./menu_left.php");
				?>
				<div class="page_right">
					<h1 class="title_page">Rechercher un objet dans la database</h1>
					<hr class="page_separator">
					<div class="box">
						<form class="cherche_form" method="POST" action="">
							<input type="text" name="cherche_data" placeholder="Rechercher un objet..." value="<?php if(isset($_POST['cherche_data'])){if($_POST['cherche_data'] != " "){echo($_POST['cherche_data']);}} ?>">
							<input type="submit" name="submit_data" value="Cherchez">
						</form>
					</div>
					<?php
					if(isset($_POST['cherche_data'])){
						if($_POST['cherche_data'] != ""){
							if(!empty($recherche)){
					?>
						<div id="result_data">
						<?php
						//var_dump($recherche);
						foreach($recherche as $données){
							$nom_item = $données->nom;
							$num_item = $données->num_img;
							$type_item = $données->type_item;
							$color_item = $données->color;
							$type_card = $données->type_card;
							$description_card = $données->description_card;
							$contient_item = $données->contient_item;
							?>
							<a href="./data_gf/<?php echo($type_item); ?>/<?php echo($num_item); ?>.png"  class="item">
							<img src="./data_gf/<?php echo($type_item); ?>/<?php echo($num_item); ?>.png" title="<?php echo($nom_item); ?>">
							<p class="<?php echo($color_item); ?>"><?php echo($nom_item); ?></p>
							<span class="etiquette_item">
								<p class="title_card <?php echo($color_item); ?>"><?php echo($nom_item); ?> - Niv 100</p>
								<p class="type_card"><?php echo($type_card); ?></p>
								<p class="description_card"><?php echo($description_card); ?></p>
								<?php if($contient_item == "oui"){ echo("<p style='font-size: 10px;color: red;'>Cet item contient des objets</p>");}?>
							</span>
							</a>
							<?php
						}
						?>
						</div>
					<?php
							}else{
								echo("<h1 style='text-align: center;border: 2px solid;border-radius: 5px;padding: 5px;background: brown;'><span style='color: #e03e2d;'>Aucun objet correspond à la recherche !</span></h1>");
							}							
						}else{
							echo("<h1 style='text-align: center;border: 2px solid;border-radius: 5px;padding: 5px;background: brown;'><span style='color: #e03e2d;'>Veuillez rechercher un objets correcte !</span></h1>");
						}
					}else{
						echo("<h1 style='text-align: center;border: 2px solid;border-radius: 5px;padding: 5px;background: brown;'><span style='color: #e03e2d;'>Faites une recherche !</span></h1>");
					}					
					?>
				</div>
			</div>
		</div>
	</div>
<?php
require_once('./inc/footer.php');
?>
</body>
</html>