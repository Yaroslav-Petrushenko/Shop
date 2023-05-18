<?php
    namespace app\models;
    use app\vendor\Db;
    use app\vendor\BaseModel;

    class Order extends BaseModel
    {
        public $table = 'orders';
        public $primaryKey = 'id_status';
        public $fields = [
            'id_orders',
            'id_customer',	
            'id_user',
            'id_product',
            'id_status',
            'total_price',	
            'total_quantity',
        ];
    }

?>
