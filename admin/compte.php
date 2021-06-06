<?php
	session_start();
	if (!isset($_SESSION['SESSION_ID'])) 
	{
		header('location: index.php?page=connexion');	
	}
?>


<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Espace Salarié</div>
            </div>

            <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" method="POST" action="deconnexion.php">
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <button id="btn-logout" type="submit" class="btn btn-success">Se déconnecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>