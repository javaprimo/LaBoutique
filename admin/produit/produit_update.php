<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		if(!isset($idProduit))
		{
			header('location: index.php?page=produit/produit_list&success=2');
			return;
		}

		//Connexion
		require("../dbconnexion.php");
		$inputDescription = htmlentities($inputDescription, ENT_QUOTES, 'UTF-8');
		$r = "UPDATE Produit SET Libelle = '$inputLibelle', Description = '$inputDescription', Quantite = $inputQuantite, 
		PrixInitial = $inputPrixInitial, PrixActuel = $inputPrixActuel, IdCategorie = $inputCategorie WHERE Id = $idProduit";
		echo $r . '<br/>';
		$res = mysql_query($r);
		for ($i = 1; $i <= 3; $i++) {
			$photName = "inputPhoto$i";
			if(isset($_FILES["$photName"]) && $_FILES["$photName"]['tmp_name'] != ''){
				$productIdPath = "photos-produit-$idProduit";
				if(!is_dir($productIdPath)){
					mkdir("../img/$productIdPath");
				}
				$photoName = date_timestamp_get(date_create()) . '_' . $_FILES["$photName"]['name'];
				$fileFullName = $productIdPath . '/' . $photoName;
				move_uploaded_file($_FILES["$photName"]['tmp_name'], "../img/$fileFullName");
				$r = "UPDATE Produit SET Photo$i = '$fileFullName' WHERE Id = $idProduit";
				$res = mysql_query($r);
			}
		}

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
