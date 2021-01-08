<?php

/**
 * Created by PhpStorm.
 * User: Odn
 * Date: 13/06/17
 * Time: 23:07
 */

class Soci
{
    private $id;
    private $nome;
    private $cognome;
    private $codice_fiscale;
    private $socio;
    private $created_at;
    private $last_login;
    private $luogo_nascita;
    private $data_nascita;
    private $indirizzo;
    private $citta;
    private $cap;
    private $telefono;
    private $email;
    private $associazione;
    private $tipo_socio;
    private $valido_fino;
    private $importo_pagato;
    private $numero_tessera;

    function set($array) {
        $this->id=$array["id"];
        $this->nome = $array["nome"];
        $this->cognome = $array["cognome"];
        $this->luogo_nascita = $array["luogo_nascita"];
        $this->data_nascita = $array["data_nascita"];
        $this->codice_fiscale = $array["codice_fiscale"];
        $this->indirizzo = $array["indirizzo"];
        $this->citta = $array["citta"];
        $this->cap = $array["cap"];
        $this->telefono = $array["telefono"];
        $this->email = $array["email"];
        $this->socio = $array["socio"];
        $this->tipo_socio = $array["tipo_socio"];
        $this->associazione = $array["associazione"];
        $this->created_at = $array["created_at"];
        $this->last_login = $array["last_login"];
        $this->valido_fino = $array["valido_fino"];
        $this->importo_pagato = $array["importo_pagato"];
        $this->numero_tessera = $array["numero_tessera"];
    }

