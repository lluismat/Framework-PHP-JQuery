<?php

class controller_products_frontend{

  public function __construct() {
      include(FUNCTIONS_PRODUCTS . "utils.inc.php");
      include(UTILS . "upload.php");
      include(UTILS . "common.inc.php");
      include LOG_DIR;
    include(UTILS . "filters.inc.php");
    include(UTILS . "utils.inc.php");
    include(UTILS . "response_code.inc.php");

    $_SESSION['module'] = "products_frontend";
  }

  public function list_products() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/products_frontend/view/','list_products.php');

    require_once(VIEW_PATH_INC."footer.html");

  }

  public function autocomplete(){
    if ((isset($_GET["autocomplete"])) && ($_GET["autocomplete"] === "true")) {
        set_error_handler('ErrorHandler');

        try {
            $nameProducts = loadModel(MODEL_PRODUCTS, "products_model", "select_column_products", "name_prod");
        } catch (Exception $e) {
            showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
        }
        restore_error_handler();

        if ($nameProducts) {
            $jsondata["nom_productos"] = $nameProducts;
            echo json_encode($jsondata);
            exit;
        } else {

            showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
        }
    }
  }

  public function nom_products(){
    if (($_GET["name_products"])) {
        //filtrar $_GET["nom_product"]
        $result = filter_string($_GET["name_products"]);
        if ($result['resultado']) {
            $criteria = $result['datos'];
        } else {
            $criteria = '';
        }
        set_error_handler('ErrorHandler');
        try {

            $arrArgument = array(
                "column" => "name_prod",
                "like" => $criteria
            );
            $producto = loadModel(MODEL_PRODUCTS, "products_model", "select_like_products", $arrArgument);


            //throw new Exception(); //que entre en el catch
        } catch (Exception $e) {
            showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
        }
        restore_error_handler();

        if ($producto) {
            $jsondata["product_autocomplete"] = $producto;
            echo json_encode($jsondata);
            exit;
        } else {
            showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
        }
    }
  }

  public function count_products(){
    if (isset($_GET["count_product"])) {

        $result = filter_string($_GET["count_product"]);
        if ($result['resultado']) {
            $criteria = $result['datos'];
        } else {
            $criteria = '';
        }
        set_error_handler('ErrorHandler');
        try {

            $arrArgument = array(
                "column" => "name_prod",
                "like" => $criteria
            );
            $result = loadModel(MODEL_PRODUCTS, "products_model", "count_like_products", $arrArgument);
            //throw new Exception(); //que entre en el catch
        } catch (Exception $e) {
            showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
        }
        restore_error_handler();

        if ($result) {
            $jsondata["num_products"] = $result[0]["total"];
            echo json_encode($jsondata);
            exit;
        } else {
            //if($total_rows){ //que lance error si no existe el producto
            showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
        }
      }
    }

    public function num_pages(){
      //obtain num total pages
      if ((isset($_GET["num_pages"])) && ($_GET["num_pages"] === "true")) {

          if (isset($_GET['keyword'])) {
            $result = filter_string($_GET['keyword']);
            if ($result['resultado']) {
              $criteria = $result['datos'];
            } else {
              $criteria = '';
            }
          } else {
            $criteria = '';
          }

          $item_per_page = 6;

          //change work error apache
          set_error_handler('ErrorHandler');

          try {
              $arrArgument = array(
                  "column" => "name_prod",
                  "like" => $criteria
              );
              //throw new Exception();
              $result = loadModel(MODEL_PRODUCTS, "products_model", "count_like_products", $arrArgument);
              $get_result = $result[0]["total"]; //total records
              $pages = ceil($get_result / $item_per_page); //break total records into pages
              //ceil redondea fracciones hacia arriba
          } catch (Exception $e) {
              showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
          }
          //change to defualt work error apache
          restore_error_handler();

          if ($get_result) {
              $jsondata["pages"] = $pages;
              echo json_encode($jsondata);
              exit;
          } else {
              showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
          }
      }/////END num_pages
    }

    public function view_error_true(){
      if ((isset($_GET["view_error"])) && ($_GET["view_error"] === "true")) {
          showErrorPage(0, "ERROR - 503 BD Unavailable", 503);
      }
    }

    public function view_error_false(){
      if ((isset($_GET["view_error"])) && ($_GET["view_error"] === "false")) {
          showErrorPage(3, "RESULTS NOT FOUND <br> Please, check over if you misspelled any letter of the search word");
      }
    }

    public function idProduct(){
      ///Coge el cod_prod
      if ($_GET["idProducto"]) {

          $result = filter_num_int($_GET["idProducto"]);
          if ($result['resultado']) {
              $id = $result['datos'];
          } else {
              $id = 1;
          }
          set_error_handler('ErrorHandler');
          try {
              $producto = false;

              $producto = loadModel(MODEL_PRODUCTS, "products_model", "details_products", $id);
          } catch (Exception $e) {
              //header('HTTP/1.0 503 Service Unavailable', true, 503);
              // loadView("503");
              showErrorPage(2, "ERROR - 503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
          }
          restore_error_handler();
          if ($producto) {
              $jsondata["product"] = $producto[0];
              echo json_encode($jsondata);
              exit;
          } else {
              showErrorPage(2, "ERROR - 404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
          }
      }
    }

    public function obtain_products(){
      if (isset($_POST["page_num"])) {
          $result = filter_num_int($_POST["page_num"]);
          if ($result['resultado']) {
              $page_number = $result['datos'];
          }
      } else {
          $page_number = 1;
      }
      $item_per_page = 6;

      if (isset($_GET["keyword"])) {
          $result = filter_string($_GET["keyword"]);
          if ($result['resultado']) {
              $criteria = $result['datos'];
          } else {
              $criteria = '';
          }
      } else {
          $criteria = '';
      }

      if (isset($_POST["keyword"])) {
          $result = filter_string($_POST["keyword"]);
          if ($result['resultado']) {
              $criteria = $result['datos'];
          } else {
              $criteria = '';
          }
      }

      $position = (($page_number - 1) * $item_per_page);

      $limit = $item_per_page;
      $arrArgument = array(
          "column" => "name_prod",
          "like" => $criteria,
          "position" => $position,
          "limit" => $limit
      );
      set_error_handler('ErrorHandler');
      try {

          $resultado = loadModel(MODEL_PRODUCTS, "products_model", "select_like_limit_products", $arrArgument);

          } catch (Exception $e) {

          showErrorPage(0, "ERROR - 503 BD Unavailable", 503);
      }
      restore_error_handler();

      if ($resultado) {
          paint_template_products($resultado);
      } else {
          showErrorPage(0, "ERROR - 404 NO PRODUCTS", 404);
      }
      }
    }
}
