<?php
    require("./dbconnexion.php");
    $articlesParPage = 8;
    $totalNombreDePages = 1;
    $r = "SELECT COUNT(*) as nbrProduits FROM produit WHERE Photo1 not like '%slider%'";
    if(isset($_GET['idCategorie'])){
        $r = $r . ' and IdCategorie = ' . $_GET['idCategorie'];
    }

    $res = mysql_query($r);
    while ($data = mysql_fetch_array($res)) {
        $totalNombreDePages = ceil($data['nbrProduits'] / $articlesParPage);
        echo $totalNombreDePages . '<br/>';
    }
    mysql_close($con);
?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php
            $pageArticlesIndex = 0;
            if(isset($_GET['currentPageNbr'])){
                $pageArticlesIndex = ($_GET['currentPageNbr'] - 1);
            }

            require("./dbconnexion.php");
            $r = "SELECT * FROM produit  WHERE Photo1 not like '%slider%'";
            if(isset($_GET['idCategorie'])){
                $r = $r . ' and IdCategorie = ' . $_GET['idCategorie'];
            }
            $r = $r . " ORDER BY Id LIMIT " . $pageArticlesIndex  . ", " . $articlesParPage;
            $res = mysql_query($r);
            while ($data = mysql_fetch_array($res)) {
            ?>
                <div class="col-md-3 col-sm-5">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/<?php echo $data['Photo1']; ?>" alt="" style="height: 200px; width: 200px;">
                        </div>
                        <h2><a href="./?page=produit&idProduit=<?php echo ''.$data['Id']; ?>"><?php echo substr($data['Libelle'], 0, 37) . '...'; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $data['PrixActuel']; ?> Dh</ins>
                            <del>
                            <?php 
                                if($data['PrixActuel'] < $data['PrixInitial']){
                                    echo $data['PrixInitial'] . " Dh";
                                } 
                            ?> 
                            </del>
                        </div>
                        <div class="product-option-shop">
                            <form method="POST" action="pages/ajouter_au_panier.php" class="cart" >
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="quantite" value="1" name="quantite" min="1" step="1">
                                </div>
                                <input type="hidden" name="idProduit" value=<?php echo $data['Id']; ?> />

                                <button class="add_to_cart_button" type="submit">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php 
                }
            ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="./?page=produits&currentPageNbr=<?php
                                    $currentPageNbr = 1;
                                    if(isset($_GET['currentPageNbr']) && $_GET['currentPageNbr'] > 1){
                                        echo ($_GET['currentPageNbr'] - 1);
                                    }
                                    else{
                                        echo $currentPageNbr;
                                    } ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php
                            while ($currentPageNbr <= $totalNombreDePages) {
                                ?>
                                <li 
                                <?php 
                                    if(isset($_GET['currentPageNbr']) && $_GET['currentPageNbr'] == $currentPageNbr){
                                        echo ' class="active"';
                                    }else if(!isset($_GET['currentPageNbr']) && $currentPageNbr == 1 ){
                                        echo ' class="active"';
                                    }
                                ?>
                                >
                                <a href="<?php echo './?page=produits&currentPageNbr=' . $currentPageNbr; ?>"><?php echo $currentPageNbr ?></a></li>
                                <?php
                                    $currentPageNbr++;
                                }
                            ?>
                            <li>
                                <a href="./?page=produits&currentPageNbr=<?php
                                    if(isset($_GET['currentPageNbr']) && $_GET['currentPageNbr'] < $totalNombreDePages){
                                        echo ($_GET['currentPageNbr'] + 1);
                                    }
                                    else{
                                        echo $totalNombreDePages;
                                    }
                                ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
