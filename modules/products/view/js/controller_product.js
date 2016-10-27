
jQuery.fn.fill_or_clean = function () {

     this.each(function () {

        //codigo producto

        if ($("#cod_prod").val() === "") {
            $("#cod_prod").val("Enter the code of the product");
            $("#cod_prod").focus(function () {
                if ($("#cod_prod").val() == "Enter the code of the product") {
                    $("#cod_prod").val("");
                }
            });
        }

        $("#cod_prod").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#cod_prod").val() === "") {
                $("#cod_prod").val("Enter the code of the product");
            }
        });

        //nombre producto

        if ($("#name_prod").val() === "") {
            $("#name_prod").val("Enter the product name");
            $("#name_prod").focus(function () {
                if ($("#name_prod").val() == "Enter the product name") {
                    $("#name_prod").val("");
                }
            });
        }
        $("#name_prod").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#name_prod").val() === "") {
                $("#name_prod").val("Enter the product name");
            }
        });

        //description

        if ($("#description").val() === "") {
            $("#description").val("Enter the description of the product");
            $("#description").focus(function () {
                if ($("#description").val() == "Enter the description of the product") {
                    $("#description").val("");
                }
            });
        }
        $("#description").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#description").val() === "") {
                $("#description").val("Enter the description of the product");
            }
        });

        //fecha entrada

        if ($("#date").val() === "") {
            $("#date").val("Enter the entry date");
            $("#date").focus(function () {
                if ($("#date").val() == "Enter the entry date") {
                    $("#date").val("");
                }
            });
        }
        $("#date").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#date").val() === "") {
                $("#date").val("Enter the entry date");
            }
        });


        //fecha de caducidad

        if ($("#date_c").val() === "") {
            $("#date_c").val("Enter the expiration date");
            $("#date_c").focus(function () {
                if ($("#date_c").val() == "Enter the expiration date") {
                    $("#date_c").val("");
                }
            });
        }
        $("#date_c").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#date_c").val() === "") {
                $("#date_c").val("Enter the expiration date");
            }
        });

        //precio

               if ($("#price").val() === "") {
            $("#price").val("Enter the price of the product");
            $("#price").focus(function () {
                if ($("#price").val() == "Enter the price of the product") {
                    $("#price").val("");
                }
            });
        }
        $("#price").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#price").val() === "") {
                $("#price").val("Enter the price of the product");
            }
        });

     });//each
     return this;
};//function

