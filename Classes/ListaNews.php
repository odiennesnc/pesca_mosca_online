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
include_once 'News.php';

class ListaNews implements IteratorAggregate {
//put your code here
    private $lista = array();
    private $order = 'data_ins';
    private $desc = 'ASC';
    private $limit = array();

    function tot() {
         $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
         $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); 
         $query = "SELECT COUNT(*) as tot FROM news WHERE 1";
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

    function find() {
        try {       
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $limit_clause = '';
            if(!empty($this->limit)) {
                $limit_clause = " LIMIT " . $this->limit["offset"] . "," . $this->limit["number"];
            }
            $query = "SELECT * FROM news WHERE 1 ORDER BY " . $this->order . " " . $this->desc . $limit_clause;
//echo $query;
            foreach($db->query($query) as $riga) {
                $notizia = new News();
                $notizia->set($riga);
                $this->lista[] = $notizia;
            }
        } catch(PDOException $e) {
        }
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
?>