<?php 
    if(isset($_SESSION['SESSION_ID']) && isset($_SESSION['IS_ADMIN'])){
        if($_SESSION['IS_ADMIN'] == 1){
            header('location: ../admin/index.php?page=accueil&isAdmin='.$user['IsAdmin']);
        }
        else{
            header('location: index.php?page=accueil&isAdmin='.$user['IsAdmin']);
        }
    }
?>
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Connexion</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Mot de passe oublié?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginForm" class="form-horizontal" role="form" method="POST" action="pages/authentification.php">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login" type="text" class="form-control" name="login" value="utilisateur.client@gmail.com" placeholder="Login" />
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" value="123456" placeholder="Mot de passe" />
                        <?php
                            if(isset($_GET['from'])){
                        ?>
                                <input id="from" type="hidden" name="from" value="<?php echo $_GET['from'] ?>" />
                        <?php
                            }
                        ?>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <a href="javascript:;" onclick="document.getElementById('loginForm').submit();" class="btn btn-success">Se connecter</a>
                            <a href="./index.php?page=accueil&success=2" class="btn btn-default">Annuler</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Vous n'avez pas un compte ?
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <a href="./?page=inscription" class="btn btn-primary btn-block"><i class="fas fa-user-plus"></i> S'inscrire par ici
                            </a>
                        </div>
                    </div>        
                </form>
            </div>
        </div>
    </div>
</div>