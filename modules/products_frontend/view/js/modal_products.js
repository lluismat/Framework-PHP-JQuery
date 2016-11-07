//$(document).ready(function () {
    $('.id_prod').click(function () {
        var id = this.getAttribute('id');
        //alert(id);

        $.get("modules/products_frontend/controller/controller_products_frontend.class.php?idProducto=" + id, function (data, status) {
            var json = JSON.parse(data);
            var product = json.product;

            $('#results').html('');
            $('.pagination_prods').html('');

            var img_prod = document.getElementById('img_prod');
            img_prod.innerHTML = '<img src="' + product.avatar + '" class="img-product"> ';

            var name_prod = document.getElementById('name_prod');
            name_prod.innerHTML = product.name_prod;
            var description_prod = document.getElementById('description_prod');
            description_prod.innerHTML = product.description;
            var price_product = document.getElementById('price_prod');
            price_prod.innerHTML = "Price: " + product.price + " €";
            price_prod.setAttribute("class", "special");

           /* $("#product").dialog({
                width: 890, //<!-- -------------> ancho de la ventana -->
                height: 550, /*<!--  -------------> altura de la ventana -->
                //show: "scale", <!-- -----------> animación de la ventana al aparecer -->
                //hide: "scale", <!-- -----------> animación al cerrar la ventana -->
                resizable: "false", // <!-- ------> fija o redimensionable si ponemos este valor a "true" -->
                //position: "down",<!--  ------> posicion de la ventana en la pantalla (left, top, right...) -->
                modal: "true", //<!-- ------------> si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
                buttons: {
                    Ok: function () {
                        $(this).dialog("close");
                    }
                },
                show: {
                    effect: "scale",
                    duration: 1000,
                    percent: 100
                },
                hide: {
                    effect: "scale",
                    duration: 1000,
                    percent: 0
                }

            });*/
        })
                .fail(function (xhr) {
                    $("#results").load("modules/products_frontend/controller/controller_products_frontend.class.php?view_error=true");
                });
    });
//});

/*
//we do this so that  details_prod don't appear
$("#details_prod").hide();
//$(document).ready( function () {
  console.log("hola");
    $('.id_prod').click(function () {
        var id = this.getAttribute('id');
        console.log(id);
        //alert(id);

        $.get("modules/products_frontend/controller/controller_products_frontend.class.php?idProduct=" + id, function (data, status) {
            var json = JSON.parse(data);
            var product = json.product;
            //alert(product.name);
            //console.log(product);

            $("#img_prod").html('<img src="' + product.avatar + '" height="75" width="75"> ');
            $("#name_prod").html(product.name_prod);
            $("#description_prod").html("<strong>Description: <br/></strong>" + product.description);
            $("#color_prod").html("<strong>Color:</strong>" + product.color);
            $("#price_prod").html("Price: " + product.price + " €");

            //we do this so that  details_prod  appear
            $("#details_prod").show();


            $("#product").dialog({
                width: 850, //<!-- ------------- ancho de la ventana -->
                height: 500, //<!--  ------------- altura de la ventana -->
                //show: "scale", //<!-- ----------- animación de la ventana al aparecer -->
                //hide: "scale", //<!-- ----------- animación al cerrar la ventana -->
                resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
                //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
                modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
                buttons: {
                    Ok: function () {
                        $(this).dialog("close");
                    }
                },
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                }
            });
        })
                .fail(function (xhr) {
                    //if  we already have an error 404
                    if (xhr.status === 404) {
                        $("#results").load("modules/products_frontend/controller/controller_products_frontend.class.php?view_error=false");
                    } else {
                        $("#results").load("modules/products_frontend/controller/controller_products_frontend.class.php?view_error=true");
                    }
                });
    });
//});
*/
