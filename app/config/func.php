<?php

    $ipAdresi = $_SERVER['REMOTE_ADDR'];
    $sadeTarih = date("Y-m-d");
    $sadeSaat = date("H:i:s");
    $simdikiZaman = date("Y-m-d H:i:s");
    //$simdikiZaman = date("Y-m-d H:i:s",strtotime('-75 minutes'));
    //echo date('d.m.Y H:i',strtotime('+'.$theday.' days'));
    //$adresSatiri = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

    function hotelStars($par){
        if($par == '1'){
            return '<i class="fa fa-star"></i>';
        }else if($par == '2'){
            return '<i class="fa fa-star"></i><i class="fa fa-star"></i>';
        }else if($par == '3'){
            return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        }else if($par == '4'){
            return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        }else if($par == '5'){
            return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        }
    }

    function commentStars($par){
        if($par == '1'){
            return '<i class="icon_star voted"></i>';
        }else if($par == '2'){
            return '<i class="icon_star voted"></i><i class="icon_star voted"></i>';
        }else if($par == '3'){
            return '<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>';
        }else if($par == '4'){
            return '<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>';
        }else if($par == '5'){
            return '<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>';
        }
    }




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

    function fiyatHesaplama($deger,$yuzde){
        $sonuc = ($deger / 100) * $yuzde;
        $sonsonuc = $deger - $sonuc;
        $bitis = number_format($sonsonuc, 2, ',', '.');
        return $bitis;
    }

    function fiyatarkaHesaplama($deger,$yuzde){
        $sonuc = ($deger / 100) * $yuzde;
        $sonsonuc = $deger - $sonuc;
        return $sonsonuc;
    }

    function kdv_ekle($tutar,$oran){
        $kdv = $tutar * ($oran / 100);
        $ytutar = $tutar + $kdv;
        return $ytutar;
    }

    function kdv_cikar($tutar,$oran){
        $ytutar = $tutar / (1 + ($oran/100));
        return $ytutar;
    }

    function hotelhomeStars($par){
        if($par == '1'){
            return '<i class="icon_star"></i>';
        }else if($par == '2'){
            return '<i class="icon_star"></i> <i class="icon_star"></i>';
        }else if($par == '3'){
            return '<i class="icon_star"></i> <i class="icon_star"></i> <i class="icon_star"></i>';
        }else if($par == '4'){
            return '<i class="icon_star"></i> <i class="icon_star"></i> <i class="icon_star"></i> <i class="icon_star"></i>';
        }else if($par == '5'){
            return '<i class="icon_star"></i> <i class="icon_star"></i> <i class="icon_star"></i> <i class="icon_star"></i> <i class="icon_star"></i>';
        }
    }

    function g($par){
        return strip_tags(trim(addslashes($_GET[$par])));
    }

    function p($par, $st = false){
        if ($st){
            return htmlspecialchars(addslashes(trim($_POST[$par])));
        }else {
            return addslashes(trim($_POST[$par]));
        }
    }


    function go($par, $time = 0){
        if ($time == 0){
            header("Location: {$par}");
        }else {
            header("Refresh: {$time}; url={$par}");
        }
    }


    function bilgi($baslik,$mesaj,$class='info'){
        return '<div class="alert alert-'.$class.'"> <strong>'.$baslik.'</strong> <br>'.$mesaj.'</div>';
    }


    function sef_link($baslik){
        $bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
        $yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
        $perma = strtolower(str_replace($bul, $yap, $baslik));
        $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
        $perma = trim(preg_replace('/\s+/',' ', $perma));
        $perma = str_replace(' ', '-', $perma);
        return $perma;
    }

    function kisalt($kelime, $str = 40)
    {
        if (strlen($kelime) > $str)
        {
            if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
            else $kelime = substr($kelime, 0, $str).'..';
        }
        return $kelime;
    }

    function timeTR($par)
   {
       $explode = explode(" ", $par);
       $explode2 = explode("-", $explode[0]);
       $zaman = substr($explode[1], 0, 5);
       if ($explode2[1] == "1") $ay = "Januar";
       elseif ($explode2[1] == "2") $ay = "Februar";
       elseif ($explode2[1] == "3") $ay = "März";
       elseif ($explode2[1] == "4") $ay = "April";
       elseif ($explode2[1] == "5") $ay = "Mai";
       elseif ($explode2[1] == "6") $ay = "Juni";
       elseif ($explode2[1] == "7") $ay = "Juli";
       elseif ($explode2[1] == "8") $ay = "August";
       elseif ($explode2[1] == "9") $ay = "September";
       elseif ($explode2[1] == "10") $ay = "Oktober";
       elseif ($explode2[1] == "11") $ay = "November";
       elseif ($explode2[1] == "12") $ay = "Dezember";

       return $explode2[2]." ".$ay." ".$explode2[0].", ".$zaman;

   }

    function dateTR($par)
   {
       $explode = explode(" ", $par);
       $explode2 = explode("-", $explode[0]);
       $zaman = substr($explode[1], 0, 5);
       if ($explode2[1] == "1") $ay = "Ocak";
       elseif ($explode2[1] == "2") $ay = "Şubat";
       elseif ($explode2[1] == "3") $ay = "Mart";
       elseif ($explode2[1] == "4") $ay = "Nisan";
       elseif ($explode2[1] == "5") $ay = "Mayıs";
       elseif ($explode2[1] == "6") $ay = "Haziran";
       elseif ($explode2[1] == "7") $ay = "Temmuz";
       elseif ($explode2[1] == "8") $ay = "Ağustos";
       elseif ($explode2[1] == "9") $ay = "Eylül";
       elseif ($explode2[1] == "10") $ay = "Ekim";
       elseif ($explode2[1] == "11") $ay = "Kasım";
       elseif ($explode2[1] == "12") $ay = "Aralık";

       return $explode2[2]." ".$ay." ".$explode2[0];

   }

    function turkcetarih($f, $zt = 'now'){
        $z = date("$f", strtotime($zt));
        $donustur = array(
            'Monday'    => 'Pazartesi',
            'Tuesday'   => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday'  => 'Perşembe',
            'Friday'    => 'Cuma',
            'Saturday'  => 'Cumartesi',
            'Sunday'    => 'Pazar',
            'January'   => 'Ocak',
            'February'  => 'Şubat',
            'March'     => 'Mart',
            'April'     => 'Nisan',
            'May'       => 'Mayıs',
            'June'      => 'Haziran',
            'July'      => 'Temmuz',
            'August'    => 'Ağustos',
            'September' => 'Eylül',
            'October'   => 'Ekim',
            'November'  => 'Kasım',
            'December'  => 'Aralık',
            'Mon'       => 'Pts',
            'Tue'       => 'Sal',
            'Wed'       => 'Çar',
            'Thu'       => 'Per',
            'Fri'       => 'Cum',
            'Sat'       => 'Cts',
            'Sun'       => 'Paz',
            'Jan'       => 'Oca',
            'Feb'       => 'Şub',
            'Mar'       => 'Mar',
            'Apr'       => 'Nis',
            'Jun'       => 'Haz',
            'Jul'       => 'Tem',
            'Aug'       => 'Ağu',
            'Sep'       => 'Eyl',
            'Oct'       => 'Eki',
            'Nov'       => 'Kas',
            'Dec'       => 'Ara',
        );
        foreach($donustur as $en => $tr){
            $z = str_replace($en, $tr, $z);
        }
        if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
        return $z;
    }

    function timeConvert ( $zaman ){
        $zaman =  strtotime($zaman);
        $zaman_farki = time() - $zaman;
        $saniye = $zaman_farki;
        $dakika = round($zaman_farki/60);
        $saat = round($zaman_farki/3600);
        $gun = round($zaman_farki/86400);
        $hafta = round($zaman_farki/604800);
        $ay = round($zaman_farki/2419200);
        $yil = round($zaman_farki/29030400);
        if( $saniye < 60 ){
            if ($saniye == 0){
                return "az önce";
            } else {
                return $saniye .' saniye önce';
            }
        } else if ( $dakika < 60 ){
            return $dakika .' dakika önce';
        } else if ( $saat < 24 ){
            return $saat.' saat önce';
        } else if ( $gun < 7 ){
            return $gun .' gün önce';
        } else if ( $hafta < 4 ){
            return $hafta.' hafta önce';
        } else if ( $ay < 12 ){
            return $ay .' ay önce';
        } else {
            return $yil.' yıl önce';
        }
    }

