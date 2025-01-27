<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

    <title>Mein Konto - <?=$general['site_title']->value;?></title>

    <?php
        if(!$_SESSION['uye']) {
            go('kayit-giris');
        }
        $userID = $_SESSION['uye']['hzu_userid'];
    ?>
    <?php
        $do = @g('do');
        $q = @g('q');
        if($do == 'cikis_yap'){
            unset($_SESSION["uye"]);
            unset($_SESSION["sepet"]);
            go('login');
        }
    ?>
<?php require_once 'req/head.php'; ?>
    <!-- SPECIFIC CSS -->
    <link href="lib/css/blog.css" rel="stylesheet">

<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>
        <section class="hero_in contacts">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Mein Konto</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->


        <div class="bg_color_1">
            <div class="container margin_80_55">
                <div class="row">

                    <div class="col-md-3">
                        <div class="profile-sidebar">
                            <!-- SIDEBAR USERPIC
                            <div class="profile-userpic">
                                <img src="assets/img/user.jpg" class="img-responsive img-circle img-thumbnail" alt="">
                            </div>
                            END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    <?=$_SESSION['uye']['hzu_name']?>
                                </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <button type="button" onclick="window.location.href='cikis-yap'" class="btn btn-danger btn-xs"> <i class="fa fa-power-off"></i> Abmelden</button>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">

                                <ul class="nav">
                                    <li class="<?php if($do == 'hesap_bilgilerim' OR $do == ''){echo 'active';}?>"><a href="mein-konto"><i class="fa fa-user-o"></i> Meine Profilinformationen</a></li>
                                    <li class="<?php if($do == 'fatura_bilgilerim'){echo 'active';}?>"><a href="abrechnungs-informationen"><i class="fa fa-briefcase"></i> Rechnungsinformationen</a></li>
                                    <li class="<?php if($do == 'meinebuchung'){echo 'active';}?>"><a href="meinebuchung"><i class="fa fa-shopping-basket"></i> Meine Buchung</a></li>
                                    <li><a href="cikis-yap"><i class="fa fa-power-off"></i>Abmelden</a></li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="profile-content">


                            <!--  ########### Siparişlerim ########### !-->
                            <?php if($do == 'meinebuchung'){ ?>
                                <div class="clearfix"></div>
                                <div class="profile-content_title">Meine Buchung</div>

                                <?php
                                $siparisler = $db->get_results("SELECT * FROM reservations WHERE user_id = '$userID' ORDER BY status ASC ");
                                if ($siparisler) {
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Bestellnummer</th>
                                                <th>Hotel Name</th>
                                                <th>Letzte Zahlung</th>
                                                <th>Betrag</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            foreach ($siparisler as $siparis) {

                                                $siparisindirim = $siparis->indirim_durum;
                                                if($siparisindirim == 1){
                                                    $toplamTutarOdeme = number_format(floatval($siparis->total_price_indirim), 2, ',', '.').' ';
                                                    $KDV = number_format(floatval($siparis->total_pricekdv_indirim), 2, ',', '.').' ';
                                                    $cekilecek = number_format(floatval($siparis->genel_toplam_indirim), 2, ',', '.').' ';
                                                    $cekilecekarka = $siparis->genel_toplam_indirim*100;
                                                }else{
                                                    $toplamTutarOdeme = number_format($siparis->total_price, 2, ',', '.').' €';
                                                    $KDV = number_format($siparis->total_price, 2, ',', '.').' €';
                                                    $cekilecek = number_format($siparis->total_price, 0, ',', '.').' €';
                                                    $cekilecekarka = $siparis->total_price*100;
                                                }
                                                ?>
                                                <tr>
                                                    <td><strong>#<?=$siparis->rezervation_number?></strong></td>
                                                    <td>
                                                        <?php
                                                            $siparisDetayCek = $db->get_row("SELECT * FROM reservations WHERE user_id = '$userID' AND rezervation_number = '$siparis->rezervation_number'");
                                                            $otelDetail = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$siparisDetayCek->hotel_id'");
                                                            echo $otelDetail->name;
                                                        ?>
                                                    </td>
                                                    <td><?=$siparisDetayCek->hotel_dates?></td>
                                                    <td><h5 style="margin:0; padding:0;"><strong><?=$cekilecek?> </strong></h5></td>
                                                    <td>
                                                        <?php if($siparis->durum == 0){ ?>
                                                            <!--<a href="odeme/<?=$siparis->siparisno?>" class="btn btn-success btn-block btn-xs"><i class="fa fa-credit-card"></i> Zahlung ausführen</a> !-->
                                                        <?php } ?>
                                                        <div style="margin-bottom: 5px;"><?php if($siparis->durum != 0){ echo siparisDurum($siparis->durum).' '; } ?></div>
                                                        <button type="button" name="button" id="<?=$siparis->rezervation_number?>" class="btn btn-primary btn-sm  view_data"><i class="fa fa-search-plus"></i> Details</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>



                                <?php }else{ ?>
                                    <div class="notify unhappy-box">
                                        <h1> Sie haben noch keine Reservierungen.</h1>
                                        <span class="alerticon"> <i class="fa fa-frown-o"></i> </span>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                             <!--  ########### Siparişlerim ########### !-->


                            <!--  ########### Fatura Bilgilerim ########### !-->
                            <?php if($do == 'fatura_bilgilerim'){ ?>

                                <?php $user = $db->get_row("SELECT * FROM users WHERE id = '$userID'"); ?>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        illeriGetir();
                                        var selected_il = $("#iller").attr('data-selected');
                                        $("#iller").bind('change',ilceleriGetir);
                                        function illeriGetir(){
                                            $.post('inc/iller_ilceler.php',{ilId: 0},function(output){
                                                $("#iller option").remove();
                                                $("#iller").append(output);
                                                $('#iller option[value="' + selected_il + '"]').prop('selected', true);
                                            });
                                        }

                                        function ilceleriGetir(){
                                            if($("#iller").val() != 0){
                                                $.post('inc/iller_ilceler.php',{il_id: $("#iller").val()},function(output){
                                                    $("#ilceler option").remove();
                                                    $("#ilceler").append(output);
                                                });
                                            }
                                            else{
                                                $("#ilceler option").remove();
                                                $("#ilceler").append('<option value="0">Önce İl Seçiniz</option>');
                                            }
                                        }
                                    });
                                </script>
                                <div class="profile-content_title">Meine Rechnungsinformationen</div>

                                <form id="faturaDuzenle" action="" onsubmit="return false" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> <strong>Firmenname / Nachname</strong> <span class="zorunlu">*</span> </label>
                                                <input class="form-control validate[required]" name="fatura_unvan" id="fatura_unvan" type="text" value="<?=$user->fatura_unvan?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> <strong>Festnetz / Handy </strong> </label>
                                                <input class="ceptelefonu form-control" name="telefon" type="text" value="<?=$user->fatura_telefon?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> <strong> Steuer ID (für Firmen) </strong></label>
                                                <input class="form-control" name="fatura_vergi" id="fatura_vergi" type="text" value="<?=$user->fatura_vergi?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> <strong>Rechnungsadresse</strong> <span class="zorunlu">*</span></label>
                                                <textarea name="fatura_adresi" class="form-control validate[required]"><?=$user->fatura_adresi?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"  onclick="faturaEdit();"  class="btn btn-success"> <i class="fa fa-refresh"></i>  Aktualisierung</button>
                                    </div>
                                </form>
                            <?php } ?>
                            <!--  ########### Fatura Bilgilerim ########### !-->

                            <!--  ########### Hesap Bilgilerim ########### !-->
                            <?php if($do == 'hesap_bilgilerim' OR $do == ''){ ?>
                                <?php $user = $db->get_row("SELECT * FROM users WHERE id = '$userID'"); ?>
                                <div class="profile-content_title">Meine Kontoinformationen</div>

                                <div class="alert alert-info">
                                    <i class="fa fa-coffee"></i>
                                    Stellen Sie sicher, dass Ihre Informationen aktuell sind.
                                </div>
                                <form id="profilDuzenle" action="" onsubmit="return false" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label"> Vorname </label>
                                                <input class="form-control" id="firstname" name="firstname" value="<?=$user->firstname?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label"> Nachname: </label>
                                                <input class="form-control" id="lastname" name="lastname" value="<?=$user->lastname?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label"> E-Mail Adresse:</label>
                                                <input class="form-control" id="email" name="email" value="<?=$user->email?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label"> Geschlecht: </label>
                                                <select class="form-control wide add_bottom_15" name="gender">
                                                    <option value="0">Wählen Sie ihr Geschlecht aus</option>
                                                    <option value="1" <?php if($user->gender == 1){echo 'selected';} ?>>Frau</option>
                                                    <option value="2" <?php if($user->gender == 2){echo 'selected';} ?>>Mann</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label"> Telefon:</label>
                                                <input class="form-control ceptelefonu" name="phone" id="phone" value="<?=$user->telephone?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Passwort:</label>
                                                <input class="form-control" name="sifre" id="sifre" type="password">
                                                <p class="help-block"> Lassen Sie dieses Feld leer, wenn Sie Ihr Passwort nicht ändern möchten.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"  onclick="profilEdit();"  class="btn btn-success"> <i class="fa fa-refresh"></i>  Aktualisierung</button>
                                    </div>
                                </form>
                            <?php } ?>
                            <!--  ########### Hesap Bilgilerim ########### !-->




                            <!-- Modal -->
                            <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Reservierungsdetails</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="employee_detail">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Schliessen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /bg_color_1 -->
    </main>
    <!--/main-->

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>

    <!-- SPECIFIC SCRIPTS -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="lib/js/mapmarker.jquery.js"></script>
    <script src="lib/js/mapmarker_func.jquery.js"></script>


<?php require_once 'req/body_end.php'; ?>