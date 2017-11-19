<?php

class Database{
    public $isConn;
    protected $datab;

    public function __construct($username = "sp2372", $password = "EUGtORiY",
    $host = "sql1.njit.edu", $dbname = "sp2372") {
      $this->isConn = TRUE;
      try {
         $this->datab = new PDO( "mysql:host={$host};dbname={$dbname};charset=utf8", $username,$password);
      $this->datab->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $this->datab->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      }  catch (PDOException $e){
            throw new Exception($e->getMessage()); 
       }

   }
    
    public function Disconnect() {
        $this->datab = NULL;
	$this->isConn = FALSE;
    }

   public function getRow($query, $params = []) {
        try {
	     $stmt = $this->datab->prepare($query);
	     $stmt->execute($params);
	     return $stmt->fetch();
	  } catch (PDOException $e)  {
	      throw new Exception($e->getMessage());
	  }
        }

    
    public function getRows($query, $params = []) {
         try {
	       $stmt = $this->datab->prepare($query);
	       $stmt->execute($params);
               return $stmt->fetchAll();
	    } catch (PDOException $e)  {
	         throw new Exception($e->getMessage());
            }
	 }

    public function insertRow($query, $params = []){
        try {
	    $stmt = $this->datab->prepare($query);
	    $stmt->execute($params);
	    return TURE;
	 } catch (PDOException $e) {
	    throw new Exception ($e->getMessage());
	 }
       }

  public function updateRow($query, $params = []) {
     $this->insertRow($query, $params);
     }

  public function deleteRow($query, $params = [])  {
     $this->insertRow($query, $params);
    }
  }


?>
