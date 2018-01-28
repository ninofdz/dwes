<?php

class products_model {

    private $db;
    private $products;
    private $id;
    private $name;
    private $stock;
    private $price;
    private $sponsored;
    private $shortDescription;
    private $longDescription;
    private $brand;
    private $category;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->products = array();
    }

    /* GETTERS & SETTERS */

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getSponsored() {
        return $this->sponsored;
    }

    public function setSponsored($sponsored) {
        $this->sponsored = $sponsored;
    }

    public function getShortDescription() {
        return $this->$shortDescription;
    }

    public function setShortDescription($shortDescription) {
        $this->$shortDescription = $shortDescription;
    }

    public function getLongDesc() {
        return $this->$longDescription;
    }

    public function setLongDescription($longDescription) {
        $this->$longDescription = $longDescription;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    /**
     * Extreu totes les persones de la taula
     * @return array Bidimensional de totes les persones
     */
    public function get_products($subCategory="") {

        echo "<pre>" .print_r($subCategory,1)."</pre>";
        //die();
        if (!empty($subCategory)) {
            $query = "SELECT * FROM PRODUCT WHERE CATEGORY = {$subCategory};";
        } else {
            $query = "SELECT * FROM PRODUCT WHERE SPONSORED = 'Y';";
        }

        $consulta = $this->db->query($query);
        while ($filas = $consulta->fetch_assoc()) {
            $this->products[] = $filas;
        }
        return $this->products;
    }

    public function get_shopping_cart() {

        if (!empty($_SESSION["cart"])) {
            $idProducts = implode(",", array_keys($_SESSION["cart"]));
            $query = "SELECT * FROM PRODUCT WHERE ID in ({$idProducts})";

            $consulta = $this->db->query($query);
            while ($filas = $consulta->fetch_assoc()) {
                $this->products[] = $filas;
            }

            return $this->products;
        }
    }

}

?>
