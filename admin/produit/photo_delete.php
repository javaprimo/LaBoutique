<?php
	try
	{
		if(!isset($_GET['idProduit']) || !isset($_GET['idPhoto']))
		{
			header('location: index.php?page=produit/produit_list&success=2');
			exit();
		}

		$idProduit = $_GET['idProduit'];
		$idPhoto = $_GET['idPhoto'];
		require("../dbconnexion.php");
		$req = "UPDATE Produit SET Photo$idPhoto = '' WHERE Id = $idProduit";
		$res = mysql_query($req);
		if($res)
		{
			$success = 1;
		}
		else
		{
			echo mysql_error($con);
			$success = 0;
		}
	}
	catch(Exception $ex)
	{
		echo $ex;
		$success = 0;
	}

	mysql_close($con);	
	header('location: index.php?page=produit/produit_list&success='.$success);
?>
