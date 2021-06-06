<?php
	try
	{
        session_start();
		extract($_POST);
        require("../dbconnexion.php");
        $success = 1;
        if(!isset($_SESSION['PANIER_ID'])){
            $idUtilisateur = isset($_SESSION['SESSION_ID']) ? $_SESSION['SESSION_ID'] : "NULL";
            $rPanier = "INSERT INTO Panier(IdUtilisateur) VALUES($idUtilisateur)";
            if(mysql_query($rPanier) > 0){
                $panier = mysql_insert_id();
                $_SESSION['PANIER_ID'] = $panier;
                $rInsertProduitsPanier = "INSERT INTO ProduitsPanier(IdProduit, Quantite, IdPanier) VALUES($idProduit, $quantite, $panier)";
                $success = mysql_query($rInsertProduitsPanier) ? 1 : 0;
                $reqProduitsQuantite = "UPDATE PRODUIT SET Quantite = Quantite - $quantite WHERE Id = $idProduit";
                $success = mysql_query($reqProduitsQuantite) ? 1 : 0;
            }
        }
        else{
            $panier = $_SESSION['PANIER_ID'];
            $rCheckProduitExists = "SELECT 1 FROM ProduitsPanier WHERE IdPanier = $panier and IdProduit = $idProduit LIMIT 1";
            echo $rCheckProduitExists;

            if(mysql_fetch_row(mysql_query($rCheckProduitExists))){
                $rUpdateProduitsPanier = "Update ProduitsPanier SET Quantite = Quantite + $quantite WHERE IdPanier = $panier and IdProduit = $idProduit";
                $success = mysql_query($rUpdateProduitsPanier) ? 1 : 0;
                $reqProduitsQuantite = "UPDATE PRODUIT SET Quantite = Quantite - $quantite WHERE Id = $idProduit";
                $success = mysql_query($reqProduitsQuantite) ? 1 : 0;
            }
            else{
                $rInsertProduitsPanier = "INSERT INTO ProduitsPanier(IdProduit, Quantite, IdPanier) VALUES($idProduit, $quantite, $panier)";
                $success = mysql_query($rInsertProduitsPanier) ? 1 : 0;
                $reqProduitsQuantite = "UPDATE PRODUIT SET Quantite = Quantite - $quantite WHERE Id = $idProduit";
                $success = mysql_query($reqProduitsQuantite) ? 1 : 0;
            }
        }
	}
	catch(Exception $ex)
	{
		echo $ex;
		$success = 0;
	}
    finally{
        mysql_close($con);	
    }

	header('location: ../index.php?page=produit&idProduit=' . $idProduit . '&success=' . $success);
?>
