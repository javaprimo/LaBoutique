<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>e-<span>Shop</span></h2>
                    <p>Accédez au meilleures offres avec les dernières technologies et un système de livraison et paiement sécurisé</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Menu Utilisateur</h2>
                    <ul>
                        <li><a href="#"> Mon Compte </a></li>
                        <li><a href="#"> Login </a></li>
                        <li><a href="index.php?page=accueil">Accueil</a></li>
                        <li><a href="index.php?page=panier"> Mon Panier</a></li>
                        <li><a href="index.php?page=panier"> Mes Commandes</a></li>
                        <li><a href="index.php?page=paiement"> Aller en caisse</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Nos Categories</h2>
                    <ul>
                        <?php
                            require("./dbconnexion.php");
                            $r = "SELECT * FROM categorie ORDER BY nom";
                            $res = mysql_query($r);
                            while ($data = mysql_fetch_array($res)) {
                            ?>
                                <li><a href="index.php?page=produits&idCategorie=<?php echo $data['Id']; ?>"><?php echo $data['Nom']; ?></a></li>
                            <?php
                            }
                            mysql_close($con);
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <h2 class="footer-wid-title">Nos Marques</h2>
                <div class="footer-newsletter">
                    <img width="245" height="245" alt="poster_1_up" class="shop_thumbnail" src="img/marques.jpg">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; Réalisé par Adil DOUNAS. <a href="http://www.adildounas.com" target="_blank">adildounas.com</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div>