<section >
    <div class="container">
        <div id="details_prod" class="row text-center pad-row">
            <ol class="breadcrumb">
                <li><a href="index.php?module=products&listProd=true">List of Products</a></li>
                <li class="active">Details Product</li>
            </ol>
            <br>
            <br>
            <?php
            echo "<br>";
            echo "<br>";
            if (isset($arrData) && !empty($arrData)) {
                ?>
                <div id="details" class="col-md-4  col-sm-4">
                    <!--<i class="fa fa-desktop fa-5x"></i>-->
                    <!--<img src="view/img/product.jpg" alt="product" height="70" width="70">-->
                    <img class="prodImg" src="<?php echo $arrData['avatar'] ?>" alt="product">

                    <div id="container">
                        <h4> <strong><?php echo $arrData['name_prod'] ?></strong> </h4>
                        <br />
                        <p>
                            <strong>Description: <br/></strong><?php echo $arrData['description'] ?>
                        </p>
                        <p>
                            <strong>Color:</strong> <?php echo $arrData['color'] ?>
                        </p>
                        <h3> <strong>Price: <?php echo $arrData['price'] ?>€</strong> </h3>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
