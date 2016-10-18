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
        $community = $arrArgument['comunidad'];
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
                . " city, community, country, price,computing,home_appliances,clothes,entry_date,expiration_date,avatar"
                . " ) VALUES ($cod_prod, '$name_prod', '$description',"
                . " '$color', '$city', '$community', '$country', $price, $computing, $home_appliances, $clothes, '$entry_date',"
                . "'$expiration_date' '$avatar')";

        return $db->ejecutar($sql);
        //return json_encode($sql);
        
    }

}
