<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

<title><?=$general['site_title']->value;?></title>
<?php require_once 'req/head.php'; ?>

<body id="register_bg">

    <nav id="menu" class="fake_menu"></nav>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->

    <div id="login">
        <aside>
            <figure>
                <a href="index.php"><img src="lib/img/logo_sticky.png" width="110" data-retina="true" alt="" class="logo_sticky"></a>
            </figure>
            <form autocomplete="off">
                <div class="form-group">
                    <label>Your Name</label>
                    <input class="form-control" type="text">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Your Last Name</label>
                    <input class="form-control" type="text">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Your Email</label>
                    <input class="form-control" type="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Your password</label>
                    <input class="form-control" type="password" id="password1">
                    <i class="icon_lock_alt"></i>
                </div>
                <div id="pass-info" class="clearfix"></div>
                <a href="#0" class="btn_1 rounded full-width add_top_30">Register Now!</a>
                <div class="text-center add_top_10">Already have an acccount? <strong><a href="login">Sign In</a></strong></div>
            </form>
            <div class="copy">© 2018 Sungate24</div>
        </aside>
    </div>
    <!-- /login -->

    <?php require_once 'req/script.php'; ?>

    <!-- SPECIFIC SCRIPTS -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="lib/js/mapmarker.jquery.js"></script>
    <script src="lib/js/mapmarker_func.jquery.js"></script>


<?php require_once 'req/body_end.php'; ?>