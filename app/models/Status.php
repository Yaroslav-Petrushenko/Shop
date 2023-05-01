<?php
    namespace app\models;
    use app\vendor\Db;
    use app\vendor\BaseModel;

    class Status extends BaseModel
    {
        public $table = 'statuses';
        public $primaryKey = 'id_status';
        public $fields = ['id_status', 'name', 'category'];
    }

?>
