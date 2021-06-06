<?php 
	try
	{
		session_start();
		extract($_POST);
		$redirectUrl = '../index.php?page=login&success=0';
		require("../dbconnexion.php");
		$r = "SELECT * FROM Utilisateur AS u WHERE u.Login = '$login' AND u.Password = '$password'";
		$res = mysql_query($r);
		$n = mysql_num_rows($res);
		$from = (isset($from) && !empty($from)) ? $from : "accueil";
		
		if ($n == 1)
		{
			$user = mysql_fetch_array($res);
			$_SESSION['SESSION_ID'] = $user['Id'];
			$_SESSION['IS_ADMIN'] = $user['IsAdmin'];
			if($user['IsAdmin'] == 1){
				$redirectUrl = '../admin/index.php?page=accueil';
			}
			else{
				$redirectUrl = '../index.php?page=' . $from;
				if(isset($_SESSION['PANIER_ID'])){
					$rUpdatePanier = 'UPDATE Panier SET IdUtilisateur = ' . $user['Id'] . ' WHERE Id = ' . $_SESSION['PANIER_ID'];
					$resUpdatePanier = mysql_query($rUpdatePanier);
				}
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

	header('location: ' . $redirectUrl);
?>