Dropzone.autoDiscover = false;
$(document).ready(function () {
//console.log("entra en ready");

//Datepicker
$("#date").datepicker({
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true,
});
$("#date_c").datepicker({
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true
});


  $("#submit_prod").click(function () {
      validate_products();
        });


        //Control de seguridad para evitar que al volver atrás de la pantalla results a create, no nos imprima los datos

        $.get("modules/products/controller/controller_products.class.php?load_data=true",
                function (response) {
                    if (response.products === "") {

                        $("#cod_prod").val('');
                        $("#name_prod").val('');
                        $("#description").val('');
                        $("#ciudad").val('Select City');
                        $("#province").val('Select Province');
                        $("#pais").val('Select Country');
                        $("#price").val('');
                        $("#date").val('');
                        $("#date_c").val('');
                        var inputElements = document.getElementsByClassName('color');
                        for (var i = 0; i < inputElements.length; i++) {
                            if (inputElements[i].checked) {
                                inputElements[i].checked = false;
                            }
                        }

                        var inputElements = document.getElementsByClassName('cat');
                        for (var i = 0; i < inputElements.length; i++) {
                            if (inputElements[i].checked) {
                                inputElements[i].checked = false;
                            }
                        }

                        //siempre que creemos un plugin debemos llamarlo, sino no funcionará
                        $(this).fill_or_clean();
                    } else {
                        $("#cod_prod").val(response.products.cod_prod);
                        $("#name_prod").val(response.products.name_prod);
                        $("#description").val( response.products.description);
                        $("#ciudad").val( response.products.ciudad);
                        $("#province").val( response.products.province);
                        $("#pais").val( response.products.pais);
                        $("#price").val( response.products.price);
                        $("#date").val( response.products.date);
                        $("#date_c").val( response.products.date_c);

                        var color = response.products.color;
                        var inputElements = document.getElementsByClassName('color');
                        for (var i = 0; i < color.length; i++) {
                            for (var j = 0; j < inputElements.length; j++) {
                                if(color[i] ===inputElements[j] )
                                    inputElements[j].checked = true;
                            }
                        }

                        var categoria = response.products.categoria;
                        var inputElements = document.getElementsByClassName('cat');
                        for (var i = 0; i < categoria.length; i++) {
                            for (var j = 0; j < inputElements.length; j++) {
                                if(categoria[i] ===inputElements[j] )
                                    inputElements[j].checked = true;
                            }
                        }

                    }
                }, "json");

        //Dropzone function //////////////////////////////////
        $("#dropzone").dropzone({
            url: "modules/products/controller/controller_products.class.php?upload=true",
            addRemoveLinks: true,
            maxFileSize: 1000,
            dictResponseError: "An error has occurred on the server",
            acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
            init: function () {
                this.on("success", function (file, response) {
                    console.log(response);

                    $("#progress").show();
                    $("#bar").width('100%');
                    $("#percent").html('100%');
                    $('.msg').text('').removeClass('msg_error');
                    $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);

                });
            },
            complete: function (file) {

            },
            error: function (file) {

            },
            removedfile: function (file, serverFileName) {
                var name = file.name;
                $.ajax({
                    type: "POST",
                    url: "modules/products/controller/controller_products.class.php?delete=true",
                    data: "filename=" + name,
                    success: function (data) {

                        $("#progress").hide();
                        $('.msg').text('').removeClass('msg_ok');
                        $('.msg').text('').removeClass('msg_error');
                        $("#e_avatar").html("");

                        var json = JSON.parse(data);


                        //console.log(data);

                        if (json.res === true) {

                            var element;
                            if ((element = file.previewElement) != null) {
                                element.parentNode.removeChild(file.previewElement);
                                //alert("Imagen eliminada: " + name);
                            } else {
                                false;
                            }
                        } else { //json.res == false, elimino la imagen también
                            var element;
                            if ((element = file.previewElement) != null) {

                                element.parentNode.removeChild(file.previewElement);
                            } else {
                                false;
                            }
                        }

                    }
                });
            }
        });

        load_countries_v1();
        $("#province").empty();
        $("#province").append('<option value="" selected="selected">Select Province</option>');
        $("#province").prop('disabled', true);
        $("#ciudad").empty();
        $("#ciudad").append('<option value="" selected="selected">Select City</option>');
        $("#ciudad").prop('disabled', true);

        $("#pais").change(function() {
    		var pais = $(this).val();
    		var province = $("#province");
    		var ciudad = $("#ciudad");

    		if(pais !== 'ES'){
    	         province.prop('disabled', true);
    	         ciudad.prop('disabled', true);
    	         $("#province").empty();
    		     $("#ciudad").empty();
    		}else{
    	         province.prop('disabled', false);
    	         ciudad.prop('disabled', false);
    	         load_provincias_v1();
    		}//fi else
    	});

    	$("#province").change(function() {
    		var prov = $(this).val();
    		if(prov > 0){
    			load_poblaciones_v1(prov);
    		}else{
    			$("#ciudad").prop('disabled', false);
    		}
    	});

        var date_reg = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
        var name_reg = /^[A-Za-z0-9]{2,30}$/;
        var string_reg = /^[A-Za-zñÑ\s]{2,250}$/;
        var num_reg= /^[0-9]{4,10}$/;
        var price_reg = /^[0-9]+([,][0-9]+)?$/;


            $("#cod_prod").keyup(function () {
                if ($(this).val() != "" && num_reg.test($(this).val())) {
                    $(".error").fadeOut();
                    return false;
                }
            });

            $("#name_prod").keyup(function () {
                if ($(this).val() != "" && name_reg.test($(this).val())) {
                    $(".error").fadeOut();
                    return false;
                }
            });

            $("#description").keyup(function () {
                if ($(this).val() != "" && string_reg.test($(this).val())) {
                    $(".error").fadeOut();
                    return false;
                }
            });

            $("#price").keyup(function () {
                if ($(this).val() != "" && price_reg.test($(this).val())) {
                    $(".error").fadeOut();
                    return false;
                }
            });

            $("#date, #date_c").keyup(function () {
                if ($(this).val() != "" && date_reg.test($(this).val())) {
                    $(".error").fadeOut();
                    return false;
                }
            });

            });

            function validate_pais(pais) {
                if (pais == null) {
                    //return 'default_pais';
                    return false;
                }
                if (pais.length == 0) {
                    //return 'default_pais';
                    return false;
                }
                if (pais === 'Select Country') {
                    //return 'default_pais';
                    return false;
                }
                if (pais.length > 0) {
                    var regexp = /^[a-zA-Z]*$/;
                    return regexp.test(pais);
                }
                return false;
            }
            function validate_province(province) {
                if (province == null) {
                    return 'default_province';
                }
                if (province.length == 0) {
                    return 'default_province';
                }
                if (province === 'Select Province') {
                    //return 'default_provincia';
                    return false;
                }
                if (province.length > 0) {
                    var regexp = /^[a-zA-Z0-9, ]*$/;
                    return regexp.test(province);
                }
                return false;
            }
            function validate_ciudad(ciudad) {
                if (ciudad == null) {
                    return 'default_city';
                }
                if (ciudad.length == 0) {
                    return 'default_city';
                }
                if (ciudad === 'Select City') {
                    //return 'default_ciudad';
                    return false;
                }
                if (ciudad.length > 0) {
                    var regexp = /^[a-zA-Z/, -'()]*$/;
                    return regexp.test(ciudad);
                }
                return false;
            }

function validate_products(){

  var result=true;

  var cod_prod = document.getElementById('cod_prod').value;
  var name_prod = document.getElementById('name_prod').value;
  var description = document.getElementById('description').value;
  var color = document.getElementById('color').value;
  var ciudad = document.getElementById('ciudad').value;
  var province = document.getElementById('province').value;
  var pais = document.getElementById('pais').value;
  var date = document.getElementById('date').value;
  var date_c = document.getElementById('date_c').value;
  var price = document.getElementById('price').value;


  var categoria = [];
  var inputElements = document.getElementsByClassName('cat');
  var j = 0;
  for (var i = 0; i < inputElements.length; i++) {
      if (inputElements[i].checked) {
          categoria[j] = inputElements[i].value;
          j++;
      }
  }

  var date_reg = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
  var name_reg = /^[A-Za-z0-9]{2,30}$/;
  var string_reg = /^[A-Za-zñÑ\s]{2,250}$/;
  var num_reg= /^[0-9]{2,10}$/;
  var price_reg = /^[0-9]+([,][0-9]+)?$/;

  var v_pais = validate_pais(pais);
	var v_province = validate_province(province);
	var v_ciudad = validate_ciudad(ciudad);

  $(".error").remove();

  if (!v_pais) {
      document.getElementById('e_pais').innerHTML = "<span  class='error'>Select Country</span>";
      result = false;
  } else {
      document.getElementById('e_pais').innerHTML = "";
  }

  if (!v_province) {
      document.getElementById('e_province').innerHTML = "Select Province";
      result = false;
  } else {
      document.getElementById('e_province').innerHTML = "";
  }

  if (!v_ciudad) {
      document.getElementById('e_ciudad').innerHTML = "Select City";
      result = false;
  } else {
      document.getElementById('e_ciudad').innerHTML = "";
  }


  if ($("#cod_prod").val() === "" || $("#cod_prod").val() === "Enter the code of the product") {
      $("#cod_prod").focus().after("<span class='error'>Enter the code of product</span>");
      result=false;
      return false;
  } else if (!num_reg.test($("#cod_prod").val())) {
      $("#cod_prod").focus().after("<span class='error'>ID_product must be 4 to 10 numbers</span>");
      result=false;
      return false;
  }
  else if ($("#name_prod").val() === "" || $("#name_prod").val() === "Enter the name product") {
      $("#name_prod").focus().after("<span class='error'>Enter the name product</span>");
      result=false;
      return false;
  } else if (!name_reg.test($("#name_prod").val())) {
      $("#name_prod").focus().after("<span class='error'>Enter name must be 2 to 30 letters</span>");
      result=false;
      return false;
  }

  else if ($("#description").val() === "" || $("#description").val() === "Enter the description") {
      $("#description").focus().after("<span class='error'>Enter the description</span>");
      result=false;
      return false;
  } else if (!string_reg.test($("#descripton").val())) {
      $("#description").focus().after("<span class='error'>Description must be 2 to 250 letters</span>");
      result=false;
      return false;
  }
  if ($("#price").val() === "" || $("#price").val() === "Enter the price of the product") {
      $("#price").focus().after("<span class='error'>Enter the price of the product</span>");
      result=false;
      return false;
  } else if (!price_reg.test($("#price").val())) {
      $("#price").focus().after("<span class='error'>The price must be 1 to 10 numbers.</span>");
      result=false;
      return false;
  }

  else if ($("#date").val() === "" || $("#date").val() === "Enter the date") {
      $("#date").focus().after("<span class='error'>Enter the date</span>");
      result=false;
      return false;
  } else if (!date_reg.test($("#date").val())) {
      $("#date").focus().after("<span class='error'>error format date (dd/mm/yyyy)</span>");
      result=false;
      return false;
  }

  else if ($("#date_c").val() === "" || $("#date_c").val() === "Enter the expiration date") {
      $("#date_c").focus().after("<span class='error'>Enter the expiration date</span>");
      result=false;
      return false;
  } else if (!date_reg.test($("#date_c").val())) {
      $("#date_c").focus().after("<span class='error'>error format date (dd/mm/yyyy)</span>");
      result=false;
      return false;
  }

  else if ($("#ciudad").val() === "" || $("#ciudad").val() === "Select City") {
      $("#ciudad").focus().after("<span class='error'>Select City</span>");
      result=false;
      return false;
  }
  else if ($("#province").val() === "" || $("#province").val() === "Select Province") {
      $("#province").focus().after("<span class='error'>Select Province</span>");
      result=false;
      return false;
  }
  else if ($("#pais").val() === "" || $("#pais").val() === "Select Country") {
      $("#pais").focus().after("<span class='error'>Select Country</span>");
      result=false;
      return false;
  }

          //Si ha ido todo bien, se envian los datos al servidor
          //console.log("antes de que sen evie al servidor");
          if (result) {

            if (province == null) {
                province = 'default_province';
            }else if (province.length == 0) {
                province = 'default_province';
            }else if (province === 'Select Province') {
                return 'default_province';
            }

            if (ciudad == null) {
                ciudad = 'default_city';
            }else if (ciudad.length == 0) {
                ciudad = 'default_city';
            }else if (ciudad === 'Select City') {
                return 'default_City';
            }
            //console.log(result);
            var data={"cod_prod":cod_prod,"name_prod": name_prod,"description": description, "color": color, "categoria": categoria, "ciudad": ciudad,
            "province": province, "pais": pais, "price": price,"date": date, "date_c": date_c};
              var data_products_JSON = JSON.stringify(data);
              //console.log(data);
              $.post('modules/products/controller/controller_products.class.php',
                      {submit_products_json: data_products_JSON},
              function (response) {
                console.log(response);
                //console.log(response.redirect3.name_prod);
                if (response.success) {
                    window.location.href = response.redirect;
                }
              },"json").fail(function (xhr) {
                console.log(xhr);

                if (xhr.responseJSON.error.cod_prod)
                     $("#e_codProd").focus().after("<span  class='error1'>" + xhr.responseJSON.error.cod_prod + "</span>");

                if (xhr.responseJSON.error.name_prod)
                     $("#e_nameProd").focus().after("<span  class='error1'>" + xhr.responseJSON.error.name_prod + "</span>");

                if (xhr.responseJSON.error.description)
                     $("#e_description").focus().after("<span  class='error1'>" + xhr.responseJSON.error.description + "</span>");

                if (xhr.responseJSON.error.color)
                     $("#e_color").focus().after("<span  class='error'>" + xhr.responseJSON.error.color + "</span>");

                if (xhr.responseJSON.error.categoria)
                     $("#e_categoria").focus().after("<span  class='error'>" + xhr.responseJSON.error.categoria + "</span>");

                if (xhr.responseJSON.error.ciudad)
                     $("#e_ciudad").focus().after("<span  class='error'>" + xhr.responseJSON.error.ciudad + "</span>");

                if (xhr.responseJSON.error.province)
                     $("#e_province").focus().after("<span  class='error'>" + xhr.responseJSON.error.province + "</span>");

                if (xhr.responseJSON.error.pais)
                    $("#e_pais").focus().after("<span  class='error'>" + xhr.responseJSON.error.pais + "</span>");

                if (xhr.responseJSON.error.price)
                     $("#e_price").focus().after("<span  class='error1'>" + xhr.responseJSON.error.price + "</span>");

                if (xhr.responseJSON.error.date)
                     $("#e_date").focus().after("<span  class='error1'>" + xhr.responseJSON.error.date + "</span>");

                if (xhr.responseJSON.error.date_c)
                     $("#e_date_c").focus().after("<span  class='error1'>" + xhr.responseJSON.error.date_c + "</span>");

                if (xhr.responseJSON.error_avatar)
                $("#dropzone").focus().after("<span  class='error1'>" + xhr.responseJSON.error_avatar + "</span>");

            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/proyecto_v3/media/default-avatar.png") {
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({'right': '300px'}, 300);

            }


        });
    }

}//fi validate_products

