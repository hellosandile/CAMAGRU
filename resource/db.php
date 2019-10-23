<?PHP

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=register';
$password = 'work2learn';


try{
    $db = new PDO($dsn, $username, $password);
    
    $db->setAttribute(PDO::ATTR_ERROMODE, PDO::ERROMODE_EXCEPTION);
    echo "Connected to the register database";
}catch (PDOException $ex){
    echo "Connection failed" . $ex->getMessage();

}