<?php
if(!defined('DB_SERVER')){
    require_once("../initialize.php");
    // print "../initialize.php";
}
// if(!defined('DB_SERVER')){
//     require_once("../initialize.php");
// }
class DBConnection{

    private $host = DB_SERVER;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;
    private $bikesDatabase = BIKES_DB_NAME;
    public $labelimgsDatabaseString = DB_LABELIMG;

    public $conn;
    public $db_labelimg;
    public $bikesConn;
    public $labelimgsDatabase;

    public function __construct(){

        if (!isset($this->labelimgsDatabase)) {

            $this->labelimgsDatabase = new SQLite3($this->labelimgsDatabaseString);

            // if (!$this->conn) {
            //     echo 'Cannot connect to database server';
            //     exit;
            // }
            // echo "Connected successfully to DB_NAME";
        }

        if (!isset($this->conn_labelimg)) {

            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }
            // echo "Connected successfully to DB_NAME";
        }

        if (!isset($this->bikesConn)) {

            $this->bikesConn = new mysqli($this->host, $this->username, $this->password, $this->bikesDatabase);

            if (!$this->bikesConn) {
                echo 'Cannot connect to database server';
                exit;
            }
            // echo "Connected successfully to BIKES_DB_NAME";
        }
    }
    public function __destruct(){
      $this->conn->close();
      $this->bikesConn->close();
    }
}
?>
