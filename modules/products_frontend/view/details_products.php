<section >
    <div class="container">

        <?php
        if (isset($arrData) && !empty($arrData)) {
            ?>
            <div class="media">
                <div class="pull-left">
                    <img src="<?php echo $arrData['avatar']?>" class="img-product" >
                </div>
                <div class="media-body">
                    <h3 class="media-heading title-product"><?php echo $arrData['name_prod'] ?></h3>
                    <p class="text-limited"><?php echo $arrData['color'] ?></p>
                    <p class="text-limited"><?php echo $arrData['description'] ?></p>
                    <br>
                    <h5 class="special"> <strong>Precio: <?php echo $arrData['price'] ?>€</strong> </h5>


                </div>
            </div>
            <?php
        }
        ?>

    </div>
</section>
