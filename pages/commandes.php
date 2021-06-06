<?php
    if(!isset($_SESSION['SESSION_ID'])){
        header('location: index.php?page=login&from=commandes');
        exit();
    }
?>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                            <h2>Liste de vos commandes</h2>
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
                                            where Panier.Complete = 1 and Panier.IdUtilisateur = " . $_SESSION['SESSION_ID'] . " GROUP BY Produit.Id, Produit.Libelle, Produit.PrixActuel";
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
                        </form>

                    <?php
                        $PrixTotalProduits = 0;
                        if(isset($_SESSION['PANIER_ID']) && $nbrOfRows > 0){
                            ?>
                        <div class="cart_totals ">
                            <h2>Cout total de vos commandes</h2>
                            <table cellspacing="0">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Cout total des produits</th>
                                        <td><span class="amount"><?php
                                                require("./dbconnexion.php");
                                                $panier = $_SESSION['PANIER_ID'];
                                                $rMontantPanier = "SELECT IFNULL(SUM(Produit.PrixActuel * ProduitsPanier.Quantite), 0) as montantPanier 
                                                    FROM ProduitsPanier inner join Produit on ProduitsPanier.IdProduit = Produit.Id 
                                                    INNER JOIN Panier ON ProduitsPanier.IdPanier = Panier.Id
                                                    WHERE Panier.Complete = 1 and Panier.IdUtilisateur = " . $_SESSION['SESSION_ID'];
                                                $resMontantPanier = mysql_query($rMontantPanier);
                                                while ($data = mysql_fetch_array($resMontantPanier)) {
                                                    $PrixTotalProduits = $data['montantPanier'];
                                                }
                                                mysql_close($con);
                                                echo $PrixTotalProduits;
                                            ?> Dh</span>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Cout de la livraison</th>
                                        <td>Livraison Offerte</td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Prix Total de la commande</th>
                                        <td><strong><span class="amount"><?php
                                                echo $PrixTotalProduits;
                                            ?> Dh</span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        }
                        ?>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>