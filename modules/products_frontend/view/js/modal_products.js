//$(document).ready(function () {
    $('.id_prod').click(function () {
        var id = this.getAttribute('id');
        //alert(id);

        $.get("modules/products_frontend/controller/controller_products_frontend.class.php?idProducto=" + id, function (data, status) {
            var json = JSON.parse(data);
            var product = json.product;

            $('#results').html('');
            $('.pagination').html('');

            var img_prod = document.getElementById('img_prod');
            img_prod.innerHTML = '<img src="' + product.avatar + '" class="img-product"> ';

            var name_prod = document.getElementById('name_prod');
            name_prod.innerHTML = product.name_prod;
            var description_prod = document.getElementById('description_prod');
            description_prod.innerHTML = product.description;
            var color_prod = document.getElementById('color_prod');
            color_prod.innerHTML=product.color;
            var price_product = document.getElementById('price_prod');
            price_prod.innerHTML = "Price: " + product.price + " €";
            price_prod.setAttribute("class", "special");

/*
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
            */

        })
                .fail(function (xhr) {
                    $("#results").load("modules/products_frontend/controller/controller_products_frontend.class.php?view_error=true");
                });
    });
