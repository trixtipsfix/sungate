<!doctype html>
<html lang="tr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en"/>
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"/>
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/vendors/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet"/>
    <script src="./assets/js/dashboard.js"></script>
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet"/>
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet"/>
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <script src="./assets/js/validation.min.js"></script>
    <script src="./assets/js/login.js"></script>

</head>

<body class="">
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="assets/images/mind_factory_logo.png" width="100" alt="">
                    </div>
                    <form class="card" id="login-form" action="" method="post">
                        <div class="card-body p-6">
                            <div class="card-title">Zugang Verwaltung</div>

                            <div id="error">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Ihre Email</label>
                                <input type="email" name="email" class="form-control" id="signin-email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Ihr Passwort
                                    <!--<a href="./forgot-password.html" class="float-right small"> Şifremi Unuttum? </a> !-->
                                </label>
                                <input type="password" name="password" class="form-control" id="signin-password">
                                <span id="check-e"></span>
                            </div>
                            <!--
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"/>
                                    <span class="custom-control-label">Beni Hatırla</span>
                                </label>
                            </div> !-->
                            <div class="form-footer">
                                <button type="submit" name="btn-login" id="btn-login"  class="btn btn-primary btn-block"> Einloggen </button>
                            </div>
                        </div>
                    </form>
                    <!--
                    <div class="text-center text-muted">
                        Bir sorun ile karşılaşıyorum. <a href="./register.html">Yardım Almak istiyorum.</a>
                    </div>!-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>