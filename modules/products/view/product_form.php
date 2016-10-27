

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
<script type="text/javascript" src="modules/products/view/js/controller_product.js" ></script>
<section id="home" class="head-main-img">

               <div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  OUR PRODUCTS </h1>
                </div>
               </div>
            </div>
       </section>


    <form id="products_form" name="products_form" >
        <center>
                <h1><p align=center>Enter a Product</h1>
                <br>

                <p align=center>ID_Product:<br>
                <input type="text" id="cod_prod" name="cod_prod" placeholder="product ID" required>
                <div id="e_codProd"></div>

                <p align=center>Name of product: <br>
                <input type="text" id="name_prod" name="name_prod" placeholder="name product" value="" required>
                <div id="e_nameProd"></div>

                <p align=center>Description:<br>
                <textarea name="description" id="description" placeholder="Description" rows="5" cols="60" required></textarea>
                <div id="e_description"></div>

                <p align=center>Color:<br>
                <input type="radio" class="color" name="color" id="color" value="rojo"> Rojo &nbsp
                 <input type="radio" class="color" name="color" id="color" value="azul"> Azul &nbsp
                 <input type="radio" class="color" name="color" id="color" value="verde"> Verde &nbsp
                 <div id="e_color"></div>
                 <br/><br/>

                <p align=center>Category:<br>
                <input type="checkbox" class="cat" name="categoria[]" id="categoria[]" value="computing"> Computing &nbsp
                 <input type="checkbox" class="cat" name="categoria[]" id="categoria[]" value="home_appliances"> Home Appliances &nbsp
                 <input type="checkbox" class="cat" name="categoria[]" id="categoria[]" value="clothes"> Clothes &nbsp
                 <div id="e_categoria"></div>
                 <br/><br/>

                        City: <br>
                        <select name="ciudad" id="ciudad" >

                        </select>
                        <div id="e_ciudad"></div>
                        <br/>
                        Province:<br>
                        <select name="province" id="province">

                        </select>
                        <div id="e_province"></div>
                        <br/>
                      Country:<br>

                      <select name="pais" id="pais">

                      </select>
                      <div id="e_pais"></div>
                      <br/>

                <p align=center>Price: <br><input type="text" id="price" name="price" placeholder="Price" required>
                  <div id="e_price"></div>
                <p align=center>Entry Date:<br><input id="date" type="text" name="date" placeholder="Enter Date" readonly><br>
                  <div id="e_date"></div>
                <p align=center>Expiration Date:<br><input id="date_c" type="text" name="date_c" placeholder="Expiration Date" readonly><br>
                  <div id="e_date_c"></div>

        <br />
        <br />
        <br />
        <br />

        <div class="form-group" id="progress">
            <div id="bar"></div>
            <div id="percent">0%</div >
        </div>

        <div class="msg"></div>
        <br/>
        <table width="60%">
          <tr><td align="center"><div id="dropzone" class="dropzone" ></div><br/></td></tr>
        </table>
        <br/>
        <br/>
        <br/>
    </div>
  <button type="button" class="btn btn-primary" id="submit_prod" name="submit_prod" value="submit" size=12/>Crear Producto</button>
  &nbsp&nbsp&nbsp
  <a href="index.php?module=main" class="btn btn-primary"> Cancelar</a>
<br><br><br>
    </center>
    </form>
