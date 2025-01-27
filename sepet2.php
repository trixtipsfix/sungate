<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

    <title><?=$general['site_title']->value;?></title>
<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

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
        $start_date = $sepetim__urun['start_date'];
        $end_date = $sepetim__urun['end_date'];

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
        $start_date = $sepetim__urun['start_date'];
        $end_date = $sepetim__urun['end_date'];

        $paketbul = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
        $odaBul = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");

        $yetiskinFiyat = $odaBul->person_price * $person_size;
        $CocukFiyat = $odaBul->child_price * $child_size;
        $fiyat = $yetiskinFiyat + $CocukFiyat;
    }

    $tarih1 = strtotime($start_date);
    $tarih2 = strtotime($end_date);
    $gunSayisi =  ($tarih2 - $tarih1) / (60*60*24);
    $fiyat = $fiyat * $gunSayisi;

}
?>

    <div class="hero_in cart_section">
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

                    <div class="bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Zahlung & Bestätigung</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="reservierung/3/<?=$reservierungNo?>" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
            </div>
        </div>
    </div>
    <!--/hero_in-->

    <form id="reservierungEnd" action="" onsubmit="return false" method="POST">

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box_cart">
                        <div class="message">
                            <p> Haben Sie ein Benutzerkonto? <a href="login"> Anmelden</a></p>
                        </div>
                        <div class="alert alert-info">
                            <strong>Füllen Sie alle Felder aus</strong>
                        </div>
                        <div class="form_title">
                            <h3><strong>1</strong>Details zum Reisenden</h3>
                            <p>Bitte geben Sie Ihre Daten fehlerfrei an</p>
                        </div>
                        <div class="step">
                            <?php 
                                //$child_size;
                                $sayi = $person_size;
                                for ($kisi=1; $kisi <= $sayi ; $kisi++) {
                            ?>
                            <div style="border: 2px solid #ddd; border-radius: 10px; padding: 15px;">
                                <div> <strong><?=$kisi?>. Passagierinformationen</strong> </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Geschlecht</label>
                                            <div class="">
                                                <select class="form-control wide add_bottom_15" name="gender[]">
                                                    <option value="0">Wählen Sie ihr Geschlecht aus</option>
                                                    <option value="1">Frau</option>
                                                    <option value="2">Mann</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Ihr Name</label>
                                            <input type="text" class="form-control" name="firstname[]">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Ihr Nachname</label>
                                            <input type="text" class="form-control" name="lastname[]">
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Geburtsdatum</label>
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Tag</label>
                                                        <div class=" ">
                                                            <select class="form-control wide add_bottom_15" name="day[]">
                                                                <option value="0">TT</option>
                                                                <?php for ($i=01; $i <= 31 ; $i++) { ?>
                                                                    <option value="<?=$i?>"><?=$i?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Monat</label>
                                                        <div class=" ">
                                                            <select class=" form-control wide add_bottom_15" name="mounth[]">
                                                                <option value="0">MM</option>
                                                                <?php for ($i=01; $i <= 12 ; $i++) { ?>
                                                                    <option value="<?=$i?>"><?=$i?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $onikiyilOncesine = date("Y-m-d",strtotime('-12 year')); ?>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Jahr</label>
                                                        <div class="">
                                                            <select class="form-control wide add_bottom_15" name="year[]">
                                                                <option value="0">YYYY</option>
                                                                <?php for ($i=1940; $i <= $onikiyilOncesine ; $i++) { ?>
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
                            </div>
                            <hr>
                            <?php } ?>
                        </div>
                        <hr>
                        <!--End step -->

                        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

                        <div class="form_title">
                            <h3><strong>3</strong>Details zum Flug</h3>
                            <p>
                                Bitte wählen Sie Ihren Abflughafen aus
                            </p>
                        </div>
                        <div class="step">
                            <div class="form-group">
                                <label>Flughafen</label>
                                <select class="js-example-basic-single form-control" name="havalimani" id="havalimani">
                                    <?php
                                        $airports = $db->get_results("SELECT * FROM airportss  ORDER BY countryName ASC");
                                        foreach ($airports as $airport){
                                    ?>
                                    <option value="<?=$airport->name.' '.$airport->code?>"> <?=$airport->name.' ('.$airport->code?>) </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form_title">
                            <h3><strong>4</strong>Rechnungsinformationen</h3>
                            <p>
                                Mussum ipsum cacilds, vidis litro abertis.
                            </p>
                        </div>
                        <div class="step">
                            <div class="row">



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ihr Name</label>
                                        <input type="text" class="form-control" name="owner_firstname" value="<?=$loginUserDetail->firstname?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ihr Nachname</label>
                                        <input type="text" class="form-control" name="owner_lastname" value="<?=$loginUserDetail->lastname?>">
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>E-Mail Adresse</label>
                                        <input type="text" class="form-control" name="owner_email" value="<?=$loginUserDetail->email?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Stadt</label>
                                        <input type="text" id="city" name="owner_city" class="form-control" value="<?=$loginUserDetail->city?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Land</label>
                                        <input type="text" id="state" name="owner_state" class="form-control" value="<?=$loginUserDetail->state?>">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Straße und Hausnummer</label>
                                        <textarea name="owner_address" class="form-control" cols="30" rows="5"><?=$loginUserDetail->address?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input type="text" id="owner_telephone" name="owner_telephone" class="form-control" value="<?=$loginUserDetail->telephone?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Postleitzahl</label>
                                        <input type="text" id="postal_code" name="owner_postal_code" class="form-control" value="<?=$loginUserDetail->postal_code?>">
                                    </div>
                                </div>
                            </div>
                            <!--End row -->
                        </div>
                        <hr>
                        <!--End step -->
                        <div id="policy">
                            <h5>Stornierungsbedingungen</h5>
                            <p class="nomargin"> Ich akzeptiere die Nutzungsbedingungen und den Datenschutz Hinweis </p>
                            <div class="checkboxes mt-3">
                                <label class="container_check">Ich akzeptiere die AGB's
                                <input type="checkbox" name="sozlesme" id="sozlesme" checked>
                                <span class="checkmark"></span>
                                </label>
                            </div>
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
                                <li>Datum: <span><?=$dates?></span></li>
                            <?php }else{ ?>
                                <li>Startdatum: <span><?=dateTR($tarihbul->tour_start_date)?></span></li>
                                <li>Enddatum: <span><?=dateTR($tarihbul->tour_finish_date)?></span></li>
                            <?php } ?>
                            <li>Erwachsene: <span><?=$person_size?></span></li>
                            <li>Anzahl Kinder: <span><?=$child_size?></span></li>
                        </ul>
                        <button onclick="$.siparisSon('<?=$rezervasyonNo?>')"  class="btn_1 full-width purchase">Buchung bestätigen</button>
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
    $link = 'oreservierungEnd';
}else{
    $link = 'reservierungEnd';
}
?>
<script src="lib/js/moment.min.js"></script>
<script src="lib/js/daterangepicker.js"></script>
<script>
    $(function() {
        $('.passport_date').daterangepicker({
            startDate: "01/04/2020",
            minDate: "01/04/2020",
            minYear: 2020,
            maxYear: 2035,
            autoUpdateInput: false,
            singleDatePicker: true,
            showDropdowns: true,
            opens: 'left',
            locale: {
                cancelLabel: 'Löschen',
                applyLabel: 'Auswählen'

            }
        }, function(start, end, label) {
            //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        })
        $('.passport_date').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
        $('.passport_date').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function(){
        $.siparisSon = function(value){
            var deger = $("form#reservierungEnd").serialize();
            $.ajax({
                url: '<?=$link?>',
                type:"post",
                data:deger,
                dataType :"json",
                success:function(cevap){
                    if(cevap.hata){
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: cevap.hata
                        })
                    }else if(cevap.bos){
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: cevap.bos
                        })
                    }else{
                        window.location.href = "reservierung/3/"+value;
                    }
                }
            });
        }
    });
    </script>
<?php require_once 'req/body_end.php'; ?>