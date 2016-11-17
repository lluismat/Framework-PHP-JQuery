//$(document).ready(function () {
    $('.id_prod').click(function () {
        var id = this.getAttribute('id');
        //alert(id);

        $.get("index.php?module=products_frontend&function=idProduct&idProducto=" + id, function (data, status) {
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

        })
                .fail(function (xhr) {
                    $("#results").load("index.php?module=products_frontend&function=view_error_false&view_error=true");
                });
    });
