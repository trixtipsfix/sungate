<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

    <meta name="author" content="Ansonika">
    <title>Panagea | Premium site template for travel agencies, hotels and restaurant listing.</title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>
<?php print_r($_SESSION); ?>
<?php
    $rezervasyonNo = $_SESSION["sepet"]["rezervasyonNumarasi"];
$sepetim__urunler = isset($_SESSION['sepet']['rezervasyon']) ? $_SESSION['sepet']['rezervasyon'] : array();
foreach ($sepetim__urunler as $sepetim__urun) {
    $rez_type = $sepetim__urun['rez_type'];

    if($rez_type == 'tour'){

        $tour_id = $sepetim__urun['tour_id'];
        $tour_dates = $sepetim__urun['tour_dates'];
        $person_size = $sepetim__urun['person_size'];
        $child_size = $sepetim__urun['child_size'];


        $paketbul = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
        $tarihbul = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' AND date_id = $tour_dates");

        $yetiskinFiyat = $tarihbul->person_price * $person_size;
        $CocukFiyat = $tarihbul->child_price * $child_size;
        $fiyat = $yetiskinFiyat + $CocukFiyat;
    }else{
        $hotel_id = $sepetim__urun['hotel_id'];
        $room_id = $sepetim__urun['room_id'];
        $dates = $sepetim__urun['dates'];
        $person_size = $sepetim__urun['person_size'];
        $child_size = $sepetim__urun['child_size'];


        $paketbul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
        $odaBul = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");

        $yetiskinFiyat = $odaBul->person_price * $person_size;
        $CocukFiyat = $odaBul->child_price * $child_size;
        $fiyat = $yetiskinFiyat + $CocukFiyat;
    }

}
?>

    <div class="hero_in cart_section">
        <div class="wrapper">
            <div class="container">
                <div class="bs-wizard clearfix">
                    <div class="bs-wizard-step ">
                        <div class="text-center bs-wizard-stepnum"> Rezervasyon Detayları </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="rezervasyon" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step ">
                        <div class="text-center bs-wizard-stepnum">Fatura Detayları</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="rezervasyon/2/<?=$rezervasyonNo?>" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Ödeme ve Onay</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="rezervasyon/3/<?=$rezervasyonNo?>" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
            </div>
        </div>
    </div>
    <!--/hero_in-->

    <form id="rezervasyonEnd" action="" onsubmit="return false" method="POST">

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box_cart">
                        <div class="message">
                            <p> Haben Sie ein Benutzerkonto? <a href="login"> Anmelden</a></p>
                        </div>
                        <div class="form_title">
                            <h3><strong>1</strong>Details zum Reisenden</h3>
                            <p>
                                Mussum ipsum cacilds, vidis litro abertis.
                            </p>
                        </div>
                        <div class="step">
                            <?php 
                                //$child_size;
                                $sayi = $person_size;
                                for ($kisi=1; $kisi <= $sayi ; $kisi++) {
                            ?>
                            <?=$kisi?>. Passagierinformationen
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Geschlecht</label>
                                        <div class="custom-select-form">
                                            <select class="wide add_bottom_15" name="gender[]">
                                            <option value="0">Wählen Sie ihr Geschlecht aus</option>
                                            <option value="1">Kadın</option>
                                            <option value="2">Erkek</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Adı</label>
                                        <input type="text" class="form-control" name="firstname[]">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Soyadı</label>
                                        <input type="text" class="form-control" name="lastname[]">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pass-Nr.:</label>
                                        <input type="text" class="form-control" name="passport_no[]">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gültigkeitsdatum des Reisepasses:</label>
                                        <input type="text" class="form-control" name="passport_date[]">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Geburtsdatum</label>
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Gün</label>
                                                    <div class="custom-select-form">
                                                        <select class="wide add_bottom_15" name="day[]">
                                                            <option value="0">GG</option>
                                                            <?php for ($i=01; $i <= 31 ; $i++) { ?>
                                                            <option value="<?=$i?>"><?=$i?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Ay</label>
                                                    <div class="custom-select-form">
                                                        <select class="wide add_bottom_15" name="mounth[]">
                                                            <option value="0">AA</option>
                                                            <?php for ($i=01; $i <= 12 ; $i++) { ?>
                                                            <option value="<?=$i?>"><?=$i?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Yıl</label>
                                                    <div class="custom-select-form">
                                                        <select class="wide add_bottom_15" name="year[]">
                                                            <option value="0">YYYY</option>
                                                            <?php for ($i=1940; $i <= date('Y') ; $i++) { ?>
                                                            <option value="<?=$i?>"><?=$i?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php } ?>
                        </div>
                        <hr>
                        <!--End step -->
                        <div class="form_title">
                            <h3><strong>3</strong>Rechnungsinformationen</h3>
                            <p>
                                Mussum ipsum cacilds, vidis litro abertis.
                            </p>
                        </div>
                        <div class="step">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Geschlecht</label>
                                        <div class="custom-select-form">
                                            <select class="wide add_bottom_15" name="owner_gender">
                                            <option value="0">Wählen Sie ihr Geschlecht aus</option>
                                            <option value="1">Kadın</option>
                                            <option value="2">Erkek</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>E-Mail Adresse</label>
                                        <input type="text" class="form-control" name="owner_email">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Adı</label>
                                        <input type="text" class="form-control" name="owner_firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Soyadı</label>
                                        <input type="text" class="form-control" name="owner_lastname">
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" id="city" name="owner_city" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" id="state" name="owner_state" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Adres</label>
                                        <textarea name="owner_address" class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" id="owner_telephone" name="owner_telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Postal code</label>
                                        <input type="text" id="postal_code" name="owner_postal_code" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--End row -->
                        </div>
                        <hr>
                        <!--End step -->
                        <div id="policy">
                            <h5>Cancellation policy</h5>
                            <p class="nomargin">Lorem ipsum dolor sit amet, vix <a href="#0">cu justo blandit deleniti</a>, discere omittantur consectetuer per eu. Percipit repudiare similique ad sed, vix ad decore nullam ornatus.</p>
                        </div>
                    </div>
                </div>
                <!-- /col -->

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <div id="total_cart">
                            Total <span class="float-right"><?=$fiyat?> € </span>
                        </div>
                        <ul class="cart_details">
                            <?php if($hotel_id){ ?>
                                <li>Tarih: <span><?=$dates?></span></li>
                            <?php }else{ ?>
                                <li>Startdatum: <span><?=dateTR($tarihbul->tour_start_date)?></span></li>
                                <li>Bitiş Tarihi: <span><?=dateTR($tarihbul->tour_finish_date)?></span></li>
                            <?php } ?>
                            <li>Erwachsene: <span><?=$person_size?></span></li>
                            <li>Anzahl Kinder: <span><?=$child_size?></span></li>
                        </ul>
                        <button onclick="$.siparisSon('<?=$rezervasyonNo?>')"  class="btn_1 full-width purchase">Rezervasyonu Tamamla</button>
                        <div class="text-center"><small>Kinder ab 12 Jahren zahlen den vollen Preis.</small></div>
                    </div>
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->

    </form>

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php
if($hotel_id){
    $link = 'orezervasyonEnd';
}else{
    $link = 'rezervasyonEnd';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $.siparisSon = function(value){
            var deger = $("form#rezervasyonEnd").serialize();
            $.ajax({
                url: '<?=$link?>',
                type:"post",
                data:deger,
                dataType :"json",
                success:function(cevap){
                    if(cevap.hata){
                        alert(cevap.hata);
                    }else if(cevap.bos){
                        alert(cevap.bos);
                    }else{
                        window.location.href = "rezervasyon/3/"+value;
                    }
                }
            });
        }
    });
    </script>
<?php require_once 'req/body_end.php'; ?>