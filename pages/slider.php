<div class="slider-area">
	<div class="block-slider block-slider4">
		<ul class="" id="bxslider-home4">
			<?php
				require("./dbconnexion.php");
				$r = "SELECT * FROM produit WHERE Photo1 like '%slider%' ORDER BY (PrixInitial - PrixActuel) DESC LIMIT 3";
				$res = mysql_query($r);
				while ($data = mysql_fetch_array($res)) {
            ?>
				<li>
					<img src="img/<?php echo $data['Photo1']; ?>" alt="Slide" width="30%" height="30%" >
					<div class="caption-group">
						<h3 class="caption title">
							<span class="primary"><strong><?php echo html_entity_decode(substr($data['Libelle'], 0, 21), ENT_COMPAT, 'UTF-8') . ' ...';  ?></strong></span>
						</h3>
						<h6 class="caption subtitle"><?php echo html_entity_decode(substr($data['Description'], 0, 47), ENT_COMPAT, 'UTF-8') . ' ...'; ?></h6>
						<a class="caption button-radius" href="index.php?page=produit&idProduit=<?php echo $data['Id']; ?>"><span class="icon"></span>Acheter maintenant ...</a>
					</div>
				</li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
