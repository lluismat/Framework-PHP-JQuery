<script type="text/javascript" src="<?php echo PRODUCTS_JS_PATH ?>jquery.bootpag.min.js"></script>
<script type="text/javascript" src="<?php echo PRODUCTS_JS_PATH ?>list_products.js" ></script>
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


<section>
  <section >
      <div class="details" id="product">
              <div class="pull-left">
                  <div id="img_prod" class="avatardetail"></div>
              </div>
              <div class="media-body">
                  <div id="text-product">
                  <h3 class="media-heading title-product"  id="name_prod"></h3>
                  <p>
                  <div id="color_prod"></div>
                  </p>
                  <p class="text-limited" id="description_prod" ></p>
                  <br>
                  <h5> <strong  id="price_prod"></strong> </h5>
                  </div>

              </div>
      </div><br/><br/>
  </section>
