<?php
	if(!isset($_GET['idProduit']))
	{
		header('location: index.php?page=panier&success=2');
		return;
	}
    $idProduit = $_GET['idProduit'];
	require("./dbconnexion.php");
	$req = "select * from Produit where Id = $idProduit";
	$res = mysql_query($req);
	$data = mysql_fetch_array($res);
	mysql_close($con);
	?>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Suppression d'un produit</h3>
                </div>
                <div class="panel-body">
                    <div class="media position-relative">
                    <img src="img/warning.png" class="col col-lg-2" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Attention le produit <h3><b><?php echo $data['Libelle']?></b></h3> sera supprimé complétement de votre panier.</h5>
                            <p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
                            <form id="formSuppressionProduitConfirm" method="POST" action="pages/supprimer_du_panier.php" class="cart">
                                <input type="hidden" name="idProduit" value=<?php echo $data['Id']; ?> />
                                <a href="javascript:;" onclick="document.getElementById('formSuppressionProduitConfirm').submit();" class="btn btn-primary stretched-link">Supprimer</a>
                                <a href="index.php?page=panier&success=2" class="btn btn-success stretched-link">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

