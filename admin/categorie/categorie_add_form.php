<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Ajout d'une nouvelle Categorie</h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=categorie/categorie_add">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputNomCategorie">Nom categorie</label>
					<input type="text" class="form-control" id="inputNomCategorie" name="inputNomCategorie" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDescriptionCategorie">Description categorie</label>
					<input type="text" class="form-control" id="inputDescriptionCategorie" name="inputDescriptionCategorie" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=categorie/categorie_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
