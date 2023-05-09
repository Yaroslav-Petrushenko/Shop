<?php
    namespace app\models;
    use app\vendor\Db;
    use app\vendor\BaseModel;

    class User extends BaseModel
    {
        protected $dataBaseName = 'magazine_db';
        public $table = 'users';
        public $primaryKey = 'id_user';
        public $fields = ['id_user', 'first_name', 'last_name', 'email', 'phone', 'id_status'];

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


        public function loginUser(array $postData)
        {
            $errors = [];

            if (empty($postData['email']) || empty($postData['password'])) {
                foreach ($postData as $key => $val) {
                    if (empty($val)) {
                        echo 'none';
                    }
                }
            } else {
                $email = ucfirst(trim($postData['email']));
                $password = ucfirst(trim($postData['password']));
                $connection = $this->builder();
                $stmt = $connection->prepare('SELECT id_user, email, password FROM ' . $this->dataBaseName . '.users WHERE email = :email');
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch();
                
                $_SESSION['user']['id_user'] = $result['id_user'];
                $_SESSION['user']['email'] = $result['email'];
            }

            return $errors;
        }



        public function getAllUser()
        {
            $users = $this->getAll();
            return $users;

        }
    }

?>
