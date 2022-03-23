 <?php
class DB{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'toto';
    private $db;

    public function__construct($host = null, username = null, $password = null, $database = null){
        if($host != null){
            $this->host = $host;
            $this->username = $username; 
            $this->password = $password; 
            $this->database = $database; 
        }
        try{
    $this->db = new PDO('mysql:host='.$this->host.';
    dbname='.$this->database, $this->username, $this->password, 
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} 
catch(PDOException $e){
    die('<h1>Impossible de se connecter à la base de donnée</h1>')
  }
}
public function query($sql){
    $req =$this->db->prepare($sql);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
}
}

?>