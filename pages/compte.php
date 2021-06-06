<?php
    if(!isset($_SESSION['SESSION_ID'])){
        header('location: index.php?page=login&from=compte');
        exit();
    }

require("./dbconnexion.php");
$rCompte = "SELECT * from Utilisateur where Id = " . $_SESSION['SESSION_ID'];
$resCompte = mysql_query($rCompte);
while ($dataUtilisateur = mysql_fetch_array($resCompte)) {
    $nbrOfRows = mysql_num_rows($resCompte);
    if ($nbrOfRows > 0) {
?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <h2>Bonjour <?php echo $dataUtilisateur['Prenom']; ?></h2>
                        <div class="col-lg-3 col-md-4">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#informations-compte" data-toggle="tab" class=""><i class="fa fa-user"></i> Informations du compte</a>
                            <a href="#mes-commandes" data-toggle="tab" class=""><i class="fa fa-shopping-cart"></i> Mes commandes</a>
                            <a href="#adresse-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> Addresse</a>
                            <a href="#aide-contact" data-toggle="tab" class=""><i class="fa fa-user"></i> Aide & contact</a>
                            <a href="index.php?page=logout&from=accueil"><i class="fa fa-sign-out"></i> Se déconnecter</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="myaccountContent">
                            <div class="tab-pane fade" id="mes-commandes" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Mes commandes</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                    <table cellspacing="0" class="shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Produit</th>
                                                <th class="product-price">Prix unitaire</th>
                                                <th class="product-quantity">Quantit&eacute;</th>
                                                <th class="product-subtotal">Prix total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                $nbrOfRows = 0;
                                                if(isset($_SESSION['SESSION_ID'])){
                                                    require("./dbconnexion.php");
                                                    $rPanier = "SELECT Produit.Id, Produit.Libelle, Produit.PrixActuel, Produit.Photo1, 
                                                    IFNULL(SUM(ProduitsPanier.Quantite), 0) as totalQuantiteProduit, IFNULL(SUM(ProduitsPanier.Quantite * Produit.PrixActuel), 0) as totalPrixProduit
                                                    FROM Produit inner join ProduitsPanier on Produit.Id = ProduitsPanier.IdProduit
                                                    inner join Panier on ProduitsPanier.IdPanier = Panier.Id
                                                    where Panier.Complete = 1 and IdUtilisateur = " . $_SESSION['SESSION_ID'] . " GROUP BY Produit.Id, Produit.Libelle, Produit.PrixActuel";
                                                    $resPanier = mysql_query($rPanier);
                                                    while ($data = mysql_fetch_array($resPanier)) {
                                                        $nbrOfRows = mysql_num_rows($resPanier);
                                                        if($nbrOfRows > 0){
                                                            ?>
                                                            <tr class="cart_item">
                                                                <td class="product-remove">
                                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $data['Photo1'] ?>"></a>
                                                                </td>
                                                                <td class="product-name">
                                                                    <a href="?page=produit&idProduit=<?php echo $data['Id'] ?>"><?php echo $data['Libelle'] ?></a> 
                                                                </td>
                                                                <td class="product-price">
                                                                    <span class="amount"><?php echo $data['PrixActuel'] ?> Dh</span> 
                                                                </td>
                                                                <td class="product-quantity">
                                                                    <div class="quantity buttons_added">
                                                                        <input disabled type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $data['totalQuantiteProduit'] ?>" min="0" step="1">
                                                                    </div>
                                                                </td>
                                                                <td class="product-subtotal">
                                                                    <span class="amount"><?php echo $data['totalPrixProduit'] ?> Dh</span> 
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    mysql_close($con);
                                                }

                                                if($nbrOfRows == 0){
                                                ?>
                                                    <tr class="cart_item" >
                                                        <td class="product-price" colspan="6">
                                                            <span class="amount"><h2>Aucune commande n'a été enregistrée </h2> <a href="?page=accueil"><input type="submit" value="Retour à la boutique" name="update_cart" class="button"></a></span> 
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="informations-compte" role="tabpanel">
                                <div class="myaccount-content">

                                    <h3>Bienvenue <?php echo $dataUtilisateur['Prenom']; ?></h2></h3>
                                    <div class="welcome">
                                        <p>Hello, <strong><?php echo $dataUtilisateur['Prenom'] . ' ' . $dataUtilisateur['Nom']; ?></strong> 
                                        ( Si ce n'est pas vous merci de <a href="index.php?page=logout&from=accueil" class="logout">vous déconnecter</a>! )</p>
                                    </div>
                                    <p class="mb-0">Ici vous allez pouvoir consulter et modifier vos informations personnelles. 
                                        Vous pourrez visualiser vos commandes, metre à jour vos informations personnelles, 
                                        détails du contact, addresse de livraion et surtout le password de votre compte <strong>e-Shop</strong>.
                                    </p>
                                    <br/>
                                    <h3>Informations de votre compte</h3>
                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="prenom" class="required">Prénom</label>
                                                        <input type="text" id="prenom" value="<?php echo $dataUtilisateur['Prenom']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="nom" class="required">Nom</label>
                                                        <input type="text" id="nom" value="<?php echo $dataUtilisateur['Nom']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="telephone" class="required">Téléphone</label>
                                                        <input type="text" id="telephone" value="<?php echo $dataUtilisateur['Telephone']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email </label>
                                                        <input type="email" id="email" value="<?php echo $dataUtilisateur['Login']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="adresse" class="required">Adresse</label>
                                                        <input type="text" id="adresse" value="<?php echo $dataUtilisateur['Adresse']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="ville" class="required">Ville </label>
                                                        <input type="text" id="ville" id="ville" value="<?php echo $dataUtilisateur['Ville']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset>
                                                <legend>Modification du mot de passe</legend>
                                                <div class="single-input-item">
                                                    <label for="current-pwd" class="required">Current Password</label>
                                                    <input type="password" id="currentPwd" name="currentPwd"/>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="new-pwd" class="required">New Password</label>
                                                            <input type="password" id="newPwd" name="newPwd" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="confirm-pwd" class="required">Confirm Password</label>
                                                            <input type="password" id="confirmPwd" name="confirmPwd" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="single-input-item">
                                                <button class="check-btn sqr-btn ">Enregistrer les modification</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade active show" id="adresse-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Votre Adresse</h3>
                                    <address>
                                        <p><strong><?php echo $dataUtilisateur['Nom'] . ' ' . $dataUtilisateur['Prenom']; ?></strong></p>
                                        <p><?php echo $dataUtilisateur['Adresse']; ?></p>
                                        <p><?php echo $dataUtilisateur['Ville']; ?></p>
                                        <p>Mobile: <?php echo $dataUtilisateur['Telephone']; ?></p>
                                        <p>Email: <?php echo $dataUtilisateur['Login']; ?></p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
    }
}
?>