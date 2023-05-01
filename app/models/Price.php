<?php
    namespace app\models;

    use app\vendor\Db;
    use app\vendor\BaseModel;

    class Price extends BaseModel
    {
        public $table = 'prices';
        public $primaryKey = 'id_price';
        public $fields = ['id_price', 'id_product', 'price', 'id_status'];

        
    }

?>