function load_countries_v2(cad) {
    $.getJSON( cad, function(data) {
      $("#pais").empty();
      $("#pais").append('<option value="" selected="selected">Select Country</option>');

      $.each(data, function (i, valor) {
        $("#pais").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
      });
    })
    .fail(function() {
        alert( "error load_countries" );
    });
}

function load_countries_v1() {
    $.get( "modules/products/controller/controller_products.class.php?load_pais=true",
        function(response) {
            console.log(response);
            if(response === 'error'){
                load_countries_v2("resources/ListOfCountryNamesByName.json");
            }else{
                load_countries_v2("modules/products/controller/controller_products.class.php?load_pais=true"); //oorsprong.org
            }
    })
    .fail(function(response) {

        load_countries_v2("resources/ListOfCountryNamesByName.json");
    });
}

function load_provincias_v2() {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
	    $("#province").empty();
	    $("#province").append('<option value="" selected="selected">Select Province</option>');

        $(xml).find("province").each(function () {
            var id = $(this).attr('id');
            var nombre = $(this).find('nombre').text();
            $("#province").append("<option value='" + id + "'>" + nombre + "</option>");
        });
    })
    .fail(function() {
        alert( "error load_provincias" );
    });
}

function load_provincias_v1() { //provinciasypoblaciones.xml - xpath
    $.get( "modules/products/controller/controller_products.class.php?load_provincias=true",
        function( response ) {
            $("#province").empty();
	        $("#province").append('<option value="" selected="selected">Select Province</option>');

            //alert(response);
            var json = JSON.parse(response);
		    var province=json.province;
		    //alert(provincias);
		    //console.log(provincias);

		    //alert(provincias[0].id);
		    //alert(provincias[0].nombre);

            if(province === 'error'){
                load_provincias_v2();
            }else{
                for (var i = 0; i < province.length; i++) {
        		    $("#province").append("<option value='" + province[i].id + "'>" + province[i].nombre + "</option>");
    		    }
            }
    })
    .fail(function(response) {
        load_provincias_v2();
    });
}

