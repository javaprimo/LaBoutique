<?php
    if(!isset($_SESSION['SESSION_ID'])){
        header('location: index.php?page=login&success=0');
        exit();
    }

	try
	{
		extract($_POST);
        require("../dbconnexion.php");
        $redirectUrl = '../index.php?page=login&success=1';
		$rUtilisateurExistant = "SELECT * FROM Utilisateur AS u WHERE u.Login = '$email' and u.Password = $currentPwd";
		$resUtilisateurExistant = mysql_query($rUtilisateurExistant);
		$n = mysql_num_rows($resUtilisateurExistant);		
		if ($n == 0){
            $redirectUrl = '../index.php?page=compte&success=0';
        }
        else{
            
            newPwd
            confirmPwd

            $nom = mysql_real_escape_string($nom);
            $prenom = mysql_real_escape_string($prenom);
            $telephone = mysql_real_escape_string($telephone);
            $adresse = mysql_real_escape_string($adresse);
            $ville = mysql_real_escape_string($ville);
            $email = mysql_real_escape_string($email);
            $currentPwd = mysql_real_escape_string($currentPwd);
            $currentPwd = mysql_real_escape_string($currentPwd);
            $newPwd = mysql_real_escape_string($newPwd);
            $rUtilisateur = "Update Utilisateur(Nom, Prenom, Telephone, Adresse, Ville, Login, Password) 
                SET Nom = '$nom', Prenom = '$prenom', Telephone = '$telephone', Adresse = '$adresse', Ville = '$ville', Login = '$email', Password = '$newPwd')
                WHERE Id = $resUtilisateurExistant['Id']";
            echo $rUtilisateur;
            if(!mysql_query($rUtilisateur)){
                $redirectUrl = '../index.php?page=inscription&success=0';
            }
        }
        else{
            $redirectUrl = '../index.php?page=inscription&email=' . $email . '&success=3';
        }
	}
	catch(Exception $ex)
	{
		echo $ex;
		$redirectUrl = '../index.php?page=inscription&success=0';
	}
    finally{
        mysql_close($con);	
    }

    //header('location: ' . $redirectUrl);
?>
