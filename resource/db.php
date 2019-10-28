<?PHP

class DB {
    //Will store the instance of the DB if it is available
    private static $_instance = NULL;
    private $_pdo,
            $_query,
            $_error = false,
            $results,
            $_count = 0;

    private function _construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            echo 'Connected';
        }catch(PDOException $e) {
            die($e->getMessage());
        }
        
    }

    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }


}