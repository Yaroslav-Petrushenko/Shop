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

        public function getAllProducts()
        {
            $priceModel = new Price();

            $prepareProducts = [];

            $sql = 'SELECT ps.name AS price_status_name, 
                    prs.name AS product_status_name, 
                    pr.id_status AS product_status_id,
                    p.id_status AS price_status_id, 
                    p.price, 
                    pr.id_product,
                    pr.name,
                    pr.description,
                    pr.main_image,
                    pr.quantity 
                    FROM ' . $this->nameDataBase . '.products AS pr
                    LEFT JOIN ' . $this->nameDataBase . '.statuses AS prs ON prs.id_status = pr.id_status
                    LEFT JOIN ' . $this->nameDataBase . '.prices AS p ON pr.id_product = p.id_product
                    LEFT JOIN ' . $this->nameDataBase . '.statuses AS ps ON ps.id_status = p.id_status';

            $stmt = $this->builder()
                ->query($sql);
            
            $products = $stmt->fetchAll();

            foreach ($products as $product) {
                $prepareProducts[$product['id_product']]['name'] = $product['name'];
                $prepareProducts[$product['id_product']]['description'] = $product['description'];
                $prepareProducts[$product['id_product']]['main_image'] = $product['main_image'];
                $prepareProducts[$product['id_product']]['quantity'] = $product['quantity'];
                $prepareProducts[$product['id_product']]['product_status_name'] = $product['product_status_name'];
                $prepareProducts[$product['id_product']]['price_status_name'] = $product['price_status_name'];
                $prepareProducts[$product['id_product']]['price_status_id'] = $product['price_status_id'];
                $prepareProducts[$product['id_product']]['product_status_id'] = $product['product_status_id'];
                $prepareProducts[$product['id_product']]['id_product'] = $product['id_product'];
                $prepareProducts[$product['id_product']]['prices'][] = [$product['product_status_name'] => $product['price']];
                // $prepareProducts[$product['id_product']]['prices']['status'][] = $product['product_status_name'];
            }
            

            return $prepareProducts;

        }
    }
?>