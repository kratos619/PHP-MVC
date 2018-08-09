<?php 

/*
*PDO DB Class
*Connect To Db
*Creat Prepared Statements
*Bind Value
*Return Rows And Column
*/

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;
//database handler to handler connection
    private $dbh ;
    // to handle statments
    private $stmt ; 
    //handle error
    private $error;

    public function __construct(){
        $dns = 'mysql:host=' . $this->host . ';dbname=' .$this->name;
       //See Connections and Connection management for more information on this attribute.
        $option  = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // create new PDO instance
        try{
            $this->dbh = new PDO($dns,$this->user,$this->pass,$option);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // preapare statements wih query
    public function query($sql){
$this->stmt = $this->dbh->prepare($sql);        
    }

    // Bind Values
    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    # run this code
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    # run this code
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    # run this code
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    # code...
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }

    // execute the prepare statment
    public function execute(){
        return $this->stmt->execute();
    }
    
    // result set
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // call single row
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ); 
    }

    // get Row Count

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}

