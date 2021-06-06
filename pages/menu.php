<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li <?php
                        if (isset($_GET['page']) && $_GET['page'] == 'accueil' && !isset($_GET['idCategorie'])) {
                            echo 'class="active"';
                        } else if (!isset($_GET['page']) && !isset($_GET['idCategorie'])) {
                            echo 'class="active"';
                        }
                        ?>><a href="index.php?page=accueil">Accueil</a></li>
                    <?php
                    require("./dbconnexion.php");
                    $r = "SELECT * FROM categorie ORDER BY nom";
                    $res = mysql_query($r);
                    while ($data = mysql_fetch_array($res)) {
                    ?>
                        <li <?php
                            if (isset($_GET['page']) && isset($_GET['idCategorie'])) {
                                if ($_GET['page'] == 'produits' && $_GET['idCategorie'] == $data['Id'])
                                    echo 'class="active"';
                            }
                            ?>><a href="index.php?page=produits&idCategorie=<?php echo $data['Id']; ?>"><?php echo $data['Nom']; ?></a></li>
                    <?php
                    }
                    mysql_close($con);
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>