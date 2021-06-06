<?php
	if(!isset($_GET['idProduit']))
	{
		header('location: index.php?page=produit/produit_list&success=2');
		exit();
	}

	$idProduit = $_GET['idProduit'];

	require("../dbconnexion.php");
	$req = "SELECT * FROM Produit WHERE Id = $idProduit";
	$res = mysql_query($req);
	$data = mysql_fetch_array($res);
	mysql_close($con);
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Suppression d'un produit</h3>
		</div>
		<div class="panel-body">
			<div class="media position-relative">
			<img src="images/warning.png" class="col col-lg-2" alt="...">
				<div class="media-body">
					<h5 class="mt-0">Attention le produit <strong>"#<?php echo $data['Id'] . ' - ' . $data['Libelle'] ?>"</strong> ainsi que ses données seront définitivement supprimées.</h5>
					<p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
					<a href="index.php?page=produit/produit_delete&idProduit= <?php echo $idProduit; ?>" class="btn btn-primary stretched-link">Supprimer</a>
					<a href="index.php?page=produit/produit_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</div>
	</div>
	