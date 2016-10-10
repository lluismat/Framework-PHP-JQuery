////////////////////////////////////////////////////////////////
function load_products_ajax() {
    $.ajax({
        type: 'GET',
        url: "modules/products/controller/controller_products.class.php?load=true",
        //dataType: 'json',
        async: false
    }).success(function (data) {
        var json = JSON.parse(data);

        //alert(json.user.usuario);

        pintar_product(json);

    }).fail(function (xhr) {
        alert(xhr.responseText);
    });
}

////////////////////////////////////////////////////////////////
function load_products_get_v1() {
    $.get("modules/products/controller/controller_products.class.php?load=true", function (data, status) {
        var json = JSON.parse(data);
        //$( "#content" ).html( json.msje );
        //alert("Data: " + json.user.usuario + "\nStatus: " + status);

        pintar_product(json);
    });
}

////////////////////////////////////////////////////////////////
function load_products_get_v2() {
    var jqxhr = $.get("modules/products/controller/controller_products.class.php?load=true", function (data) {
        var json = JSON.parse(data);
        console.log(json);
        pintar_product(json);
        //alert( "success" );
    }).done(function () {
        //alert( "second success" );
    }).fail(function () {
        //alert( "error" );
    }).always(function () {
        //alert( "finished" );
    });

    jqxhr.always(function () {
        //alert( "second finished" );
    });
}

$(document).ready(function () {
    //load_users_ajax();
    //load_users_get_v1();
    load_products_get_v2();
});

function pintar_product(data) {
    //alert(data.user.avatar);
    var content = document.getElementById("content");
    var div_products = document.createElement("div");
    var parrafo = document.createElement("p");

    var msje = document.createElement("div");
    msje.innerHTML = "msje = ";
    msje.innerHTML += data.msje;

    var cod_prod = document.createElement("div");
    cod_prod.innerHTML = "ID_Product = ";
    cod_prod.innerHTML += data.products.cod_prod;

    var name_prod = document.createElement("div");
    name_prod.innerHTML = "name product = ";
    name_prod.innerHTML += data.products.name_prod;

    var description = document.createElement("div");
    description.innerHTML = "description = ";
    description.innerHTML += data.products.description;

    var color = document.createElement("div");
    color.innerHTML = "color = ";
    color.innerHTML += data.products.color;

    var ciudad = document.createElement("div");
    ciudad.innerHTML = "City = ";
    ciudad.innerHTML += data.products.ciudad;

    var comunidad = document.createElement("div");
    comunidad.innerHTML = "community = ";
    comunidad.innerHTML += data.products.comunidad;

    var pais = document.createElement("div");
    pais.innerHTML = "Country = ";
    pais.innerHTML += data.products.pais;

    var price = document.createElement("div");
    price.innerHTML = "Price = ";
    price.innerHTML += data.products.price;

    var date = document.createElement("div");
    date.innerHTML = "Entry Date = ";
    date.innerHTML += data.products.date;

    var date_c = document.createElement("div");
    date_c.innerHTML = "Expiration Date = ";
    date_c.innerHTML += data.products.date_c;

    var categoria = document.createElement("div");
    categoria.innerHTML = "Category = ";
    for(var i =0;i < data.products.categoria.length;i++){
    categoria.innerHTML += " - "+data.products.categoria[i];
    }

    //arreglar ruta IMATGE!!!!!

    var cad = data.products.avatar;
    //console.log(cad);
    //var cad = cad.toLowerCase();
    var img = document.createElement("div");
    var html = '<img src="' + cad + '" height="75" width="75"> ';
    img.innerHTML = html;
    //alert(html);

    div_products.appendChild(parrafo);
    parrafo.appendChild(msje);
    parrafo.appendChild(cod_prod);
    parrafo.appendChild(name_prod);
    parrafo.appendChild(description);
    parrafo.appendChild(color);
    parrafo.appendChild(categoria);
    parrafo.appendChild(ciudad);
    parrafo.appendChild(comunidad);
    parrafo.appendChild(pais);
    parrafo.appendChild(price);
    parrafo.appendChild(date);
    parrafo.appendChild(date_c);
    
    content.appendChild(div_products);
    content.appendChild(img);
}
