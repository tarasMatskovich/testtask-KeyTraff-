<?
class Db {
       public static function getConnection() {
            $host = 'localhost';
            $dbname = 'keytraff';
            $user = 'root';
            $password = '';
            try {
                 $db = new PDO("mysql:host=$host;dbname=$dbname",$user, $password);
                 return $db;
            } catch (PDOException $e) {
                die('Подключение не удалось: ' . $e->getMessage());
            }
       }
}
?>