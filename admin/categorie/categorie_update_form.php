<?php
	if(!isset($_GET['idCategorie']))
	{
		header('location: index.php?page=categorie/categorie_list&success=2');
		return;
	}

	$idCategorie = $_GET['idCategorie'];
	
	require("dbconnexion.php");
	$r = "SELECT * FROM Categorie WHERE Id = $idCategorie";
	$res = mysql_query($r);
	$dataCategorie = mysql_fetch_array($res);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données de la categorie <?php echo strtoupper($dataCategorie['Nom']); ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=categorie/categorie_update">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputNomCategorie">Nom categorie</label>
					<input type="text" class="form-control" id="inputNomCategorie" name="inputNomCategorie" value="<?php echo $dataCategorie['Nom']; ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDescriptionCategorie">Nom categorie</label>
					<input type="text" class="form-control" id="inputDescriptionCategorie" name="inputDescriptionCategorie" value="<?php echo $dataCategorie['Description']; ?>" />
				</div>
				<input type="hidden" name="idCategorie" value=<?php echo $dataCategorie['Id']; ?> />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=categorie/service_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
