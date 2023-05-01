<?php
    // require_once 'app/vendor/Db.php';
    namespace app\vendor;

    use ReflectionClass;
    use app\vendor\Db;

    class BaseModel
    {
        protected $nameDataBase = 'magazine_db';
        protected $properties = [];

        public function __construct()
        {
            $this->getChildProperties($this->getInteriedClassName());
        }
        public function builder()
        {
            return Db::conection();
        }
        public function getInteriedClassName()
        {
            return get_called_class();
        }

        public function getChildProperties($childModel)
        {
            $refrection = new ReflectionClass($childModel);
            $properties = $refrection->getProperties();
            foreach ($properties as $property) {
                $this->properties[$property->getName()] = $property->getValue($this);
            }
        }
        public function getAll(array $filters = [])
        {
            $table = $this->properties['table'];
            $primaryKey = $this->properties['primaryKey'];
            $fields = $this->properties['fields'];
            $builder = $this->builder();

            $sql = '';

            if (!empty($filters)) {
                $sql = ' WHERE ' . key($filters) . ' IN (' . implode(', ', $filters[key($filters)]) . ')';
            }

            $stmt = $builder->prepare('SELECT ' . implode(', ', $fields) . ' FROM ' . $this->nameDataBase . '.' . $table . $sql . '');
            $stmt->execute();
            
            $items = [];
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $items[$row[$primaryKey]] = $row;
            }

            return $items;
        }
        
        public function getOne(string $tableName, string $primaryColumnName, int $id_entity)
        {
            $builder = $this->builder();
            $stmt = $builder->prepare("SELECT * FROM magazine_db.$tableName WHERE $primaryColumnName = $id_entity");
            $stmt->execute();
            $item = $stmt->fetch();
            // var_dump($item);
            return $item;
        }

        public function insert($data)
        {
            $table = $this->properties['table'];
            $fields = $this->properties['fields'];
            $params = implode(', :', $fields);
            $bParams = ':' . implode(', :', $fields);
            $sql = 'INSERT INTO ' . $this->nameDataBase.$table ($params) . ' VALUE ' . ($bParams);
            // $fields = ['id_user', 'first_name', 'last_name', 'phone', 'id_status'];

            $stmt = $this->builder()
                    ->prepare($sql)
                    ->execute($data);
            var_dump($stmt);
        }
    }


?>