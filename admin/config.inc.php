<?php
//define("DB_HOST", "127.0.0.1");
//define("DB_HOST", "localhost");
//define("DB_NAME", "mosca");
//define("DB_USER", "root");
//define("DB_PASS", "root");

define("DB_HOST", "localhost");
define("DB_NAME", "moscaclu_siena");
define("DB_USER", "moscaclu_pianell");
define("DB_PASS","@Mosca17@");

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 0);
date_default_timezone_set('Europe/Rome');
setlocale(LC_MONETARY, 'it_IT');
//set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

//ini_set('include_path', '/Applications/MAMP/htdocs/pesca_mosca/Classes/');
ini_set('include_path', '/home/moscaclubsiena/public_html/Classes/');
//ini_set('include_path', '/var/www/vhosts/neuro.it/sondaggio/Classes/');

$array_anagrafiche = array(
    "308" => "Mosca Club Siena"
);

include_once 'Utils.php';
require 'vendor/autoload.php';
include 'functions.php';

function db_query($query) {
    $connection = @mysql_connect(DB_HOST,DB_USER,DB_PASS);
    if(!$connection) {
        return false;
    }
    if(!mysql_select_db(DB_NAME)) {
        return false;
    }
    $result = mysql_query($query) or die ("query fallita: " . mysql_error());
    return $result;
}