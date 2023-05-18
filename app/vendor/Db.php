<?php
    namespace app\vendor;
    use PDO;

    class Db 
    {
        private static $conection;

        public static function conection()
        {
            if (empty(self::$conection)) {
                $host = 'localhost';
                $dbname = 'magazine_db';
                $user = 'root';
                $password = '';
                $charset = 'utf8';
    
                $dsn = 'mysql:host' . $host . 'dbname' . $dbname . ';charset=' . $charset;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //  встановлює режим обробки помилок в режим виключень (exceptions), що дозволяє легко інформувати про помилки в коді і швидко реагувати на них.
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // встановлює режим отримання результатів запиту за замовчуванням на вибірку асоціативного масиву, що дозволяє легко доступатися до даних, використовуючи імена стовбців.
                    PDO::ATTR_EMULATE_PREPARES => false, // вимушує використовувати підготовлені запити, що зменшує ризик SQL ін'єкцій та забезпечує більшу безпеку.
                    // PDO::ATTR_AUTOCOMMIT => false, // вимушує вимкнути автоматичне збереження змін в базі даних і використовувати явне підтвердження транзакцій, що дозволяє керувати збереженням даних в базі та зменшує ризик втрати даних.
                    // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4" // виконує команду ініціалізації MySQL для встановлення кодування utf8mb4 для бази даних та таблиць, що дозволяє коректно зберігати та відображати символи Юнікоду в базі даних.
                ];
                self::$conection = new PDO($dsn, $user, $password, $options);
            }
            return self::$conection;
        }
    }

?>
