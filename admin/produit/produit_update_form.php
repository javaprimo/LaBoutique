<?php
	if(!isset($_GET['idProduit']))
	{
		header('location: index.php?page=produit/produit_list&success=2');
		return;
	}

	$idProduit = $_GET['idProduit'];
	
	require("dbconnexion.php");
	$r = "SELECT Produit.*, Categorie.Nom as NomCategorie FROM Produit INNER JOIN Categorie ON Produit.IdCategorie = Categorie.Id WHERE Produit.Id = $idProduit";
	$res = mysql_query($r);
	$dataProduit = mysql_fetch_array($res);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données du Produit <strong>#<?php echo $dataProduit['Id'] . " - " . $dataProduit['Libelle']; ?></strong></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=produit/produit_update" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputLibelle">Libelle</label>
					<input type="text" class="form-control" id="inputLibelle" name="inputLibelle" value="<?php echo $dataProduit['Libelle']; ?>" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputQuantite">Quantité</label>
					<input type="number" class="form-control" id="inputQuantite" name="inputQuantite" value="<?php echo $dataProduit['Quantite']; ?>" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputPrixInitial">Prix Initial</label>
					<input type="number" class="form-control" id="inputPrixInitial" name="inputPrixInitial" value="<?php echo $dataProduit['PrixInitial']; ?>" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputPrixActuel">Prix Actuel</label>
					<input type="number" class="form-control" id="inputPrixActuel" name="inputPrixActuel" value="<?php echo $dataProduit['PrixActuel']; ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDescription">Description</label>
					<textarea class="form-control" id="inputDescription" name="inputDescription" rows="10" ><?php echo $dataProduit['Description']; ?></textarea>
				</div>
			</div>
			<div class="form-row">			
				<div class="form-group col-md-2">
					<label for="inputPhoto1">Photo 1</label><br/>
					<img height="107" width="107" src="../img/<?php echo $dataProduit['Photo1']; ?>" alt class="product-thumb" />
					<input type="file" class="form-control" id="inputPhoto1" name="inputPhoto1" value="<?php echo $dataProduit['Photo1']; ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="inputPhoto2">Photo 2</label><br/>
					<img height="107" width="107" src="../img/<?php echo $dataProduit['Photo2']; ?>" alt class="product-thumb" />
					<input type="file" class="form-control" id="inputPhoto2" name="inputPhoto2" value="<?php echo $dataProduit['Photo2']; ?>" />
				</div>
				<div class="form-group col-md-2">
					<label for="inputPhoto3">Photo 2</label><br/>
					<img height="107" width="107" src="../img/<?php echo $dataProduit['Photo3']; ?>" alt class="product-thumb" />
					<input type="file" class="form-control" id="inputPhoto3" name="inputPhoto3" value="<?php echo $dataProduit['Photo3']; ?>" />
				</div>
				<input type="hidden" name="idProduit" value=<?php echo $dataProduit['Id']; ?> />
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
							<option value="<?php echo $dataCategorie['Id']; ?>" 
							<?php 
								if($dataCategorie['Id'] == $dataProduit['IdCategorie']){
									echo ' selected ';
								}
							?>
							>
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
