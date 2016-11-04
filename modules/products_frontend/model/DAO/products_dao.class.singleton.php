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

    public function list_products_DAO($db) {
        $sql = "SELECT * FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function details_products_DAO($db,$id) {
        $sql = "SELECT * FROM products WHERE cod_prod=".$id;
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function page_products_DAO($db,$arrArgument) {
        $position = $arrArgument['position'];
        $item_per_page = $arrArgument['item_per_page'];
        $sql = "SELECT * FROM products ORDER BY cod_prod ASC LIMIT ".$position." , ".$item_per_page;

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function total_products_DAO($db) {
        $sql = "SELECT COUNT(*) as total FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function select_column_products_DAO($db, $arrArgument) {
        $sql = "SELECT " . $arrArgument . " FROM products ORDER BY " . $arrArgument;

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_like_products_DAO($db, $arrArgument) {
        $sql = "SELECT DISTINCT * FROM products WHERE " . $arrArgument['column'] . " like '%" . $arrArgument['like'] . "%'";

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
     public function count_like_products_DAO($db, $arrArgument) {
        $sql = "SELECT COUNT(*) as total FROM products WHERE " . $arrArgument['column'] . " like '%" . $arrArgument['like'] . "%'";

        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function select_like_limit_products_DAO($db, $arrArgument) {

        $sql="SELECT DISTINCT * FROM products WHERE ".$arrArgument['column']." like '%". $arrArgument['like']. "%' ORDER BY id ASC LIMIT ". $arrArgument['position']." , ". $arrArgument['limit'];

        $stmt=$db->ejecutar($sql);

        return $db->listar($stmt);
    }

}
