<?php

class database{
    private $MYSQL_HOST = 'localhost';
    private $MYSQL_USER = 'root';
    private $MYSQL_PASS = '';
    private $MYSQL_DB = 'tatlidunyasi';
    private $CHARSET='UTF8';
    private $COLLATION = 'utf8_general_ci';
    private $stmt = null; //sorgu
    private $pdo = null;


    public function ConnectDB(){
        $SQL="mysql:host=".$this->MYSQL_HOST.";dbname=".$this->MYSQL_DB;
        try{
            $this->pdo = new PDO($SQL, $this->MYSQL_USER, $this->MYSQL_PASS);
            $this->pdo->exec("SET NAMES'" . $this->CHARSET . "'COLLATE'" . $this->COLLATION . "'");
            $this->pdo->exec("SET CHARACTER SET'" . $this->CHARSET . "'");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            die("Veritabanına ulaşılamadı" . $e->getMessage());
        }
    }
    public function __construct(){
        $this->ConnectDB();
    }
    private function myQuery($query,$params=null){
        if(is_null($params)){
            $this->stmt=$this->pdo->query($query);
        }else{
            $this->stmt=$this->pdo->prepare($query);
            $this->stmt->execute($params);
        }
        return $this->stmt;

    }
    public function getRows($query,$params=null){ //Veri Çekme //çoklu veri kullanımı//satırları getir
        try{
            return $this->myQuery($query,$params)->fetchAll();

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function getRow($query,$params=null){ //Veri Çekme //tek satır kullanımı//satırı getir
        try{
            return $this->myQuery($query,$params)->fetch();

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function getColumn($query,$params=null){ //1 satır 1 sütunun verisi //satırları getir
        try{
            return $this->myQuery($query,$params)->fetchColumn();

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function Insert($query,$params=null){
        try{
            $this->myQuery($query,$params);
            return $this->pdo->lastInsertId();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function Update($query,$params=null){
        try{
            return $this->myQuery($query,$params)->rowCount();
        }catch(PDOException $e){
            die($e->getMessage());

        }
    }
    public function Delete($query,$params=null){
        return $this->Update($query,$params);
    }
    public function CreateDB($query){
        $myDB=$this->pdo->query($query.'CHARACTER SET'.$this->CHARSET.'COLLATE'.$this->COLLATION);
        return $myDB;
    }
    public function TableOperation($query){
        $myTable=$this->pdo->query($query);
        return $myTable;
    }
    public function Limit($query,$params1,$params2=null){
        $this->stmt=$this->pdo->prepare($query);
        $this->stmt->bindParam(1,$params1,PDO::PARAM_INT);
        if(!is_null($params2))
        $this->stmt->bindParam(2,$params2,PDO::PARAM_INT);
        return $this->stmt->fetchAll();
    }
    public function __destruct(){
        $this->pdo = NULL;
    }
}

?>