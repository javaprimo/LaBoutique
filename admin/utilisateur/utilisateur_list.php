<?php
	if (!isset($_SESSION['SESSION_ID']))
	{
		header('location: index.php?page=connexion');
	}

	require("../dbconnexion.php");
	$r = "SELECT * FROM Utilisateur ORDER BY Id";
	$res = mysql_query($r);

?>

<div class="col-md-6">
<h3>Liste des utilisateurs</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="index.php?page=utilisateur/utilisateur_add_form"> <img src="images/add.png" /></a></th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Téléphone</th>
				<th>E-mail</th>
				<th>Adresse</th>
				<th>Ville</th>
			</tr>
		</thead>
		<tbody>

			<?php

			while ($data = mysql_fetch_array($res)) {
			?>
				</tr>
					<td><?php echo $data['Id']; ?></td>
					<td><?php echo strtoupper($data['Nom']); ?></td>
					<td><?php echo $data['Prenom']; ?></td>
					<td><?php echo $data['Telephone']; ?></td>
					<td><?php echo $data['Login']; ?></td>
					<td><?php echo $data['Adresse']; ?></td>
					<td><?php echo $data['Ville']; ?></td>
					<td><a href="index.php?page=utilisateur/utilisateur_update_form&idUtilisateur=<?php echo $data['Id']; ?>"> <img src="images/modifier.png" /></a></td>
					<td><a href="index.php?page=utilisateur/utilisateur_delete_confirm&idUtilisateur=<?php echo $data['Id']; ?>"> <img src="images/supprimer.png" /></a></td>
				</tr>

			<?php
			}

			mysql_close($con);

			?>
		</tbody>
	</table>
</div>