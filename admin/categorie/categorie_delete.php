<?php
	try
	{
		if(!$_GET['idCategorie'])
		{
			header('location: index.php?page=categorie/categorie_list&success=2');
			return;
		}

		$idCategorie = $_GET['idCategorie'];

		require("./dbconnexion.php");
		$req = "DELETE FROM Categorie WHERE Id = $idCategorie";
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
	header('location: index.php?page=categorie/categorie_list&success='.$success);
?>
