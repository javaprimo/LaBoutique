<div class="single-product-area">
    <div class="container">
        <?php
        if (!isset($_GET['idProduit'])) {
            header('location: index.php?page=produit_introuvable');
            return;
        }

        require("./dbconnexion.php");
        $r = "SELECT produit.*, categorie.Nom as NomCategorie FROM `produit` INNER JOIN categorie on produit.IdCategorie = categorie.Id WHERE produit.Id = " . $_GET['idProduit'];
        $res = mysql_query($r);
        while ($data = mysql_fetch_array($res)) {
        ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <h3><a href="">Home/<?php echo $data['NomCategorie'] . '/' . html_entity_decode($data['Libelle'], ENT_COMPAT, 'UTF-8') ; ?></a></h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="img/<?php echo $data['Photo1']; ?>" alt="">
                                    </div>
                                    <div class="product-gallery">
                                        <img src="img/<?php echo $data['Photo2']; ?>" alt="">
                                        <img src="img/<?php echo $data['Photo3']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo html_entity_decode($data['Libelle'], ENT_COMPAT, 'UTF-8'); ?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $data['PrixActuel']; ?> Dh</ins>
                                        <del>
                                            <?php
                                            if ($data['PrixActuel'] < $data['PrixInitial']) {
                                                echo $data['PrixInitial'] . " Dh";
                                            }
                                            ?>
                                        </del>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                    <form method="POST" action="pages/ajouter_au_panier.php" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="quantite" value="1" name="quantite" min="1" step="1">
                                        </div>
                                        <input type="hidden" name="idProduit" value=<?php echo $data['Id']; ?> />
                                        <button class="add_to_cart_button" type="submit">Ajouter au panier</button>
                                    </form>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Description du produit</h2>
                                                <p><?php echo $data['Description']; ?></p>
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
        mysql_close($con);
        ?>
        <div class="product-widget-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php include 'topsellers.php'; ?>
                    </div>
                    <div class="col-md-4">
                        <?php include 'toppromotions.php'; ?>
                    </div>
                    <div class="col-md-4">
                        <?php include 'topnew.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>