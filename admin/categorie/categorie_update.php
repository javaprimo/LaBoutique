<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		if(!isset($idCategorie))
		{
			header('location: index.php?page=categorie/categorie_list&success=2');
			return;
		}

		//Connexion
		require("./dbconnexion.php");
		$r = "UPDATE Categorie SET Nom = '$inputNomCategorie', Description = '$inputDescriptionCategorie' WHERE Id = '$idCategorie'";
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
	header('location: index.php?page=categorie/categorie_list&success='.$success);
?>
