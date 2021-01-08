<?php

/**
 * Created by PhpStorm.
 * User: Odn
 * Date: 13/06/17
 * Time: 23:07
 */

class News
{
    private $id;
    private $img;
    private $titolo_ita;
    private $titolo_en;
    private $titolo_de;
    private $titolo_fr;
    private $descrizione_ita;
    private $descrizione_en;
    private $descrizione_de;
    private $descrizione_fr;
    private $data_ins;
    private $link;

    function set($array) {
        $this->id=$array["id"];
        $this->img = $array["img"];
        $this->titolo_ita = $array["titolo_ita"];
        $this->titolo_en = $array["titolo_en"];
        $this->titolo_de = $array["titolo_de"];
        $this->titolo_fr = $array["titolo_fr"];
        $this->descrizione_ita = $array["descrizione_ita"];
        $this->descrizione_en = $array["descrizione_en"];
        $this->descrizione_de = $array["descrizione_de"];
        $this->descrizione_fr = $array["descrizione_fr"];
        $this->data_ins = $array["data_ins"];
        $this->link = $array["link"];
    }

    function setSave($array) {
        $this->img = $array["img"];
        $this->titolo_ita = $array["titolo_ita"];
        $this->titolo_en = $array["titolo_en"];
        $this->titolo_de = $array["titolo_de"];
        $this->titolo_fr = $array["titolo_fr"];
        $this->descrizione_ita = $array["descrizione_ita"];
        $this->descrizione_en = $array["descrizione_en"];
        $this->descrizione_de = $array["descrizione_de"];
        $this->descrizione_fr = $array["descrizione_fr"];
        $this->data_ins = $array["data_ins"];
        $this->link = $array["link"];
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
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getTitoloIta()
    {
        return $this->titolo_ita;
    }

    /**
     * @param mixed $titolo_ita
     */
    public function setTitoloIta($titolo_ita)
    {
        $this->titolo_ita = $titolo_ita;
    }

    /**
     * @return mixed
     */
    public function getTitoloEn()
    {
        return $this->titolo_en;
    }

    /**
     * @param mixed $titolo_en
     */
    public function setTitoloEn($titolo_en)
    {
        $this->titolo_en = $titolo_en;
    }

    /**
     * @return mixed
     */
    public function getTitoloDe()
    {
        return $this->titolo_de;
    }

    /**
     * @param mixed $titolo_de
     */
    public function setTitoloDe($titolo_de)
    {
        $this->titolo_de = $titolo_de;
    }

    /**
     * @return mixed
     */
    public function getTitoloFr()
    {
        return $this->titolo_fr;
    }

    /**
     * @param mixed $titolo_fr
     */
    public function setTitoloFr($titolo_fr)
    {
        $this->titolo_fr = $titolo_fr;
    }

    /**
     * @return mixed
     */
    public function getDescrizioneIta()
    {
        return $this->descrizione_ita;
    }

    /**
     * @param mixed $descrizione_ita
     */
    public function setDescrizioneIta($descrizione_ita)
    {
        $this->descrizione_ita = $descrizione_ita;
    }

    /**
     * @return mixed
     */
    public function getDescrizioneEn()
    {
        return $this->descrizione_en;
    }

    /**
     * @param mixed $descrizione_en
     */
    public function setDescrizioneEn($descrizione_en)
    {
        $this->descrizione_en = $descrizione_en;
    }

    /**
     * @return mixed
     */
    public function getDescrizioneDe()
    {
        return $this->descrizione_de;
    }

    /**
     * @param mixed $descrizione_de
     */
    public function setDescrizioneDe($descrizione_de)
    {
        $this->descrizione_de = $descrizione_de;
    }

    /**
     * @return mixed
     */
    public function getDescrizioneFr()
    {
        return $this->descrizione_fr;
    }

    /**
     * @param mixed $descrizione_fr
     */
    public function setDescrizioneFr($descrizione_fr)
    {
        $this->descrizione_fr = $descrizione_fr;
    }

    /**
     * @return mixed
     */
    public function getDataIns()
    {
        return date("d-m-Y", strtotime($this->data_ins));
    }

    /**
     * @param mixed $data_ins
     */
    public function setDataIns($data_ins)
    {
        $this->data_ins = date("Y-m-d", strtotime($data_ins));
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    function load($id) {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM news WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $news = $statement->fetch();
            $this->id = $news["id"];
            $this->img = $news["img"];
            $this->titolo_ita = $news["titolo_ita"];
            $this->titolo_en = $news["titolo_en"];
            $this->titolo_de = $news["titolo_de"];
            $this->titolo_fr = $news["titolo_fr"];
            $this->descrizione_ita = $news["descrizione_ita"];
            $this->descrizione_en = $news["descrizione_en"];
            $this->descrizione_de = $news["descrizione_de"];
            $this->descrizione_fr = $news["descrizione_fr"];
            $this->data_ins = $news["data_ins"];
            $this->link = $news["link"];
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
                $query = "UPDATE news
                          SET                                                       
                              titolo_ita = :titolo_ita,
                              titolo_en = :titolo_en,
                              titolo_de = :titolo_de,
                              titolo_fr = :titolo_fr,
                              descrizione_ita = :descrizione_ita,
                              descrizione_en = :descrizione_en,
                              descrizione_de = :descrizione_de,
                              descrizione_fr = :descrizione_fr,
                              img = :img,
                              link = :link
                          WHERE id = :id";
            } else {
                $query = "INSERT INTO news (
                                id,
                                titolo_ita,
                                titolo_en,
                                titolo_de,
                                titolo_fr,
                                descrizione_ita,
                                descrizione_en,
                                descrizione_de,
                                descrizione_fr,
                                data_ins,
                                img,
                                link)
                          VALUES (NULL, 
                          :titolo_ita, 
                          :titolo_en, 
                          :titolo_de, 
                          :titolo_fr, 
                          :descrizione_ita, 
                          :descrizione_en, 
                          :descrizione_de, 
                          :descrizione_fr, 
                          NOW(),
                          :img,
                          :link)";
            }

            $statement = $db->prepare($query);
            $statement->bindParam(":img", $this->img);
            $statement->bindParam(":titolo_ita", $this->titolo_ita);
            $statement->bindParam(":titolo_en", $this->titolo_en);
            $statement->bindParam(":titolo_de", $this->titolo_de);
            $statement->bindParam(":titolo_fr", $this->titolo_fr);
            $statement->bindParam(":descrizione_ita", $this->descrizione_ita);
            $statement->bindParam(":descrizione_en", $this->descrizione_en);
            $statement->bindParam(":descrizione_de", $this->descrizione_de);
            $statement->bindParam(":descrizione_fr", $this->descrizione_fr);
            $statement->bindParam(":link", $this->link);

            if(is_numeric($this->id)) {
                $statement->bindParam(":id", $this->id);
            }
            $statement->execute();
            if(!is_numeric($this->id)) {
                $this->id = $db->lastInsertId();
                return $this->id;
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
            $db->exec('set names utf8');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "DELETE FROM news WHERE id = '" . $this->id . "'";
            $statement = $db->exec($query);
            $db = NULL;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
}