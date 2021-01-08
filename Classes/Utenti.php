<?php

class Utenti{

    private $id = '';
    private $nominativo;
    private $email;
    private $ruolo;
    private $password;
    private $last_login;
    private $created_at;
    private $reset_id;

    function getId(){
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getRuolo() {
        return $this->ruolo;
    }

    function setRuolo($ruolo) {
        $this->ruolo = $ruolo;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getLast_login() {
        return $this->last_login;
    }

    function setLast_login($last_login) {
        $this->last_login = $last_login;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    function getReset_id() {
        return $this->reset_id;
    }

    function setReset_id($reset_id) {
        $this->reset_id = $reset_id;
    }

    function getNominativo() {
        return $this->nominativo;
    }

    function setNominativo($nominativo) {
        $this->nominativo = $nominativo;
    }

    function load($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM utenti WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $utente = $statement->fetch();
            $this->id = $utente["id"];
            $this->nominativo = $utente["nominativo"];
            $this->email = $utente["email"];
            $this->password = $utente["password"];
            $this->ruolo = $utente["ruolo"];
            $this->last_login = $utente["last_login"];
            $this->created_at = $utente["created_at"];
            $this->reset_id = $utente["reset_id"];
            $db = NULL;
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function set($array){
        $this->id = $array['id'];
        $this->nominativo = $array['nominativo'];
        $this->email = $array['email'];
        $this->ruolo = $array['ruolo'];
        $this->password = $array['password'];
        $this->last_login = $array['last_login'];
        $this->created_at = $array['created_at'];
        $this->reset_id = $array['reset_id'];
    }

    function loadbymail($email) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM utenti WHERE email=:email";
            $statement = $db->prepare($query);
            $statement->bindParam(":email", $email);
            $statement->execute();
            $utente = $statement->fetch();
            $this->id = $utente["id"];
            $this->nominativo = $utente["nominativo"];
            $this->email = $utente["email"];
            $this->password = $utente["password"];
            $this->ruolo = $utente["ruolo"];
            $this->last_login = $utente["last_login"];
            $this->created_at = $utente["created_at"];
            $this->reset_id = $utente["reset_id"];
            $db = NULL;
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function loadbyreset_id($reset_id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM utenti WHERE reset_id=:reset_id";
            $statement = $db->prepare($query);
            $statement->bindParam(":rese_id", $reset_id);
            $statement->execute();
            $utente = $statement->fetch();
            $this->id = $utente["id"];
            $this->nominativo = $utente["nominativo"];
            $this->email = $utente["email"];
            $this->password = $utente["password"];
            $this->ruolo = $utente["ruolo"];
            $this->last_login = $utente["last_login"];
            $this->created_at = $utente["created_at"];
            $this->reset_id = $utente["reset_id"];
            $db = NULL;
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function loadbypsw($email,$password) {
        try {
            $pass = sha1($password);
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM utenti WHERE email=:email 
                    AND password =:password";
            $statement = $db->prepare($query);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":password", $pass);
            $statement->execute();
            $utente = $statement->fetch();
            $this->id = $utente["id"];
            $this->nominativo = $utente["nominativo"];
            $this->email = $utente["email"];
            $this->password = $utente["password"];
            $this->ruolo = $utente["ruolo"];
            $this->last_login = $utente["last_login"];
            $this->created_at = $utente["created_at"];
            $this->reset_id = $utente["reset_id"];
            $db = NULL;
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

//    function save() {
//        try {
//            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
//            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            if(is_numeric($this->id)) {
//                $query = "UPDATE utenti
//                          SET username = :username,
//                              password = :password,
//                              email = :email,
//                              ruolo = :ruolo,
//                              last_login = :last_login,
//                              created_at = :created_at
//                          WHERE id = :id";
//            } else {
//                $query = "INSERT INTO utenti (
//                                id,
//                                username,
//                                password,
//                                email,
//                                ruolo,
//                                last_login,
//                                created_at)
//                          VALUES (NULL, :username, :password, :email, :ruolo, :last_login, :created_at)";
//            }
//echo $query;
//            $statement = $db->prepare($query);
//            $statement->bindParam(":username", $this->username);
//            $statement->bindParam(":password", sha1($this->password));
//            $statement->bindParam(":email", $this->email);
//            $statement->bindParam(":ruolo", $this->ruolo);
//            $statement->bindParam(":last_login", $this->last_login);
//            $statement->bindParam(":crated_at", $this->created_at);
//
//            if(is_numeric($this->id)) {
//                $statement->bindParam(":id", $this->id);
//            }
//            $statement->execute();
//            if(!is_numeric($this->id)) {
//                $this->id = $db->lastInsertId();
//            }
//            return $this->id;
//            $db = NULL;
//        } catch (PDOException $e) {
//          //  print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . var_dump($e->getCode()) . "<br/>";
//            return $e->getMessage();
//            die();
//        }
//
//    }

    function updateLastLogin() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(is_numeric($this->id)) {
                $query = "UPDATE utenti SET
                        last_login = '" . date("Y-m-d") . "'
                            WHERE id = '" . $this->id . "'";
            }
            $statement = $db->exec($query);
            return true;
            $db = NULL;
        } catch (PDOException $e) {
            //  print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . var_dump($e->getCode()) . "<br/>";
            return $e->getMessage();
            die();
        }
    }

    function updateReset_id() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(is_numeric($this->id)) {
                $query = "UPDATE utenti SET
                        reset_id = '" . bin2hex(openssl_random_pseudo_bytes(32)) . "'
                            WHERE id = '" . $this->id . "'";
            }
            $statement = $db->exec($query);
            return true;
            $db = NULL;
        } catch (PDOException $e) {
            //  print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . var_dump($e->getCode()) . "<br/>";
            return $e->getMessage();
            die();
        }
    }

    function updatePsw() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(is_numeric($this->id)) {
                $query = "UPDATE utenti SET
                        password = '" . sha1($this->password) . "'
                            WHERE id = '" . $this->id . "'";
            }
            $statement = $db->exec($query);
            return true;
            $db = NULL;
        } catch (PDOException $e) {
            //  print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . var_dump($e->getCode()) . "<br/>";
            return $e->getMessage();
            die();
        }
    }

