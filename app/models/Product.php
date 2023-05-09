<?php
    namespace app\models;

    use app\vendor\Db;
    use app\vendor\BaseModel;
    use app\models\Price;

    class Product extends BaseModel
    {
        public $table = 'products';
        public $primaryKey = 'id_product';
        public $fields = ['id_product', 'name', 'description', 'main_image', 'quantity', 'id_status'];

        // $sql 

        public function getAllProducts()
        {
            $priceModel = new Price();
            $products = $this->getAll();
            $idsProduct = array_column($products, 'id_product');
            $prepareProducts = [];
            $prices = $priceModel->getAll(['id_product' => $idsProduct]);

            foreach ($products as $product) {
                $prepareProducts[$product['id_product']]['product'] = $product;
                if ($prices[$product['id_product']]) {
                    $prepareProducts[$product['id_product']]['prices']['price'] = $prices[$product['id_product']]['price'];
                    $prepareProducts[$product['id_product']]['prices']['status'] = $prices[$product['id_product']]['id_status'];
                } else {
                    $prepareProducts[$product['id_product']]['prices']['price'] = [];
                }
            }

            return $prepareProducts;

        }
    }
?>