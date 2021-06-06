<div class="single-product-widget">
    <h2 class="product-wid-title">Top Des Nouveautés</h2>
    <?php
        require("./dbconnexion.php");
        $r = "SELECT * FROM Produit WHERE Photo1 not like '%slider%' ORDER BY Id DESC LIMIT 3";
        $res = mysql_query($r);
        while ($data = mysql_fetch_array($res)) {
    ?>
    <div class="single-wid-product">
        <a href="index.php?page=produit&idProduit=<?php echo $data['Id']; ?>"><img height="100" width="100" src="img/<?php echo $data['Photo1']; ?>" alt="" class="product-thumb"></a>
        <h2><a href="index.php?page=produit&idProduit=<?php echo $data['Id']; ?>"><?php echo $data['Libelle']; ?></a></h2>
        <div class="product-wid-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-wid-price">
            <ins><?php echo $data['PrixActuel']; ?> Dh</ins> 
            <?php 
                if($data['PrixActuel'] < $data['PrixInitial']){
                    ?>
                        <del><?php echo $data['PrixInitial']; ?> Dh</del>
                    <?php
                }
            ?>
        </div>
    </div>
    <?php
        }
    ?>
</div>
