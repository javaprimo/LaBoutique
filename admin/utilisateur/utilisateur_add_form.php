<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajout d'un nouvel Utilisateur</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=utilisateur/utilisateur_add" >
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputNom">Nom</label>
					<input type="text" class="form-control" id="inputNom" name="inputNom" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputPrenom">Prénom</label>
					<input type="text" class="form-control" id="inputPrenom" name="inputPrenom" />
				</div>
			</div>
			<div class="form-row">			
				<div class="form-group col-md-3">
					<label for="inputTelephone">Téléphone</label>
					<input type="text" class="form-control" id="inputTelephone" name="inputTelephone" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputLogin">Login</label>
					<input type="text" class="form-control" id="inputLogin" name="inputLogin" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputAdresse">Adresse</label>
					<input type="text" class="form-control" id="inputAdresse" name="inputAdresse" />
				</div>
				<div class="form-group col-md-3">
					<label for="inputVille">Ville</label><br/>
					<input type="text" class="form-control" id="inputVille" name="inputVille" />
				</div>
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
