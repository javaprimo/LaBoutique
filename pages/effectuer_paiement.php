<?php
	try
	{
        session_start();
	    extract($_POST);
        $urlRedirerct = "../index.php?page=accueil";
        require("../dbconnexion.php");
        if(!isset($_SESSION['PANIER_ID']) || !isset($_SESSION['SESSION_ID'])){
            $urlRedirerct = '../index.php?page=accueil&success=0';
        }
        else{
            
            $rPanier = 'UPDATE Panier SET IdUtilisateur = ' . $_SESSION['SESSION_ID'] . ', Complete = 1 WHERE Id = ' . $_SESSION['PANIER_ID'];
            if(mysql_query($rPanier) > 0){
                unset($_SESSION['PANIER_ID']);
                $urlRedirerct = '../index.php?page=validation&success=1';
            }
            else{
                $urlRedirerct = '../index.php?page=panier&success=0';
            }
        }
	}
	catch(Exception $ex)
	{
		echo $ex;
        $urlRedirerct = '../index.php?page=panier&success=0';
	}
    finally{
        mysql_close($con);	
    }

	header('location: ' . $urlRedirerct);
?>