    function save() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(is_numeric($this->id)) {
                $query = "UPDATE utenti SET
                        nominativo = :nominativo,
                        password = :password,
                        email = :email,
                        ruolo = :ruolo
                      WHERE id = :id";
            } else {
                $query = "INSERT INTO utenti
                               (nominativo,
                                password,
                                email,
                                ruolo,
                                last_login,
                                created_at,
                                reset_id) 
                        VALUES (
                        NULL,
                        :nominativo,
                        :password,
                        :email,
                        :ruolo,
                        :last_login,
                        :created_at,
                        :reset_id)";
            }
            $statement = $db->prepare($query);
            $statement->bindParam(":nominativo", $this->nominativo);
            $statement->bindParam(":password", sha1($this->password));
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":last_login", $this->last_login);
            $statement->bindParam(":crated_at", $this->created_at);
            $statement->bindParam(":reset_id", $this->reset_id);

            if(is_numeric($this->id)) {
                $statement->bindParam(":id", $this->id);
            }
            $statement->execute();
            if(!is_numeric($this->id)) {
                $this->id = $db->lastInsertId();
            }
            return $this->id;
            $db = NULL;

        } catch (Exception $e) {

            print "Error!: " . $e->getMessage() . var_dump($e->getTrace()) . "<br/>";
            die();
        }

    }

    function delete(){
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $query = "DELETE FROM utenti WHERE id = '" . $this->id . "'";
            $statement = $db->exec($query);
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}

class ListaUtenti implements IteratorAggregate {

    private $list = array();
    private $limit = array();

    function setLimit($offset,$number) {
        $this->limit["offset"] = $offset;
        $this->limit["number"] = $number;
    }

    function setSearch($ruolo='') {
        $clause="";
        $clause .=($ruolo!="") ? " AND ruolo = '" . $ruolo . "'" : "";
        $clause = ($clause == '') ? " 1" : substr($clause, 4, strlen($clause));

        $this->search = $clause;
    }

    function find() {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $limit_clause = '';
            if(!empty($this->limit)) {
                $limit_clause = " LIMIT " . $this->limit["offset"] . "," . $this->limit["number"];
            }
            if(empty($this->search)) { $this->search = 1; }
            $query = "SELECT * 
                      FROM utenti WHERE " . $this->search . " ORDER BY nominativo ASC " . $limit_clause;
            foreach($db->query($query) as $row) {
                $utente = new Utenti();
                $utente->set($row);
                $this->list[] = $utente;

            }
        } catch(PDOException $e) {
        }
    }

    function count() {
        return count($this->list);
    }

    function pop() {
        return array_pop($this->list);
    }

    function push($patient) {
        return array_push($this->list, $patient);
    }

    function empt() {
        return empty($this->list);
    }
    public function getIterator() {
        return new ArrayIterator($this->list);
    }
}