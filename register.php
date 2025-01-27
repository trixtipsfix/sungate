<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

<title>Registrieren - <?=$general['site_title']->value;?></title>
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
                <a href="./"><img src="lib/img/logo_sticky.png" width="110" data-retina="true" alt="" class="logo_sticky"></a>
            </figure>
            <form id="userRegisterForm" action="" onsubmit="return false" method="POST" >
                <div class="form-group">
                    <label>Dein Name</label>
                    <input class="form-control" name="firstname" id="firstname" type="text">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Dein Nachname</label>
                    <input class="form-control" name="lastname" id="lastname" type="text">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Deine E-Mail</label>
                    <input class="form-control" name="eposta" id="eposta" type="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Ihr Passwort</label>
                    <input class="form-control" type="password" id="password1" name="password" id="password">
                    <i class="icon_lock_alt"></i>
                </div>
                <div id="pass-info" class="clearfix"></div>
                <input class="btn_1 rounded full-width add_top_30" onclick="userRegister();" type="submit" value="Jetzt registrieren!" />
                <div class="text-center add_top_10">Hast du schon ein Konto? <strong><a href="login">Einloggen</a></strong></div>
            </form>
            <div class="text-center"><a class="btn btn-primary" href="/"> <i class="fa fa-home"></i> Home</a></div>
            <div class="copy">© <?=date('Y')?> Sungate24</div>
        </aside>
    </div>
    <!-- /login -->


<?php require_once 'req/body_end.php'; ?>