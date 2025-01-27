<?php
	header('Content-Type: text/html; charset=utf8');
    date_default_timezone_set('Europe/Istanbul');
    //error_reporting(E_ALL);
    //ini_set("display_errors", 1);
    error_reporting(0);
	include_once "ez_sql_core.php";
    include_once "ez_sql_mysql.php";
    $host = 'localhost';
    $user = 'sungate_vbu';
    $pass = '4bMafowFF7o0#da$';
    $dbname = 'sungate_vb';

    
    $db = new ezSQL_mysql($user,$pass,$dbname,$host);
    define('DILADI', 'utf8');
    define('DILKARSILASTIRMASI','utf8_general_ci');
    $db->query("SET NAMES '". DILADI. "'");
    $db->query("SET CHARACTER SET " . DILADI);
    $db->query("SET COLLATION_CONNECTION = '". DILKARSILASTIRMASI ."'");

?>