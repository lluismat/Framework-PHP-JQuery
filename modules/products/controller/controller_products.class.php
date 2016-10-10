<?php

  session_start();

  include ($_SERVER['DOCUMENT_ROOT'] . "/proyecto_v3/modules/products/utils/functions_products.inc.php");
  include ($_SERVER['DOCUMENT_ROOT'] . "/proyecto_v3/utils/upload.php");


  if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {

      $result_avatar = upload_files();
      $_SESSION['result_avatar'] = $result_avatar;
      //echo json_encode($result_avatar);
  }

  if ((isset($_POST['submit_products_json']))) {
	  submit_products();
	}

	function submit_products() {

	    	$jsondata = array();
	    	$productsJSON = json_decode($_POST["submit_products_json"], true);
        $result = validate_products($productsJSON);

				if (empty($_SESSION['result_avatar'])) {
		        $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
		    }
    	    	$result_avatar = $_SESSION['result_avatar'];

    	    	if (($result['resultado']) && ($result_avatar['resultado'])) {
                    $arrArgument = array(
                        'cod_prod' => ucfirst($result['datos']['cod_prod']),
                        'name_prod' => ucfirst($result['datos']['name_prod']),
                        'description' => $result['datos']['description'],
                        'color' => $result['datos']['color'],
                        'categoria' => $result['datos']['categoria'],
                        'ciudad' => strtoupper($result['datos']['ciudad']),
                        'comunidad' => strtoupper($result['datos']['comunidad']),
                        'pais' => strtoupper($result['datos']['pais']),
                        'price' => $result['datos']['price'],
                        'date' => $result['datos']['date'],
                        'date_c' => $result['datos']['date_c'],
                        'avatar' => $result_avatar['datos']
                    );

                    $mensaje = "Product has been successfully registered";

                    //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
                    $_SESSION['products'] = $arrArgument;
                    $_SESSION['msje'] = $mensaje;
                    $callback = "index.php?module=products&view=results";

                    $jsondata["success"] = true;
                    $jsondata["redirect"] = $callback;
                    echo json_encode($jsondata);
                    exit;
                } else {
                    //$error = $result['error'];
                    //$error_avatar = $result_avatar['error'];
                    $jsondata["success"] = false;
                    $jsondata["error"] = $result['error'];
                    $jsondata["error_avatar"] = $result_avatar['error'];

                    $jsondata["success1"] = false;
                    if ($result_avatar['resultado']) {
                        $jsondata["success1"] = true;
                        $jsondata["img_avatar"] = $result_avatar['datos'];
                    }
                    header('HTTP/1.0 400 Bad error');
                    echo json_encode($jsondata);
                }

/*
				//probes
	            $jsondata["success"] = true;
				$jsondata["name_prod"] = $productsJSON['name_prod'];
				$jsondata["redirect2"] = "asignando correctamente!!";
	            echo json_encode($jsondata);
	            exit;
	            */

			}


////////////////////////////
if (isset($_GET["delete"]) && $_GET["delete"] == true) {

    $_SESSION['result_avatar'] = array();
	$result = remove_files();
	//echo json_encode($result);
	if ($result === true) {
        echo json_encode(array("res" => true));
    } else {
        echo json_encode(array("res" => false));
    }

}
if (isset($_GET["load"]) && $_GET["load"] == true) {

    $jsondata = array();
    if (isset($_SESSION['products'])) {
        //echo debug($_SESSION['user']);
        $jsondata["products"] = $_SESSION['products'];
    }
    if (isset($_SESSION['msje'])) {
        //echo $_SESSION['msje'];
        $jsondata["msje"] = $_SESSION['msje'];
    }
    close_session();
    echo json_encode($jsondata);
    exit;
}

function close_session() {
    unset($_SESSION['products']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

/////////////////////////////////////////////////// load_data
if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {

    $jsondata = array();

    if (isset($_SESSION['products'])) {
        $jsondata["products"] = $_SESSION['products'];
        echo json_encode($jsondata);
        exit;
    } else {
        $jsondata["products"] = "";
        echo json_encode($jsondata);
        exit;
    }


}
