<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<title>Nehmen Sie Kontakt mit uns auf! - <?=$general['site_title']->value;?></title>
<?php require_once 'req/head.php'; ?>
    <!-- SPECIFIC CSS -->
    <link href="lib/css/blog.css" rel="stylesheet">

<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>
        <section class="hero_in contacts">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Nehmen Sie Kontakt mit uns auf!</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="contact_info">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <i class="pe-7s-map-marker"></i>
                        <h4>Adresse</h4>
                        <span> Dorfstr. Sadenbeck 76, 16928 <br> Pritzwalk OT Sadenbeck </span>
                    </li>
                    <li>
                        <i class="pe-7s-mail-open-file"></i>
                        <h4>Email address</h4>
                        <span> info[@]sungate24.com </span>

                    </li>
                    <li>
                        <i class="pe-7s-phone"></i>
                        <h4>Telefon </h4>
                        <span>  0800 711 82 17 </span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/contact_info-->

        <div class="bg_color_1">
            <div class="container margin_80_55">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <img src="data/suppoert_girl.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6">
                        <h4>Senden Sie uns Ihre Nachricht</h4>
                        <p>Bitte füllen Sie das Formular vollständig aus. </p>
                        <div id="message-contact"></div>
                        <form method="post" action="assets/contact.php" id="contactform" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vorname</label>
                                        <input class="form-control" type="text" id="name_contact" name="name_contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nachname</label>
                                        <input class="form-control" type="text" id="lastname_contact" name="lastname_contact">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" id="email_contact" name="email_contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input class="form-control" type="text" id="phone_contact" name="phone_contact">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <label>Nachricht</label>
                                <textarea class="form-control" id="message_contact" name="message_contact" style="height:150px;"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Wie lautet das Ergebniss 3+1 ? =</label>
                                        <input class="form-control" type="text" id="verify_contact" name="verify_contact">
                                    </div>
                                </div>
                            </div>
                            <p class="add_top_30"><input type="submit" value="Senden" class="btn_1 rounded" id="submit-contact"></p>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>
    <!--/main-->

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>

    <!-- SPECIFIC SCRIPTS -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="lib/js/mapmarker.jquery.js"></script>
    <script src="lib/js/mapmarker_func.jquery.js"></script>


<?php require_once 'req/body_end.php'; ?>