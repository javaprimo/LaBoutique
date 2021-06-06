<?php
	try
	{
		extract($_POST);
		if(!isset($idUtilisateur))
		{
			header('location: index.php?page=utilisateur/utilisateur_list&success=2');
			return;
		}

		require("../dbconnexion.php");
		$inputAdresse = htmlentities($inputAdresse, ENT_QUOTES, 'UTF-8');
		$r = "UPDATE Utilisateur SET Nom = '$inputNom', Prenom = '$inputPrenom', Telephone = '$inputTelephone', 
		Login = '$inputLogin', Adresse = '$inputAdresse', Ville = '$inputVille' WHERE Id = $idUtilisateur";
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
	header('location: index.php?page=utilisateur/utilisateur_list&success='.$success);
?>
