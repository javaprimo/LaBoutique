<?php
	try
	{
		extract($_POST);
		require("../dbconnexion.php");
		$inputLibelle = htmlentities($inputLibelle, ENT_QUOTES, 'UTF-8');
		$inputDescription = htmlentities($inputDescription, ENT_QUOTES, 'UTF-8');
		$r = "INSERT INTO Produit (Libelle, Description, Quantite, PrixInitial, PrixActuel, Photo1, Photo2, Photo3, IdCategorie)
		VALUES('$inputLibelle','$inputDescription', $inputQuantite, $inputPrixInitial, $inputPrixActuel, '', '', '', $inputCategorie)";
		$res = mysql_query($r);
		$idProduit = mysql_insert_id();
		$photos = array();

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
				array_push($photos, $fileFullName);
			}
		}
		$photo1 = array_key_exists(0, $photos) ? $photos[0] : ''; 
		$photo2 = array_key_exists(1, $photos) ? $photos[1] : '';
		$photo3 = array_key_exists(2, $photos) ? $photos[2] : '';
		$r = "UPDATE Produit SET Photo1 = '$photo1', Photo2 = '$photo2', Photo3 = '$photo3' WHERE Id = $idProduit";
		$res = mysql_query($r);
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
