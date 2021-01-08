<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListaNotizie
 *
 * @author Utente
 */
include_once 'Uscite.php';

class ListaUscite implements IteratorAggregate {
//put your code here
    private $lista = array();
    private $order = 'data_uscita';
    private $desc = 'ASC';
    private $limit = array();

    function tot() {
         $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
         $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); 
         $query = "SELECT COUNT(*) as tot FROM uscite WHERE 1";
         $statement = $db->query($query);
         $conto = $statement->fetch();
         return $conto["tot"];
    }

    function setOrdine($ordine) {
        $this->order = $ordine;
    }

    function count() {
        return count($this->lista);
    }

    function setLimit($offset,$number) {
        $this->limit["offset"] = $offset;
        $this->limit["number"] = $number;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setSearch($array = array()) {
        $clause="";
        $clause .=(isset($array["permesso_id"]) AND $array["permesso_id"]!="") ? " AND permesso_id = '" . $array["permesso_id"] . "'" : "";
        if(isset($array["inizio"]) AND $array["inizio"]!="") {
            if(isset($array["fine"]) AND $array["fine"]!="") {
                $clause .= " AND (data_uscita BETWEEN '" . $array["inizio"] . "' AND '" . $array["fine"] . "')";
                $clause .= " AND (data_uscita BETWEEN '" . $array["inizio"] . "' AND '" . $array["fine"] . "')";
            } else {
                $clause .= " AND data_uscita >= '" . $array["inizio"] . "'";
            }
        }
        if(isset($array["oggi"]) AND $array["oggi"]!="") {
            $clause .= " AND data_uscita = '" . $array["oggi"] . "'";
        }
        $clause = ($clause == '') ? " 1" : substr($clause, 4, strlen($clause));
        $this->search = $clause;
    }

    function find() {
        try {       
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $limit_clause = '';
            if(!empty($this->limit)) {
                $limit_clause = " LIMIT " . $this->limit["offset"] . "," . $this->limit["number"];
            }
            $query = "SELECT * FROM uscite WHERE " . $this->search . " ORDER BY " . $this->order . " " . $this->desc . $limit_clause;
//echo $query;
            foreach($db->query($query) as $riga) {
                $obj = new Uscite();
                $obj->set($riga);
                $this->lista[] = $obj;
            }
        } catch(PDOException $e) {
        }
    }

    function findBySocio($socio_id) {
        try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->exec('set names utf8');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $query = "SELECT *
                    FROM uscite
                    WHERE permesso_id IN (SELECT id FROM permessi WHERE socio_id = '" . $socio_id . "')";
        foreach($db->query($query) as $riga) {
            $obj = new Uscite();
            $obj->set($riga);
            $this->lista[] = $obj;
        }
    } catch(PDOException $e) {}
    }

    function estrai() {
        return array_pop($this->lista);
    }

    function vuoto() {
        return empty($this->lista);
    }    
    
    public function getIterator() {
        return new ArrayIterator($this->lista);
    }
}