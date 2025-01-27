<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

    <title><?=$general['site_title']->value;?></title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

<?php   
    $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
    $rezDetail = $db->get_row("SELECT * FROM reservations WHERE rezervation_number = '$rezervasyonNo'");
    $userDetail = $db->get_row("SELECT * FROM users WHERE id = '$rezDetail->user_id'");
    $sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
        foreach ($sepetim__urunler as $sepetim__urun) {
            $rez_type = $sepetim__urun['rez_type'];
            $tour_id = $sepetim__urun['tour_id'];
            $tour_dates = $sepetim__urun['tour_dates'];
            $person_size = $sepetim__urun['person_size'];
            $child_size = $sepetim__urun['child_size'];


            $paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
            $tarihbul = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' AND date_id = $tour_dates");

            $yetiskinFiyat = $tarihbul->person_price * $person_size;
            $CocukFiyat = $tarihbul->child_price * $child_size;
            $fiyat = $yetiskinFiyat + $CocukFiyat;
        }
?>
    <div class="hero_in cart_section last">
        <div class="wrapper">
            <div class="container">
                <div class="bs-wizard clearfix">
                <div class="bs-wizard-step ">
                        <div class="text-center bs-wizard-stepnum"> Reservationsdetails  </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="reservierung" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step ">
                        <div class="text-center bs-wizard-stepnum">Rechnungsdetails</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="reservierung/2/<?=$reservierungNo?>" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step ">
                        <div class="text-center bs-wizard-stepnum">Zahlung & Bestätigung</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="reservierung/3/<?=$reservierungNo?>" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
                <div id="confirm">
                    <h4>Sie erhalten in kürze eine E-Mail.</h4>
                    <p>Bitte kontrollieren Sie ebenfalls ihren Spam-Ordner. <br> Bitte Überweisen Sie den Betrag an unser Konto Sparkasse Prignitz <br> Konto Inhaber: Magnus Ferdinand Karlsson <br> IBAN: DE 35 1605 0101 1010 0135 87 <br>BIC: WELADED1PRP Buchungsnummer: <?=$reservierungNo?></p>

                </div>
            </div>
        </div>
    </div>
    <!--/hero_in-->

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>