<section >
  <section id="home" class="head-main-img">

                 <div class="container">
             <div class="row text-center pad-row" >
              <div class="col-md-12">
                <h1>  List PRODUCTS </h1>
                  </div>
                 </div>
              </div>
         </section>
    <div class="container">
        <div id="list_prod" class="row text-center pad-row">
            <ol class="breadcrumb">
                <li class="active" >Products</li>
            </ol>
            <br>
            <br>
            <br>
            <br>
            <?php
            if (isset($arrData) && !empty($arrData)) {
                foreach ($arrData as $product) {
                    //echo $productos['id'] . " " . $productos['nombre'] . "</br>";
                    //echo $productos['descripcion'] . " " . $productos['precio'] . "</br>";
                    ?>
                    <a id="prod" href="index.php?module=products&idProduct=<?php echo $product['cod_prod'] ?>" >
                        <img class="prodImg" src=<?php echo $product['avatar'] ?> alt="product" >
                        <p><?php echo $product['name_prod'] ?></p>
                        <p id="p2"><?php echo $product['price'] ?>€</p>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
