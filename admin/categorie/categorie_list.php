<?php
if (!isset($_SESSION['SESSION_ID'])) {
	header('location: index.php?page=login');
}

require("dbconnexion.php");
$r = "SELECT * FROM categorie ORDER BY Nom";
$res = mysql_query($r);

?>

<div class="col-md-6">
	<h3>Liste des catégories</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="?page=categorie/categorie_add_form"> <img src="images/add.png" /></a></th>
				<th>Nom</th>
				<th>Description</th>
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
					<td><?php echo strtoupper($data['Nom']); ?></td>
					<td><?php echo $data['Description']; ?></td>
					<td><a href="?page=categorie/categorie_update_form&idCategorie=<?php echo $data['Id']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="?page=categorie/categorie_delete_confirm&idCategorie=<?php echo $data['Id']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>