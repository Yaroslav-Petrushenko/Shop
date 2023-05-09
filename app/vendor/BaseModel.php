<?php
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
        
        // public function getOne(string $tableName, string $primaryColumnName, int $id_entity)
        // {
        //     $builder = $this->builder();
        //     $stmt = $builder->prepare("SELECT * FROM magazine_db.$tableName WHERE $primaryColumnName = $id_entity");
        //     $stmt->execute();
        //     $item = $stmt->fetch();
        //     return $item;
        // }
        
        public function getOne(int $id)
        {
            $table = $this->properties['table'];
            $primaryKey = $this->properties['primaryKey'];
            $fields = $this->properties['fields'];

            $builder = $this->builder();
            $stmt = $builder->prepare('SELECT ' . implode(', ', $fields) . ' FROM magazine_db.' . $table . ' WHERE ' . $primaryKey . ' = ' . $id . '');
            $stmt->execute();

            return $stmt->fetch();

        }

        public function insert(array $data = [])
        {
            $table = $this->properties['table'];
            $primaryKey = $this->properties['primaryKey'];
            $fields = $this->properties['fields'];
            // Clean $primaryKey from $fields
            $fields = array_flip($fields);
            unset($fields[$primaryKey]);
            $fields = array_flip($fields);

            $dbFields = implode(', ', $fields);
            $postFields = ':' . implode(', :', $fields);

            $sql = 'INSERT INTO ' . $this->nameDataBase . '.' . $table . ' (' . $dbFields . ')'. ' VALUES (' . $postFields . ')';
            $this->builder()
                ->prepare($sql)
                ->execute($data);
        }

        // public function update(array $data, int $id)
        // {
        //     $table = $this->properties['table'];
        //     $primaryKey = $this->properties['primaryKey'];
        //     $fields = $this->properties['fields'];

        //     $sql = "";
        //     foreach ($data as $key => $value) {
        //         $sql = "UPDATE $this->nameDataBase.$table SET $key = $value WHERE $primaryKey = $id;";
        //     }
        //     $this->builder()
        //         ->query($sql);
        // }

        public function update(int $idStatus, array $data)
        {
            $table = $this->properties['table'];
            $primaryKey = $this->properties['primaryKey'];
            unset($data[$primaryKey]);

            $fields = '';
            foreach ($data as $key => $value) {
                $fields .= $key . "='" . $value . "',";
            }
            $fields = rtrim($fields, ', ');

            $sql = 'UPDATE ' . $this->nameDataBase . '.' . $table . ' SET ' . $fields . ' WHERE ' . $primaryKey . ' = ' . $idStatus . '';
            $this->builder()
                ->prepare($sql)
                ->execute();
        }


        public function delete(int $id)
        {
            $id = intval($id);
            $table = $this->properties['table'];
            $primaryKey = $this->properties['primaryKey'];
            $sql = 'DELETE FROM magazine_db.'.$table.' WHERE '.$primaryKey .' = '.$id.''; 
 
            $this->builder()
                ->prepare($sql)
                ->execute();
        }
    }


?>