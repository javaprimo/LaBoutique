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
	$data = mysql_fetch_array($res);
	mysql_close($con);
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Suppression d'une utilisateur</h3>
		</div>
		<div class="panel-body">
			<div class="media position-relative">
			<img src="images/warning.png" class="col col-lg-2" alt="...">
				<div class="media-body">
					<h5 class="mt-0">Attention l'utilisateur <strong>"<?php echo strtoupper($data['Nom']) . " " . $data['Prenom']; ?>"</strong> ainsi que ses données seront définitivement supprimées.</h5>
					<p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
					<a href="index.php?page=utilisateur/utilisateur_delete&idUtilisateur= <?php echo $idUtilisateur; ?>" class="btn btn-primary stretched-link">Supprimer</a>
					<a href="index.php?page=utilisateur/utilisateur_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</div>
	</div>
	