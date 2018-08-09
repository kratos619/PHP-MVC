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

    
}

