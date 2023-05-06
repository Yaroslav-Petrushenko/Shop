<?php
    namespace app\models;
    use app\vendor\Db;
    use app\vendor\BaseModel;

    class User extends BaseModel
    {
        public $table = 'users';
        public $primaryKey = 'id_user';
        public $fields = ['id_user', 'first_name', 'last_name', 'phone', 'id_status'];

        public function save(array $data)
        {
            if (isset($data['first_name']) && isset($data['last_name']) && isset($data['email']) && isset($data['phone']) && isset($data['password']) && isset($data['status'])) {
                $password = md5($data['password']);
                // var_dump($data);
                $sql = 'INSERT INTO magazine_db.users (first_name, last_name, phone, email, password, id_status) 
                        VALUES (:first_name, :last_name, :phone, :email, :password, :id_status)';
                $stmt = $this->builder()
                            ->prepare($sql);
                $stmt->bindParam(':first_name', $data['first_name']);
                $stmt->bindParam(':last_name', $data['last_name']);
                $stmt->bindParam(':email', $data['email']);
                $stmt->bindParam(':phone', $data['phone']);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':id_status', $data['status']);

                $stmt->execute();
            }

        }

        public function getAllUser()
        {
            $users = $this->getAll();
            return $users;


            // foreach ($users as $user) {
            //     $builder = $this->builder();
            //     $stmt = $builder->prepare('SELECT total_price FROM ' . $this->dataBaseName . '.orders WHERE id_user = ' . $user['id_user'] . '');
            //     $stmt->execute();
            //     $orders[] = $stmt->fetch();
            // }

            // foreach ($orders as $order) {
            //     if (!empty($order['total_price'])) {
            //     foreach ($users as &$user) {
            //         if ($user['id_user'] === $order['id_user']) {
            //             $user['total_price'] = $order['total_price'];
            //         }
            //     }
            //     }
            // }
            
            // return $users;
        }
    }

?>
