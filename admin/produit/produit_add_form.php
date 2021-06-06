<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajout d'un nouveau Produit</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=produit/produit_add" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputLibelle">Libelle</label>
					<input type="text" class="form-control" id="inputLibelle" name="inputLibelle" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputQuantite">Quantité</label>
					<input type="number" class="form-control" id="inputQuantite" name="inputQuantite" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputPrixInitial">Prix Initial</label>
					<input type="number" class="form-control" id="inputPrixInitial" name="inputPrixInitial" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputPrixActuel">Prix Actuel</label>
					<input type="number" class="form-control" id="inputPrixActuel" name="inputPrixActuel" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDescription">Description</label>
					<textarea class="form-control" id="inputDescription" name="inputDescription" rows="7" ></textarea>
				</div>
			</div>
			<div class="form-row">			
				<div class="form-group col-md-2">
					<label for="inputPhoto1">Photo 1</label><br/>
					<input type="file" class="form-control" id="inputPhoto1" name="inputPhoto1" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="inputPhoto2">Photo 2</label><br/>
					<input type="file" class="form-control" id="inputPhoto2" name="inputPhoto2" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputPhoto3">Photo 2</label><br/>
					<input type="file" class="form-control" id="inputPhoto3" name="inputPhoto3" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputCategorie">Categorie</label>
					<select id="inputCategorie" name="inputCategorie" class="form-control">
						<?php
						require("./dbconnexion.php");
						$reqCategorie = "SELECT * FROM Categorie ORDER BY Nom";
						$resCategorie = mysql_query($reqCategorie);
						while ($dataCategorie = mysql_fetch_array($resCategorie)) {
						?>
							<option value="<?php echo $dataCategorie['Id'];?>" >
								<?php
								echo $dataCategorie['Nom'];
								?>
							</option>
						<?php
						}
						mysql_close($con);
						?>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=produit/produit_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
