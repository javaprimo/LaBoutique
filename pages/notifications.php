<?php
if (!isset($_GET['success'])) 
{
    return;
} 
else if ($_GET['success'] == 0) 
{
?>
    <div class="alert alert-danger" role="alert">
        Op&eacute;ration &eacute;chou&eacute;e, merci d'essayer de nouveau. Si l'erreur persister, merci de contacter notre support !
    </div>
<?php
} 
else if ($_GET['success'] == 1) 
{
?>
    <div class="alert alert-success" role="alert">
        Op&eacute;ration effectu&eacute;e avec succ&eacute;s !
    </div>
<?php
}
else if ($_GET['success'] == 2) 
{
    ?>
        <div class="alert alert-info" role="alert">
            Op&eacute;ration annulée avec succ&eacute;s !
        </div>
    <?php
}
else if ($_GET['success'] == 3 && isset($_GET['email'])) 
{
    ?>
        <div class="alert alert-info" role="alert">
            Un utilisateur avec l'adresse email "<?php echo $_GET['email']?>" existe déjà, veuillez vous connecter !
        </div>
    <?php
}
?>