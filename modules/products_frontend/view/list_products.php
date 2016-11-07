<script type="text/javascript" src="modules/products_frontend/view/js/jquery.bootpag.min.js"></script>
<script type="text/javascript" src="modules/products_frontend/view/js/list_products.js" ></script>
<section id='home' class='head-main-img'>
<div class='container'>
           <div class='row text-center pad-row' >
            <div class='col-md-12'>
              <h1> LIST PRODUCTS </h1>
                </div>
               </div>
            </div>
       </section>
<br/><br/>
       <center>
         <div id='search-box'>
           <form name="search_prod" id="search_prod" class="search_prod">
           <input type="text" value="" placeholder="Search Product ..." class="input_search" id="keyword" list="datalist">
           <input name="Submit" id="Submit" class="button_search" type="button" value="Search"/>
         </form>
       </div>
       </center>

<div id="results"></div>

<center>
    <div class="pagination"></div>
</center>

<!-- modal window details_product -->
<section id="product">

    <div id="details_prod" hidden>

        <!--<ol class="breadcrumb">
            <li><a href="index.php?module=products">Products</a></li>
            <li class="active">Details Product</li>
        </ol>
        <br>
        <br>-->
        <div id="details">


            <div id="img_prod" class="prodImg"></div>

            <div id="container">

                <h4> <strong><div id="name_prod"></div></strong> </h4>
                <br />
                <p>
                <div id="color_prod"></div>
                </p>
                <p>
                <div id="description_prod"></div>
                </p>
                <h2> <strong><div id="price_prod"></div></strong> </h5>

            </div>

        </div>

    </div>
</section>
