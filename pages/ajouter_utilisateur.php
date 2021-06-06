<?php
    if(isset($_SESSION['SESSION_ID'])){
        header('location: index.php?page=accueil');
        exit();
    }

	try
	{
		extract($_POST);
        require("../dbconnexion.php");
        $redirectUrl = '../index.php?page=login&success=1';
		$rUtilisateurExistant = "SELECT * FROM Utilisateur AS u WHERE u.Login = '$email'";
		$resUtilisateurExistant = mysql_query($rUtilisateurExistant);
		$n = mysql_num_rows($resUtilisateurExistant);		
		if ($n == 0)
		{
            $nom = mysql_real_escape_string($nom);
            $prenom = mysql_real_escape_string($prenom);
            $telephone = mysql_real_escape_string($telephone);
            $adresse = mysql_real_escape_string($adresse);
            $ville = mysql_real_escape_string($ville);
            $email = mysql_real_escape_string($email);
            $password = mysql_real_escape_string($password);
            $rUtilisateur = "INSERT INTO Utilisateur(Nom, Prenom, Telephone, Adresse, Ville, Login, Password, IsAdmin) 
            VALUES('$nom', '$prenom', '$telephone', '$adresse', '$ville', '$email', '$password', 0)";
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

    header('location: ' . $redirectUrl);
?>
