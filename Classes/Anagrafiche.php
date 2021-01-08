<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anagrafiche
 *
 * @author igabbe
 */


class Anagrafiche {

    private $id = '';
    private $utenti_id = '';
	private $ragioneSociale;
	private $indirizzo;
	private $cap;
	private $citta;
        private $piva;
        private $codiceFiscale;
        private $telefono;
        private $email;

	function set($array_anagrafica) {
        $this->utenti_id = $array_anagrafica["utenti_id"];
        $this->ragioneSociale = $array_anagrafica["ragioneSociale"];
		$this->indirizzo = $array_anagrafica["indirizzo"];
		$this->cap = $array_anagrafica["cap"];
		$this->citta = $array_anagrafica["citta"];
		$this->piva = $array_anagrafica["piva"];
		$this->codiceFiscale = $array_anagrafica["codiceFiscale"];
		$this->telefono = $array_anagrafica["telefono"];
		$this->email = $array_anagrafica["email"];
        $this->id=$array_anagrafica["id"];
    }
	
	 function getId() {
        return $this->id;
    }
	 
    function getUtenti_id() {
        return stripslashes($this->utenti_id);
    }
    
    function setUtenti_id($utenti_id) {
        $this->utenti_id = $utenti_id;
    }

	function getRagioneSociale() {
        return stripslashes($this->ragioneSociale);
    }
	
	function setRagioneSociale($ragioneSociale) {
        $this->ragioneSociale = $ragioneSociale;
    }
    
	function getIndirizzo() {
        return stripslashes($this->indirizzo);
    }
	
   function setIndirizzo($indirizzo) {
        $this->indirizzo = $indirizzo;
    }

	function getCap() {
        return $this->cap;
    }
	
	function setCap($cap) {
        $this->cap = $cap;
    }
    
	function getCitta() {
        return stripslashes($this->citta);
    }
	
   function setCitta($citta) {
        $this->citta = $citta;
    }
    
    public function getPiva() {
        return $this->piva;
    }

    public function setPiva($piva) {
        $this->piva = $piva;
    }
    
    public function getCodiceFiscale() {
        return $this->codiceFiscale;
    }

    public function setCodiceFiscale($codiceFiscale) {
        $this->codiceFiscale = $codiceFiscale;
    }    

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

   /*
    function getDate() {
        return date("d/m/Y", strtotime($this->date));
    }
	 */   
    
	function load($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $query="SELECT * FROM anagrafiche WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $anagrafica = $statement->fetch();
            $this->id = $anagrafica["id"];
            $this->utenti_id = $anagrafica["utenti_id"];
            $this->ragioneSociale = $anagrafica["ragioneSociale"];
            $this->indirizzo = $anagrafica["indirizzo"];
            $this->cap = $anagrafica["cap"];
            $this->citta = $anagrafica["citta"];
            $this->piva = $anagrafica["piva"];
            $this->codiceFiscale = $anagrafica["codiceFiscale"];
            $this->telefono = $anagrafica["telefono"];
            $this->email = $anagrafica["email"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    function loadbyutente($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $query="SELECT * FROM anagrafiche WHERE utenti_id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $anagrafica = $statement->fetch();
            $this->id = $anagrafica["id"];
            $this->utenti_id = $anagrafica["utenti_id"];
            $this->ragioneSociale = $anagrafica["ragioneSociale"];
            $this->indirizzo = $anagrafica["indirizzo"];
            $this->cap = $anagrafica["cap"];
            $this->citta = $anagrafica["citta"];
            $this->piva = $anagrafica["piva"];
            $this->codiceFiscale = $anagrafica["codiceFiscale"];
            $this->telefono = $anagrafica["telefono"];
            $this->email = $anagrafica["email"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function save() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            if(is_numeric($this->id)) {
                $query = "UPDATE anagrafiche
                          SET utenti_id = :utenti_id,
                              ragioneSociale = :ragioneSociale,
                              indirizzo = :indirizzo,
                              cap = :cap,
                              citta = :citta,
                              piva = :piva,
                              codiceFiscale = :codiceFiscale,
                              telefono = :telefono,
                              email = :email
                          WHERE id = :id";
            } else {
                $query = "INSERT INTO anagrafiche (
                                id,
                                utenti_id,
                                ragioneSociale,
                                indirizzo,
                                cap,
                                citta,
                                piva,
                                codiceFiscale,
                                telefono,
                                email)
                          VALUES (NULL, :utenti_id, :ragioneSociale, :indirizzo, :cap, :citta, :piva, :codiceFiscale, :telefono, :email)";
            }

            $statement = $db->prepare($query);
            $statement->bindParam(":utenti_id", $this->utenti_id);            
            $statement->bindParam(":ragioneSociale", $this->ragioneSociale);
            $statement->bindParam(":indirizzo", $this->indirizzo);
            $statement->bindParam(":cap", $this->cap);
            $statement->bindParam(":citta", $this->citta);
            $statement->bindParam(":piva", $this->piva);
            $statement->bindParam(":codiceFiscale", $this->codiceFiscale);
            $statement->bindParam(":telefono", $this->telefono);
            $statement->bindParam(":email", $this->email);
         
            if(is_numeric($this->id)) {
                $statement->bindParam(":id", $this->id);
            }
            $statement->execute();
            if(!is_numeric($this->id)) {
                $this->id = $db->lastInsertId();
            }
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . "<br/>";
            die();
        }

    }
    
        function delete() {        
        
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $query = "DELETE FROM anagrafiche WHERE id = " .$this->id;
            $statement = $db->exec($query);
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
    
}

?>