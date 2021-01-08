<?php

/**
 * Created by PhpStorm.
 * User: Odn
 * Date: 13/06/17
 * Time: 23:07
 */
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 0);
class Permessi
{
    private $id;
    private $socio_id;
    private $importo;
    private $uscite;
    private $created_at;
    private $modified_at;

    function set($array) {
        $this->id=$array["id"];
        $this->socio_id = $array["socio_id"];
        $this->importo = $array["importo"];
        $this->uscite = $array["uscite"];
        $this->created_at = $array["created_at"];
        $this->modified_at = $array["modified_at"];
    }

    function setSave($array) {
        $this->socio_id = $array["socio_id"];
        $this->importo = $array["importo"];
        $this->uscite = $array["uscite"];
        $this->created_at = $array["created_at"];
        $this->modified_at = $array["modified_at"];
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
    public function getSocioId()
    {
        return $this->socio_id;
    }

    /**
     * @param mixed $socio_id
     */
    public function setSocioId($socio_id)
    {
        $this->socio_id = $socio_id;
    }

    /**
     * @return mixed
     */
    public function getImporto()
    {
        return $this->importo;
    }

    /**
     * @param mixed $importo
     */
    public function setImporto($importo)
    {
        $this->importo = $importo;
    }

    /**
     * @return mixed
     */
    public function getUscite()
    {
        return $this->uscite;
    }

    /**
     * @param mixed $uscite
     */
    public function setUscite($uscite)
    {
        $this->uscite = $uscite;
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
    public function getModifiedAt()
    {
        return date("d-m-Y", strtotime($this->modified_at));
    }

    /**
     * @param mixed $data_ins
     */
    public function setModifiedAt($modified_at)
    {
        $this->modified_at = date("Y-m-d", strtotime($modified_at));
    }

    function load($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM permessi WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->socio_id = $obj["socio_id"];
            $this->importo = $obj["importo"];
            $this->uscite = $obj["uscite"];
            $this->created_at = $obj["created_at"];
            $this->modified_at = $obj["modified_at"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function loadbySocio($socioId) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM permessi WHERE socio_id=:socio_id AND uscite > 0";
            $statement = $db->prepare($query);
            $statement->bindParam(":socio_id", $socioId);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->socio_id = $obj["socio_id"];
            $this->importo = $obj["importo"];
            $this->uscite = $obj["uscite"];
            $this->created_at = $obj["created_at"];
            $this->modified_at = $obj["modified_at"];
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
                $query = "UPDATE permessi
                          SET                                                       
                              socio_id = :socio_id,
                              importo = :importo,
                              uscite = :uscite
                          WHERE id = :id";
            } else {
                $query = "INSERT INTO permessi (
                                id,
                                socio_id,
                                importo,
                                uscite,
                                created_at,
                                modified_at)
                          VALUES (NULL, 
                          :socio_id, 
                          :importo, 
                          :uscite, 
                          NOW(),
                          NOW())";
            }

            $statement = $db->prepare($query);
            $statement->bindParam(":socio_id", $this->socio_id);
            $statement->bindParam(":importo", $this->importo);
            $statement->bindParam(":uscite", $this->uscite);

            if(is_numeric($this->id)) {
                $statement->bindParam(":id", $this->id);
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

    function delete() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "DELETE FROM permessi WHERE id = '" . $this->id . "'";
            $statement = $db->exec($query);
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function scalaUscita() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "UPDATE permessi
                          SET                                                       
                              uscite = uscite-1
                          WHERE id = '" . $this->id . "'";

            $statement = $db->prepare($query);
            $statement->execute();
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function aggiornaUscite($uscite) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "UPDATE permessi
                          SET                                                       
                              uscite = uscite + " . $uscite . "
                          WHERE id = '" . $this->id . "'";
echo $query;
            $statement = $db->prepare($query);
            $statement->execute();
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}