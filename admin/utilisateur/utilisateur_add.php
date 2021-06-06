<?php
	try
	{
		extract($_POST);
		require("../dbconnexion.php");
		$inputAdresse = htmlentities($inputAdresse, ENT_QUOTES, 'UTF-8');
		$r = "INSERT INTO Utilisateur (Nom, Prenom, Telephone, Login, Password, Adresse, Ville)
		VALUES('$inputNom','$inputPrenom', '$inputTelephone', '$inputLogin', '123456', '$inputAdresse', '$inputVille')";
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
