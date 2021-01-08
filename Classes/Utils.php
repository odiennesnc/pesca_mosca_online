<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Utente
 */

define("FROM_MYSQL", 1);
define("TO_MYSQL", 2);

class Utils {

    //put your code here
    public static function makedefault($var, $valid_values, $default_value) {
        if (!in_array($var, $valid_values)) {
            return $default_value;
        }
        return $var;
    }

    public static function url_creator($filename, $query_params = array()) {
        if (empty($query_params))
            return $filename;
        $query__params_strings = array();
        foreach ($query_params as $param_name => $param_value) {
            if ($param_value != '')
                $query_params_strings[] = $param_name . '=' . $param_value;
        }
        if (empty($query_params_strings))
            return $filename;
        return $filename . '?' . implode('&', $query_params_strings);
    }

    public static function intdefault($var, $default_value) {
        if (!is_numeric($var)) {
            return $default_value;
        }
        if ($var < 0) {
            return $default_value;
        }
        return $var;
    }

    public static function resize($origin, $destination) {
        //Inizio il resize
        /*
          $size=getimagesize($origin);
          list($actual_width, $actual_height) = explode(" ", $size[3]);
         */

        clearstatcache();
        ini_set('memory_limit', '1000M');
        $fullsize = @imagecreatefromjpeg($origin); //Prelevo l'immagine da dove l'ho salvata pocanzi
        if (!$fullsize)
            return;
        $fullsize_height = imagesy($fullsize);
        $fullsize_width = imagesx($fullsize);
        $thumb_height = 140;
        $thumb_width = floor($fullsize_width / ($fullsize_height / $thumb_height));
        if ($thumb_width > 130) {
            $thumb_width = 130;
            $thumb_height = floor($fullsize_height / ($fullsize_width / $thumb_width));
        }

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($thumb, $fullsize, 0, 0, 0, 0, $thumb_width, $thumb_height, $fullsize_width, $fullsize_height);
        imagedestroy($fullsize);
        imagejpeg($thumb, $destination); //posso modificare il percorso dell'immagine piccola da qui
        imagedestroy($thumb);
        //fine resize
    }

    public static function validate_form($fields, $validations) {
        foreach ($validations as $name => $type) {
            switch ($type) {
                case 'email':
                    Validate::email($fields[$name]);
                    break;
                case 'text':
                    //return (trim($fields[$name] == '');
                    break;
            }
        }
    }

    public static function is_mysql_date($date) {
        return preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})$/i", $date);
    }

    public static function convert_date($date, $conversion_type) {
        switch ($conversion_type) {
            case FROM_MYSQL:
                if (Utils::is_mysql_date($date)) {
                    preg_match("(/[0-9]{4})-([0-9]{1,2})-([0-9]{1,2}$/i)", $date, $matches);
                    $converted_date = $matches[3] . "/" . $matches[2] . "/" . $matches[1];
                    return $converted_date;
                } else {
                    return NULL;
                }
                break;
            case TO_MYSQL:
                preg_match("/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/i", $date, $matches);
                $converted_date = $matches[3] . "-" . $matches[2] . "-" . $matches[1];

                return (Utils::is_mysql_date($converted_date)) ? $converted_date : NULL;
                break;
            default:
                return NULL;
        }
    }    
    
    
    public static function resize_image($path, $file, $newPath='', $imgwidth, $imgheight) {

         $resizeObj = new resize($_SERVER['DOCUMENT_ROOT'] . $path . $file);
         // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
         $resizeObj -> resizeImage($imgwidth, $imgheight, 'crop');
         // *** 3) Save image
         $percorso = ($newPath=="") ? $path : $newPath;
         $resizeObj -> saveImage($_SERVER['DOCUMENT_ROOT'] . $percorso . $file, 100); 
    }

    public static function delete_image($path, $file) {
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $path;
            $targetFile = str_replace('//', '/', $targetPath) . $file;
            @unlink($targetFile);        
    }

    public static function upload_image($path, $tempFile, $file) {
           $targetPath = $_SERVER['DOCUMENT_ROOT'] . $path;
           $targetFile =  str_replace('//','/',$targetPath) . $file;
           $upload_success = move_uploaded_file($tempFile,$targetFile);
           return $upload_success;
    }    

    public static function converti_ineuro($cifra) {
    $stringa=str_replace(".",",",$cifra);
    return $stringa;
    }

    public static function getRiassunto($testo, $num) {
        $count=strlen($testo);
        if($count>$num) {
            $stringa=substr($testo,0,$num);
            $pos=strrpos($stringa," ");
            $stringa=substr($stringa,0,$pos);
            $stringa=$stringa ." ... ";
        } else {
            $stringa = $testo;
        }
        return $stringa;
    }

    public static function myodn_data ($anagrafica_id) {
        $curl = curl_init();
         curl_setopt($curl,CURLOPT_HTTPHEADER,array('Hash:$hash'));
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.myodn.it/utente/" . $anagrafica_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('X-API-KEY: 612e648bf9594adb50844cad6895f2cf'),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
        //  var_dump($response);
    }

    public static function myodn_fattura($fattura_id) {
        $curl = curl_init();
     //   curl_setopt($curl,CURLOPT_HTTPHEADER,array('Hash:$hash'));
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.myodn.it/fattura/" . $fattura_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('X-API-KEY: 612e648bf9594adb50844cad6895f2cf'),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
        //  var_dump($response);
    }

    public static function myodn_salda_fattura($fattura_id) {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Hash:$hash'));
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.myodn.it/saldafattura/" . $fattura_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('X-API-KEY: 612e648bf9594adb50844cad6895f2cf'),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
        //  var_dump($response);
    }

    public static function generateRandomString($length = 15)
    {
        return substr(sha1(rand()), 0, $length);
    }

    public static function getCodiceUscita()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->exec('set names utf8');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT MAX(codice_uscita) AS max FROM uscite WHERE 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $obj = $statement->fetch();
        $max = $obj["max"] + 1;
        return $max;
    }

    public static function getNumeroTessera()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->exec('set names utf8');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT MAX(numero_tessera) AS max FROM soci WHERE 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $obj = $statement->fetch();
        $max = $obj["max"] + 1;
        return $max;
    }

    public static function contaPaxUscita($data_uscita = '') {
        try {
            $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $query="SELECT SUM(numero_partecipanti) AS totale FROM prenotazioni WHERE id_percorso = '" . $id_percorso . "' AND data_gita = '" . $data_gita . "'";
//echo $query;
            $statement = $db->prepare($query);
            $statement->execute();
            $conta = $statement->fetch();
            //        var_dump($conta);
            return $conta[0];

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}