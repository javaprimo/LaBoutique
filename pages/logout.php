<?php
   unset($_SESSION['SESSION_ID']);

   $from = "accueil";
   if(isset($_GET['from']) && !empty($_GET['from'])){
       $from = $_GET['from'];
    }
    
    header('location: ./index.php?page=' . $from . '&success=1&isAdmin='.$_SESSION['IS_ADMIN']);
?>