<div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-body">
					<h1 style="text-align: center;">Gestion de boutique e-Shop</h1>
				</div>
			</div>
		</div>
	</div>
	<?php
if (isset($_SESSION['SESSION_ID']) && isset($_SESSION['IS_ADMIN']))
{
?>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Gestion de boutique e-Shop</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Gestion des employés</a>
			</div>
			<?php
			//menu admin
			if($_SESSION["IS_ADMIN"] == 1)
			{
			?>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="?page=categorie/categorie_list">Categories</a></li>
					<li><a href="?page=produit/produit_list">Produits</a></li>
					<li><a href="?page=utilisateur/utilisateur_list">Utilisateurs</a></li>
					<li><a href="index.php?page=deconnexion">Deconnexion</a></li>
				</ul>
			</div>
			<?php
			}
			else
			{
			?>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php?page=deconnexion">Deconnexion</a></li>
				</ul>
			</div>
			<?php
			}
			?>
		</div>
	</nav>
<?php
}
?>