    function setSave($array) {
        $this->nome = (isset($array["nome"]) AND $array["nome"]!= "") ? $array["nome"] : "";
        $this->cognome = (isset($array["cognome"]) AND $array["cognome"]!= "") ? $array["cognome"] : "";
        $this->luogo_nascita = (isset($array["luogo_nascita"])AND $array["luogo_nascita"]!= "") ? $array["luogo_nascita"] : "";
        $this->data_nascita = (isset($array["data_nascita"]) AND $array["data_nascita"]!= "") ? $array["data_nascita"] : "";
        $this->codice_fiscale = (isset($array["codice_fiscale"]) AND $array["codice_fiscale"]!= "") ? $array["codice_fiscale"] : "";
        $this->indirizzo = (isset($array["indirizzo"]) AND $array["indirizzo"]!= "") ? $array["indirizzo"] : "";
        $this->citta = (isset($array["citta"]) AND $array["citta"]!= "") ? $array["citta"] : "";
        $this->cap = (isset($array["cap"]) AND $array["cap"]!= "") ? $array["cap"] : "";
        $this->telefono = (isset($array["telefono"]) AND $array["telefono"]!= "") ? $array["telefono"] : "";
        $this->email = (isset($array["email"]) AND $array["email"]!= "") ? $array["email"] : "";
        $this->socio = (isset($array["socio"]) AND $array["socio"]!= "") ? $array["socio"] : "";
        $this->tipo_socio = (isset($array["tipo_socio"]) AND $array["tipo_socio"]!= "") ? $array["tipo_socio"] : "";
        $this->associazione = (isset($array["associazione"]) AND $array["associazione"]!= "") ? $array["associazione"] : "";
        $this->created_at = $array["created_at"];
        $this->last_login = $array["last_login"];
        $this->valido_fino = (isset($array["valido_fino"]) AND $array["valido_fino"]!= "") ? $array["valido_fino"] : "";
        $this->importo_pagato = $array["importo_pagato"];
        $this->numero_tessera = $array["numero_tessera"];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * @param mixed $cognome
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    /**
     * @return mixed
     */
    public function getCodiceFiscale()
    {
        return $this->codice_fiscale;
    }

    /**
     * @param mixed $codice_fiscale
     */
    public function setCodiceFiscale($codice_fiscale)
    {
        $this->codice_fiscale = $codice_fiscale;
    }

    /**
     * @return mixed
     */
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * @param mixed $socio
     */
    public function setSocio($socio)
    {
        $this->socio = $socio;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return date("d-m-Y", strtotime($this->created_at));
    }

    /**
     * @param mixed $data_ins
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = date("Y-m-d", strtotime($created_at));
    }
    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return date("d-m-Y", strtotime($this->last_login));
    }

    /**
     * @param mixed $data_ins
     */
    public function setLastLogin($last_login)
    {
        $this->last_login = date("Y-m-d", strtotime($last_login));
    }

    /**
     * @return mixed
     */
    public function getLuogoNascita()
    {
        return $this->luogo_nascita;
    }

    /**
     * @param mixed $luogo_nascita
     */
    public function setLuogoNascita($luogo_nascita)
    {
        $this->luogo_nascita = $luogo_nascita;
    }

    public function getDataNascitaNormale()
    {
        return $this->data_nascita;
    }

    /**
     * @return mixed
     */
    public function getDataNascita()
    {
        return date("d-m-Y", strtotime($this->data_nascita));
    }

    /**
     * @param mixed $data_nascita
     */
    public function setDataNascita($data_nascita)
    {
        $this->data_nascita = date("Y-m-d", strtotime($data_nascita));
    }

    /**
     * @return mixed
     */
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    /**
     * @param mixed $indirizzo
     */
    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    /**
     * @return mixed
     */
    public function getCitta()
    {
        return $this->citta;
    }

    /**
     * @param mixed $citta
     */
    public function setCitta($citta)
    {
        $this->citta = $citta;
    }

    /**
     * @return mixed
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * @param mixed $cap
     */
    public function setCap($cap)
    {
        $this->cap = $cap;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAssociazione()
    {
        return $this->associazione;
    }

    /**
     * @param mixed $associazione
     */
    public function setAssociazione($associazione)
    {
        $this->associazione = $associazione;
    }

    /**
     * @return mixed
     */
    public function getTipoSocio()
    {
        return $this->tipo_socio;
    }

    /**
     * @param mixed $tipo_socio
     */
    public function setTipoSocio($tipo_socio)
    {
        $this->tipo_socio = $tipo_socio;
    }

    public function getValidoFino()
    {
        return date("d-m-Y", strtotime($this->valido_fino));
    }

    /**
     * @param mixed $data_nascita
     */
    public function setValidoFino($valido_fino)
    {
        $this->valido_fino = date("Y-m-d", strtotime($valido_fino));
    }

    /**
     * @return mixed
     */
    public function getImportoPagato()
    {
        return $this->importo_pagato;
    }

    /**
     * @param mixed $importo_pagato
     */
    public function setImportoPagato($importo_pagato)
    {
        $this->importo_pagato = $importo_pagato;
    }

    /**
     * @return mixed
     */
    public function getNumeroTessera()
    {
        return $this->numero_tessera;
    }

    /**
     * @param mixed $numero_tessera
     */
    public function setNumeroTessera($numero_tessera)
    {
        $this->numero_tessera = $numero_tessera;
    }

    function load($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM soci WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->nome = $obj["nome"];
            $this->cognome = $obj["cognome"];
            $this->luogo_nascita = $obj["luogo_nascita"];
            $this->data_nascita = $obj["data_nascita"];
            $this->codice_fiscale = $obj["codice_fiscale"];
            $this->indirizzo = $obj["indirizzo"];
            $this->citta = $obj["citta"];
            $this->cap = $obj["cap"];
            $this->telefono = $obj["telefono"];
            $this->email = $obj["email"];
            $this->socio = $obj["socio"];
            $this->tipo_socio = $obj["tipo_socio"];
            $this->associazione = $obj["associazione"];
            $this->created_at = $obj["created_at"];
            $this->last_login = $obj["last_login"];
            $this->valido_fino = $obj["valido_fino"];
            $this->importo_pagato = $obj["importo_pagato"];
            $this->numero_tessera = $obj["numero_tessera"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function load2019($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM soci_2019 WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->nome = $obj["nome"];
            $this->cognome = $obj["cognome"];
            $this->luogo_nascita = $obj["luogo_nascita"];
            $this->data_nascita = $obj["data_nascita"];
            $this->codice_fiscale = $obj["codice_fiscale"];
            $this->indirizzo = $obj["indirizzo"];
            $this->citta = $obj["citta"];
            $this->cap = $obj["cap"];
            $this->telefono = $obj["telefono"];
            $this->email = $obj["email"];
            $this->socio = $obj["socio"];
            $this->tipo_socio = $obj["tipo_socio"];
            $this->associazione = $obj["associazione"];
            $this->created_at = $obj["created_at"];
            $this->last_login = $obj["last_login"];
            $this->valido_fino = $obj["valido_fino"];
            $this->importo_pagato = $obj["importo_pagato"];
            $this->numero_tessera = $obj["numero_tessera"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function loadByCodice($codice) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM soci WHERE codice_fiscale=:codice_fiscale";
            $statement = $db->prepare($query);
            $statement->bindParam(":codice_fiscale", $codice);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->nome = $obj["nome"];
            $this->cognome = $obj["cognome"];
            $this->luogo_nascita = $obj["luogo_nascita"];
            $this->data_nascita = $obj["data_nascita"];
            $this->codice_fiscale = $obj["codice_fiscale"];
            $this->indirizzo = $obj["indirizzo"];
            $this->citta = $obj["citta"];
            $this->cap = $obj["cap"];
            $this->telefono = $obj["telefono"];
            $this->email = $obj["email"];
            $this->socio = $obj["socio"];
            $this->tipo_socio = $obj["tipo_socio"];
            $this->associazione = $obj["associazione"];
            $this->created_at = $obj["created_at"];
            $this->last_login = $obj["last_login"];
            $this->valido_fino = $obj["valido_fino"];
            $this->importo_pagato = $obj["importo_pagato"];
            $this->numero_tessera = $obj["numero_tessera"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function save() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(is_numeric($this->id)) {
                $query = "UPDATE soci
                          SET                                                       
                              nome = :nome,
                              cognome = :cognome,
                              luogo_nascita = :luogo_nascita,
                              data_nascita = :data_nascita,
                              codice_fiscale = :codice_fiscale,
                              indirizzo = :indirizzo,
                              citta = :citta,
                              cap = :cap,
                              telefono = :telefono,
                              email = :email,
                              socio = :socio,
                              tipo_socio = :tipo_socio,
                              associazione = :associazione,
                              valido_fino = :valido_fino,
                              importo_pagato = :importo_pagato,
                              numero_tessera = :numero_tessera
                          WHERE id = :id";
            } else {
                $query = "INSERT INTO soci (
                                id,
                                nome,
                                cognome,
                                luogo_nascita,
                                data_nascita,
                                codice_fiscale,
                                indirizzo,
                                citta,
                                cap,
                                telefono,
                                email,
                                socio,
                                tipo_socio,
                                associazione,
                                created_at,
                                last_login,
                                valido_fino,
                                importo_pagato,
                                numero_tessera)
                          VALUES (NULL, 
                          :nome, 
                          :cognome, 
                          :luogo_nascita,
                          NOW(), 
                          :codice_fiscale, 
                          :indirizzo, 
                          :citta, 
                          :cap, 
                          :telefono, 
                          :email,
                          :socio,
                          :tipo_socio,     
                          :associazione,
                          NOW(),
                          NOW(),
                          :valido_fino,
                          :importo_pagato,
                          :numero_tessera)";
            }

            $statement = $db->prepare($query);
            $statement->bindParam(":nome", $this->nome);
            $statement->bindParam(":cognome", $this->cognome);
            $statement->bindParam(":luogo_nascita", $this->luogo_nascita);
           // $statement->bindParam(":data_nascita", $this->data_nascita);
            $statement->bindParam(":codice_fiscale", $this->codice_fiscale);
            $statement->bindParam(":indirizzo", $this->indirizzo);
            $statement->bindParam(":citta", $this->citta);
            $statement->bindParam(":cap", $this->cap);
            $statement->bindParam(":telefono", $this->telefono);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":socio", $this->socio);
            $statement->bindParam(":tipo_socio", $this->tipo_socio);
            $statement->bindParam(":associazione", $this->associazione);
            $statement->bindParam(":valido_fino", $this->valido_fino);
            $statement->bindParam(":importo_pagato", $this->importo_pagato);
            $statement->bindParam(":numero_tessera", $this->numero_tessera);

            if(is_numeric($this->id)) {
                $statement->bindParam(":id", $this->id);
                $statement->bindParam(":data_nascita", $this->data_nascita);

            }
            $statement->execute();
            if(!is_numeric($this->id)) {
                $this->id = $db->lastInsertId();
            }
            return $this->id;
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . "<br/>";
            die();
        }

    }

    function updateLogin() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "UPDATE soci
                          SET                                                       
                              last_login = NOW()
                          WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $this->id);
            $statement->execute();
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . "<br/>";
            die();
        }

    }

    function updateValidoFino() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "UPDATE soci
                          SET                                                       
                              valido_fino = :valido_fino
                          WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $this->id);
            $statement->bindParam(":valido_fino", $this->valido_fino);
            $statement->execute();
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . "<br/>";
            die();
        }

    }

    function delete() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "DELETE FROM soci WHERE id = '" . $this->id . "'";
            $statement = $db->exec($query);
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
}