<?php
/**
 * Created by PhpStorm.
 * User: orkuncaylar
 * Date: 16.07.2018
 * Time: 14:37
 */


date_default_timezone_set('Etc/GMT-3');
//echo date("d.m.Y  H:i:s");
//echo date('d.m.Y H:i:s', time());
//echo time();



    function sifreUret($uzunluk, $tip=5)
{
 $sifre ="";
 for($i=0;$i<$uzunluk;$i++)
 {
//Sadece sayı üretme
if ($tip==1)
$sifre.=chr(rand(48,57));//0-9

//Büyük harf üretme
    elseif($tip==2)
$sifre.=chr(rand(65,90));//A-Z

//Küçük harf üretme
elseif($tip==3)
$sifre.=chr(rand(97,122));//a-z

//karışık şifre üretme
elseif($tip==5){
$sec=rand(1,4);  
if ($sec==2) $sifre.=chr(rand(65,90));//A-Z
elseif ($sec==3) $sifre.=chr(rand(97,122));//a-z
elseif ($sec==4) $sifre.=chr(rand(48,57));//0-9
}
 
 }
 return $sifre;
}
 
$sifre = sifreUret(10);
echo $sifre;