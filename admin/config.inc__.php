<?php
//define("DB_HOST", "127.0.0.1");
//define("DB_NAME", "sin_sondaggio");
//define("DB_USER", "root");
//define("DB_PASS","root");

define("DB_HOST", "localhost");
define("DB_NAME", "allevamento");
define("DB_USER", "root");
define("DB_PASS","root");
define("ANAGRAFICA_ID", 325);

session_start();

error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 0);
date_default_timezone_set('Europe/Rome');
setlocale(LC_MONETARY, 'it_IT');
//set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

ini_set('include_path', '/Applications/MAMP/htdocs/Allevamento/Classes/');
//ini_set('include_path', '/home/studiocongressla/public_html/sondaggio/Classes/');
//ini_set('include_path', '/var/www/vhosts/neuro.it/sondaggio/Classes/');
include_once 'Utils.php';

require 'vendor/autoload.php';

include 'functions.php';
?>