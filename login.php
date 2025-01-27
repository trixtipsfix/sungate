<?php require_once 'req/start.php'; ?>

<?php require_once 'req/head_start.php'; ?>
    <title>Anmeldung - <?=$general['site_title']->value;?></title>
<?php require_once 'req/head.php'; ?>
<?php require_once 'req/script.php'; ?>
<body id="register_bg">
    <nav id="menu" class="fake_menu"></nav>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->

    <div id="login">
        <aside>
            <figure>
                <a href="./">
                    <img src="lib/img/logo_sticky.png" width="155" height="36" data-retina="true" alt="" class="logo_sticky">
                </a>
            </figure>
            <div class="">
                <?php
                @$q = g('q');
                if($q == 'aktivasyon'){
                    @$eposta = g('email');
                    @$active_kod = g('kod');
                    if($aktivasyon || $eposta || $active_kod){
                        $sorgu = "SELECT count(id) FROM users WHERE email='$eposta' AND active_kod = '$active_kod' ";
                        if ($db->get_var($sorgu) > 0) {
                            $sorgu2 = "SELECT * FROM users WHERE email='$eposta' AND active_kod = '$active_kod' AND durum = 0";
                            if ($sonuc2 = $db->get_row($sorgu2)) {
                                $userUpdate = $db->query("UPDATE users SET
	                                                  activation_date = '$simdikiZaman',
	                                                  activation_ip = '$ipAdresi',
	                                                  durum = 1
	                                                  WHERE email='$eposta' AND active_kod = '$active_kod' ");
                                if($userUpdate){
                                    echo bilgi('Erfolgreich','Erfolgreich aktiviert, Sie können sich jetzt anmelden.','success');
                                }else{
                                    echo bilgi('Error','Die Aktivierung konnte nicht abgeschlossen werden. Versuchen Sie es später erneut. Wenn das Problem weiterhin besteht, wenden Sie sich an uns.','danger');
                                }
                            } else {
                                echo bilgi('Information','Diese E-Mail-Adresse wurde bereits genehmigt. Bitte melden Sie sich an.','warning');
                            }
                        } else {
                            echo BILGI('Error','Auf unserer Website ist keine solche E-Mail-Adresse registriert..','danger');
                        }
                    }
                }
                ?>
            </div>
            <form id="userLogin" action="" onsubmit="return false" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Passwort</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="clearfix add_bottom_30">
                    <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Passwort vergessen?</a></div>
                </div>
                <button class="btn_1 rounded full-width" onclick="userLogin('<?=$rezervasyonNo?>');" type="submit"> Anmeldung </button>
                <div class="text-center add_top_10"><strong><a href="register">Anmelden!</a></strong></div>
            </form>

            <div class="text-center"><a class="btn btn-primary" href="/"> <i class="fa fa-home"></i> Home</a></div>
            <div class="copy">© <?=date('Y')?> Sungate24</div>
        </aside>
    </div>
    <!-- /login -->


<?php require_once 'req/body_end.php'; ?>