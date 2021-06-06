<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Informations de paiement
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="pages/effectuer_paiement.php" role="form">
                        <div class="form-group">
                            <label for="nom">
                                Nom : </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nom" name="nom" value="DOUNAS" placeholder="Votre nom" required autofocus />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telephone">
                                Numéro de téléphone : </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="telephone" name="telephone" value="0606060606" placeholder="Votre numéro de telephone" required />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">
                                Numéro de carte bancaire (fictif) : </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="numeroCarte" name="numeroCarte" value="378734493671000" placeholder="Numéro Card Number" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="expityMonth">Date d'expiration</label>
                                    <div class="pl-ziro">
                                        <input type="text" class="form-control" id="dateExpiration" name="dateExpiration" value="12/23" placeholder="MM/AA" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cvCode">Code CVV : </label>
                                    <input type="password" class="form-control" id="codeCvv" name="codeCvv" value="123" placeholder="CVV" required />
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a>
                                    <span class="badge pull-right">
                                        <span class="glyphicon"></span>
                                    <?php
                                        $PrixTotalProduits = 0;
                                        if(!isset($_SESSION['SESSION_ID'])){
                                            header('location: index.php?page=login&from=paiement');
                                            exit();
                                        }
                                        if(isset($_SESSION['PANIER_ID'])){
                                            require("./dbconnexion.php");
                                            $panier = $_SESSION['PANIER_ID'];
                                            $rMontantPanier = "SELECT IFNULL(SUM(Produit.PrixActuel * ProduitsPanier.Quantite), 0) as montantPanier 
                                            FROM ProduitsPanier 
                                            INNER JOIN Produit on ProduitsPanier.IdProduit = Produit.Id
                                            INNER JOIN Panier ON ProduitsPanier.IdPanier = Panier.Id
                                            WHERE IdPanier = $panier and Panier.Complete = 0";
                                            $resMontantPanier = mysql_query($rMontantPanier);
                                            while ($data = mysql_fetch_array($resMontantPanier)) {
                                                $PrixTotalProduits = $data['montantPanier'];
                                            }
                                            mysql_close($con);
                                        }

                                        echo $PrixTotalProduits;
                                    ?> Dh
                                    </span>
                                    Montant du paiement
                                </a>
                            </li>
                        </ul>
                        <br/>
                        <?php
                        if($PrixTotalProduits > 0){
                        ?>
                            <button class="btn btn-success btn-lg btn-block" role="button" type="submit">Finaliser le paiement</button>
                        <?php
                        }
                        ?>
                    </form>
                    <?php
                    if($PrixTotalProduits <= 0){
                    ?>
                        <h2>Panier vide </h2>
                        <a href="index.php?page=accueil"><input type="submit" value="Retour à la boutique" name="update_cart" class="button"></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>