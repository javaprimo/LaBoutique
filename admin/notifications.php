<?php
if (!isset($_GET['success'])) 
{
    return;
} 
else if ($_GET['success'] == 0) 
{
?>
    <div class="alert alert-danger" role="alert">
        Op&eacute;ration effectu&eacute;e avec &eacute;chec, merci de vérifier les logs !
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
?>