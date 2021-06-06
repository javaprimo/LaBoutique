<?php
	try
	{
		if(!isset($_GET['idUtilisateur']))
		{
			header('location: index.php?page=utilisateur/utilisateur_list&success=2');
			return;
		}

		$idUtilisateur = $_GET['idUtilisateur'];
		
		require("../dbconnexion.php");
		$req = "DELETE FROM Utilisateur WHERE Id = $idUtilisateur";
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
	header('location: index.php?page=utilisateur/utilisateur_list&success='.$success);
?>