function load_poblaciones_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
		$("#ciudad").empty();
	    $("#ciudad").append('<option value="" selected="selected">Select City</option>');

		$(xml).find('provincia[id=' + prov + ']').each(function(){
    		$(this).find('localidad').each(function(){
    			 $("#ciudad").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
    		});
        });
	})
	.fail(function() {
        alert( "error load_poblaciones" );
    });
}

function load_poblaciones_v1(prov) { //provinciasypoblaciones.xml - xpath
    var datos = { idPoblac : prov  };
	$.post("modules/products/controller/controller_products.class.php", datos, function(response) {
	  //console.log(response);
    var json = JSON.parse(response);
		var ciudad=json.ciudad;
		//alert(ciudad);
		//console.log(ciudad);
		//alert(ciudad[0].poblacion);

		$("#ciudad").empty();
	    $("#ciudad").append('<option value="" selected="selected">Select City</option>');

        if(ciudad === 'error'){
            load_poblaciones_v2(prov);
        }else{
            for (var i = 0; i < ciudad.length; i++) {
        		$("#ciudad").append("<option value='" + ciudad[i].ciudad + "'>" + ciudad[i].ciudad + "</option>");
    		}
        }
	})
	.fail(function() {
        load_poblaciones_v2(prov);
    });
}
