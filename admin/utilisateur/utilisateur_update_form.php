<?php
	if(!isset($_GET['idUtilisateur']))
	{
		header('location: index.php?page=utilisateur/utilisateur_list&success=2');
		return;
	}

	$idUtilisateur = $_GET['idUtilisateur'];

	require("../dbconnexion.php");
	$req = "SELECT * FROM Utilisateur WHERE Id = $idUtilisateur";
	$res = mysql_query($req);
	$dataUtilisateur = mysql_fetch_array($res);
	mysql_close($con);
?>

<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title">Mise à jour des données du Produit <strong>#<?php echo $dataUtilisateur['Id'] .' - ' . strtoupper($dataUtilisateur['Nom']). ' ' . $dataUtilisateur['Prenom']; ?></strong></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=utilisateur/utilisateur_update" >
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputNom">Nom</label>
					<input type="text" class="form-control" id="inputNom" name="inputNom" value="<?php echo $dataUtilisateur['Nom'] ?>" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputPrenom">Prénom</label>
					<input type="text" class="form-control" id="inputPrenom" name="inputPrenom" value="<?php echo $dataUtilisateur['Prenom'] ?>" />
				</div>
			</div>
			<div class="form-row">			
				<div class="form-group col-md-3">
					<label for="inputTelephone">Téléphone</label>
					<input type="text" class="form-control" id="inputTelephone" name="inputTelephone" value="<?php echo $dataUtilisateur['Telephone'] ?>" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputLogin">Login</label>
					<input type="text" class="form-control" id="inputLogin" name="inputLogin" value="<?php echo $dataUtilisateur['Login'] ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputAdresse">Adresse</label>
					<input type="text" class="form-control" id="inputAdresse" name="inputAdresse" value="<?php echo $dataUtilisateur['Adresse'] ?>" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputVille">Ville</label><br/>
					<input type="text" class="form-control" id="inputVille" name="inputVille" value="<?php echo $dataUtilisateur['Ville'] ?>" />
				</div>
				<input type="hidden" name="idUtilisateur" value=<?php echo $dataUtilisateur['Id']; ?> />
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=produit/produit_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
