<?php
class productsDAO {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_products_DAO($db, $arrArgument) {
        $cod_prod = $arrArgument['cod_prod'];
        $name_prod = $arrArgument['name_prod'];
        $description = $arrArgument['description'];
        $color = $arrArgument['color'];
        $category = $arrArgument['categoria'];
        $city = $arrArgument['ciudad'];
        $province = $arrArgument['province'];
        $country = $arrArgument['pais'];
        $price = $arrArgument['price'];
        $entry_date = $arrArgument['date'];
        $expiration_date = $arrArgument['date_c'];
        $avatar = $arrArgument['avatar'];

        $computing= 0;
        $home_appliances = 0;
        $clothes = 0;

        foreach ($category as $indice) {
            if ($indice === 'computing')
                $computing = 1;
            if ($indice === 'home_appliances')
                $home_appliances= 1;
            if ($indice === 'clothes')
                $clothes = 1;
        }

        $sql = "INSERT INTO products (cod_prod,name_prod,description,color,"
                . " city, province, country, price,computing,home_appliances,clothes,entry_date,expiration_date,avatar"
                . " ) VALUES ($cod_prod, '$name_prod', '$description',"
                . " '$color', '$city', '$province', '$country', $price, $computing, $home_appliances, $clothes, '$entry_date',"
                . "'$expiration_date' '$avatar')";

        return $db->ejecutar($sql);
        //return json_encode($sql);

    }

    public function obtain_paises_DAO($url) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);

        return ($file_contents) ? $file_contents : FALSE;
    }

    public function obtain_provincias_DAO() {
        $json = array();
        $tmp = array();

    $provinces = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/proyecto_v3/resources/provinciasypoblaciones.xml");
    $result = $provinces->xpath("/lista/provincia/nombre | /lista/provincia/@id");
    for ($i=0; $i<count($result); $i+=2) {
      $e=$i+1;
      $province=$result[$e];

      $tmp = array(
        'id' => (string) $result[$i], 'nombre' => (string) $province
      );
      array_push($json, $tmp);
    }
        return $json;
    }

    public function obtain_poblaciones_DAO($arrArgument) {
        $json = array();
        $tmp = array();

        $filter = (string)$arrArgument;
        $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/proyecto_v3/resources/provinciasypoblaciones.xml");
        $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

      for ($i=0; $i<count($result[0]); $i++) {
        $tmp = array(
          'ciudad' => (string) $result[0]->localidad[$i]
        );
        array_push($json, $tmp);
      }
        return $json;
    }

    public function list_products_DAO($db) {
        $sql = "SELECT * FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function details_products_DAO($db,$id) {
        $sql = "SELECT * FROM products WHERE id=".$id;
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

}
