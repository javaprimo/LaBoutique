<?php
    if(isset($_SESSION['SESSION_ID'])){
        header('location: index.php?page=accueil');
        exit();
    }
?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center col-md-9">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form action="pages/ajouter_utilisateur.php" name="formInscription" method="POST" onsubmit="return(validate());">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="well center-block">
                                        <div class="well-header">
                                            <h3 class="text-center text-success"> Formulaire d'inscription </h3>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                        </div>
                                                        <input type="text" placeholder="Votre prénom" name="prenom" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                        </div>
                                                        <input type="text" placeholder="Votre nom" name="nom" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-lock"></i>
                                                        </div>
                                                        <input type="password" minlength="6" maxlength="20" placeholder="Mot de passe (minimum 6 caractères)" name="password" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-phone"></i>
                                                        </div>
                                                        <input type="number" minlength="10" maxlength="12" class="form-control" name="telephone" placeholder="Votre numéro de téléphone" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-envelope"></i>
                                                        </div>
                                                        <input type="email" class="form-control" name="email" placeholder="Votre E-Mail" value="<?php echo  isset($_GET['email']) ? $_GET['email'] : '';?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-list-alt"></i>
                                                        </div>
                                                        <textarea class="form-control" name="adresse" placeholder="Votre adresse de livraion"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-pushpin"></i>
                                                        </div>
                                                        <input type="text" name="ville" placeholder="Votre ville de livraion" class="form-control" id="ville" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row widget">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <button class="btn btn-warning btn-block"> S'inscrire </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/inscription.js"></script>