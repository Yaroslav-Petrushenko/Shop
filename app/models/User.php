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
        }
    }

?>
