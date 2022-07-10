<?php
class Koneksi{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bo203";
    
    protected $con;

    public function __construct(){
      
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
        if (!$this->con){
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit;
        }

        return $this->con;
    }
}
?>

