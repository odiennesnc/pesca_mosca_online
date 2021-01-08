<?php

/**
 * Created by PhpStorm.
 * User: Odn
 * Date: 13/06/17
 * Time: 23:07
 */

class Uscite
{
    private $id;
    private $permesso_id;
    private $data_uscita;
    private $codice_uscita;

    function set($array) {
        $this->id=$array["id"];
        $this->permesso_id = $array["permesso_id"];
        $this->data_uscita = $array["data_uscita"];
        $this->codice_uscita = $array["codice_uscita"];
    }

    function setSave($array) {
        $this->permesso_id = $array["permesso_id"];
        $this->data_uscita = $array["data_uscita"];
        $this->codice_uscita = $array["codice_uscita"];
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
    public function getPermessoId()
    {
        return $this->permesso_id;
    }

    /**
     * @param mixed $permesso_id
     */
    public function setPermessoId($permesso_id)
    {
        $this->permesso_id = $permesso_id;
    }

    /**
     * @return mixed
     */
    public function getCodiceUscita()
    {
        return $this->codice_uscita;
    }

    /**
     * @param mixed $codice_uscita
     */
    public function setCodiceUscita($codice_uscita)
    {
        $this->codice_uscita = $codice_uscita;
    }

    /**
     * @return mixed
     */
    public function getDataUscita()
    {
        return date("d-m-Y", strtotime($this->data_uscita));
    }

    /**
     * @param mixed $data_ins
     */
    public function setDataUscita($data_uscita)
    {
        $this->data_uscita = date("Y-m-d", strtotime($data_uscita));
    }

    function load($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM uscite WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->permesso_id = $obj["permesso_id"];
            $this->data_uscita = $obj["data_uscita"];
            $this->codice_uscita = $obj["codice_uscita"];
            $db = NULL;
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function loadbyUscita($codice_uscita) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM uscite WHERE codice_uscita=:codice_uscita";
            $statement = $db->prepare($query);
            $statement->bindParam(":codice_uscita", $codice_uscita);
            $statement->execute();
            $obj = $statement->fetch();
            $this->id = $obj["id"];
            $this->permesso_id = $obj["permesso_id"];
            $this->data_uscita = $obj["data_uscita"];
            $this->codice_uscita = $obj["codice_uscita"];
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
                $query = "UPDATE uscite
                          SET                                                       
                              permesso_id = :permesso_id,
                              data_uscita = :data_uscita,
                              codice_uscita = :codice_uscita
                          WHERE id = :id";
            } else {
                $query = "INSERT INTO uscite (
                                id,
                                permesso_id,
                                data_uscita,
                                codice_uscita)
                          VALUES (NULL, 
                          :permesso_id, 
                          :data_uscita, 
                          :codice_uscita)";
            }

            $statement = $db->prepare($query);
            $statement->bindParam(":permesso_id", $this->permesso_id);
            $statement->bindParam(":data_uscita", $this->data_uscita);
            $statement->bindParam(":codice_uscita", $this->codice_uscita);

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
            $query = "DELETE FROM uscite WHERE id = '" . $this->id . "'";
            $statement = $db->exec($query);
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
}