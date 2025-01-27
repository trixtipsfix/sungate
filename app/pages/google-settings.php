<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php  $google = $db->get_row("SELECT * FROM site_google_settings WHERE id = 1"); ?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Google Ayarları
            </h1>
        </div>

        <div class="card">

            <form  id="koby_form" role="form" class="form-horizontal" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="">

                        <div class="alert alert-info">
                            Sitenizdeki google ile alakalı tüm alanları buradan güncelleyebilirsiniz.
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="site_google_meta" class="col-sm-3 control-label">Meta Doğrulama Kodu:</label>
                                <div class="col-sm-9">
                                    <textarea name="site_google_meta" id="site_google_meta" class="form-control" cols="30" rows="2" style="resize:none;" placeholder="Konsol doğrulama kodunuzu bu alana girniz."><?=stripcslashes($google->site_google_meta)?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="site_google_analytics" class="col-sm-3 control-label">Google Analitik Profile ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="site_google_analytics" name="site_google_analytics" placeholder="Analitik profil idinizi giriniz. Örnek: UA-********-**" value="<?=$google->site_google_analytics?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="site_google_recaptcha" class="col-sm-3 control-label">Google Recaphta Kodu:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="site_google_recaptcha" name="site_google_recaptcha" placeholder="Recaphata site keyinizi buraya giriniz." value="<?=$google->site_google_recaptcha?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="site_google_map_api" class="col-sm-3 control-label">Google Harita Apiniz:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="site_google_map_api" name="site_google_map_api" placeholder="Google harita api keyiniz." value="<?=$google->site_google_map_api?>" >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <button type="submit" onclick="kobySubmit('?do=google_settings','index/google-settings')" class="btn btn-success btn-lg"><i class="fe fe-check"></i> Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>

