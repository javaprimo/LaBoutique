<?php

	session_start();

	if(!isset($_SESSION['PANIER_ID']))
	{
		header('location: ../index.php?page=panier&success=2');
		return;
	}
	extract($_POST);
	try
	{
        $panier = $_SESSION['PANIER_ID'];
		require("../dbconnexion.php");
        $reqProduitsQuantite = "UPDATE Produit 
            SET Quantite = Produit.Quantite + 
				(SELECT ProduitsPanier.Quantite FROM ProduitsPanier 
					INNER JOIN Panier ON ProduitsPanier.IdPanier = Panier.Id 
					WHERE ProduitsPanier.IdPanier = $panier and ProduitsPanier.IdProduit = $idProduit and Panier.Complete = 0)
            WHERE Produit.Id = $idProduit";
			
		$success = mysql_query($reqProduitsQuantite) ? 1 : 0;
        $reqProduitsPanier = 
			"DELETE prodPan FROM ProduitsPanier as prodPan
				INNER JOIN Panier ON prodPan.IdPanier = Panier.Id 
				WHERE prodPan.IdPanier = $panier and prodPan.IdProduit = $idProduit and Panier.Complete = 0";
		$success = mysql_query($reqProduitsPanier) ? 1 : 0;
	}
	catch(Exception $ex)
	{
		echo $ex;
		$success = 0;
	}
	finally{
		mysql_close($con);
	}

	header('location: ../index.php?page=panier&success=' . $success);
?>
