<?php
if (!isset($_SESSION['SESSION_ID'])) {
	header('location: index.php?page=login');
}

require("dbconnexion.php");
$r = "SELECT Produit.*, Categorie.Nom as NomCategorie FROM Produit INNER JOIN Categorie ON Produit.IdCategorie = Categorie.Id ORDER BY Id";
$res = mysql_query($r);

?>

<div class="col-md-6">
	<h3>Liste des produits</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="?page=produit/produit_add_form"> <img src="images/add.png" /></a></th>
				<th>Libelle</th>
				<th>Description</th>
				<th>Categorie</th>
				<th>Quantite</th>
				<th>PrixInitial</th>
				<th>PrixActuel</th>
				<th>Photo1</th>
				<th>Photo2</th>
				<th>Photo3</th>
				<th>MODIFIER</th>
				<th>SUPPRIMER</th>
			</tr>
		</thead>
		<tbody>

			<?php

			while ($data = mysql_fetch_array($res)) {
			?>
				</tr>
					<td><?php echo $data['Id']; ?></td>
					<td><?php echo substr($data['Libelle'], 0, 30) . ' ...'; ?></td>
					<td><?php echo substr($data['Description'], 0, 30) . ' ...'; ?></td>
					<td><?php echo $data['NomCategorie']; ?></td>
					<td><?php echo $data['Quantite']; ?></td>
					<td><?php echo $data['PrixInitial']; ?></td>
					<td><?php echo $data['PrixActuel']; ?></td>
					<td>
						<a href="index.php?page=produit/photo_delete&idPhoto=1&idProduit=<?php echo $data['Id']; ?>">
							<img src="images/supprimer.png" />
						</a>
						<img height="100" width="100" src="../img/<?php echo $data['Photo1']; ?>" alt class="product-thumb" />
					</td>
					<td>
						<a href="index.php?page=produit/photo_delete&idPhoto=2&idProduit=<?php echo $data['Id']; ?>">
							<img src="images/supprimer.png" />
						</a>
						<img height="100" width="100" src="../img/<?php echo $data['Photo2']; ?>" alt class="product-thumb" />
					</td>
					<td>
						<a href="index.php?page=produit/photo_delete&idPhoto=3&idProduit=<?php echo $data['Id']; ?>">
							<img src="images/supprimer.png" />
						</a>
						<img height="100" width="100" src="../img/<?php echo $data['Photo3']; ?>" alt class="product-thumb" />
					</td>
					<td><a href="?page=produit/produit_update_form&idProduit=<?php echo $data['Id']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="?page=produit/produit_delete_confirm&idProduit=<?php echo $data['Id']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>
				<div class="image-area">
			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>
