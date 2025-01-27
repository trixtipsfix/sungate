<?php

    header('Content-Type: text/html; charset=utf8');
    date_default_timezone_set('Europe/Istanbul');
    error_reporting(0);
    include_once "ez_sql_core.php";
    include_once "ez_sql_mysql.php";
    class Hotel{
        public  function hotelCategory($id){
            $bul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$id'");
            return $bul->name;
        }
    }

?>