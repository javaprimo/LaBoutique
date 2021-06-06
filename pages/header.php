<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="index.php?page=accueil"><i class="fa fa fa-home"></i>Accueil</a></li>
                        <?php
                            if(!isset($_SESSION['SESSION_ID'])){
                        ?>
                                <li><a href="index.php?page=login&from=<?php echo isset($_GET['page']) ? $_GET['page'] : 'accueil'; ?>"><i class="fa fa-sign-in"></i> Se connecter </a></li>
                        <?php
                            }
                        ?>
                        <li><a href="index.php?page=panier"><i class="fa fa-shopping-cart"></i> Mon Panier</a></li>
                        <li><a href="index.php?page=paiement"><i class="fa fa-money"></i> Aller en caisse</a></li>
                        <li><a href="index.php?page=compte"><i class="fa fa-user"></i> Mon Compte </a></li>
                        <li><a href="index.php?page=commandes"><i class="fa fa-dropbox"></i> Mes Commandes</a></li>
                        <?php
                            if(isset($_SESSION['SESSION_ID'])){
                        ?>
                                <li><a href="index.php?page=logout&from=<?php echo isset($_GET['page']) ? $_GET['page'] : 'accueil'; ?>"><i class="fa fa-sign-out"></i>Se déconnecter </a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                <span class="key">Devise :</span><span class="value"> MAD </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">MAD</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                <span class="key">Langue :</span><span class="value"> Français </span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Français</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="img/logo.png"></a></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="index.php?page=panier">Mon panier - <span class="cart-amunt"><?php
                                                                                            $montantPanier = 0;
                                                                                            if (isset($_SESSION['PANIER_ID'])) {
                                                                                                require("./dbconnexion.php");
                                                                                                $panier = $_SESSION['PANIER_ID'];
                                                                                                $rMontantPanier = "SELECT IFNULL(SUM(Produit.PrixActuel * ProduitsPanier.Quantite), 0) as montantPanier 
                                FROM ProduitsPanier inner join Produit on ProduitsPanier.IdProduit = Produit.Id
                                inner join Panier on ProduitsPanier.IdPanier = Panier.Id
                                WHERE ProduitsPanier.IdPanier = $panier and Panier.Complete = 0";
                                                                                                $resMontantPanier = mysql_query($rMontantPanier);
                                                                                                while ($data = mysql_fetch_array($resMontantPanier)) {
                                                                                                    $montantPanier = $data['montantPanier'];
                                                                                                }
                                                                                                mysql_close($con);
                                                                                            }
                                                                                            echo "$montantPanier Dh";
                                                                                            ?></span>
                        <i class="fa fa-shopping-cart"></i>
                        <span class="product-count"><?php
                                                    $nbrProduitsPanierHeader = 0;
                                                    if (isset($_SESSION['PANIER_ID'])) {
                                                        require("./dbconnexion.php");
                                                        $panier = $_SESSION['PANIER_ID'];
                                                        $rNbrProduitsPanier = "SELECT IFNULL(SUM(ProduitsPanier.Quantite), 0) as nbrProduitsPanier 
                            FROM ProduitsPanier inner join Panier on ProduitsPanier.IdPanier = Panier.Id
                            WHERE ProduitsPanier.IdPanier = $panier and Panier.Complete = 0";
                                                        $resNbrProduitsPanier = mysql_query($rNbrProduitsPanier);
                                                        while ($data = mysql_fetch_array($resNbrProduitsPanier)) {
                                                            $nbrProduitsPanierHeader = $data['nbrProduitsPanier'];
                                                        }
                                                        mysql_close($con);
                                                    }
                                                    echo $nbrProduitsPanierHeader;
                                                    ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
