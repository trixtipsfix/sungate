<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$rowID = g('id');
$view = $db->get_row("SELECT * FROM social_networks WHERE id = '$rowID' ");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Sosyal Ağ Düzenle
            </h1>
        </div>

        <div class="card">

            <form  id="koby_form" role="form" class="form-horizontal" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="name" class="col-sm-3 control-label">Başlık</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="<?=$view->name?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="icon" class="col-sm-3 control-label">Icon</label>
                            <div class="col-sm-9">
                                <select name="icon" id="icon" class="form-control">
                                    <option <?php if($view->icon == 'fa fa-facebook'){ echo 'selected'; } ?> value="fa fa-facebook">Facebook</option>
                                    <option <?php if($view->icon == 'fa fa-twitter'){ echo 'selected'; } ?> value="fa fa-twitter">Twitter</option>
                                    <option <?php if($view->icon == 'fa fa-instagram'){ echo 'selected'; } ?> value="fa fa-instagram">Instagram</option>
                                    <option <?php if($view->icon == 'fa fa-whatsapp'){ echo 'selected'; } ?> value="fa fa-whatsapp">Whatsapp</option>
                                    <option <?php if($view->icon == 'fa fa-tumblr'){ echo 'selected'; } ?> value="fa fa-tumblr">Tumblr</option>
                                    <option <?php if($view->icon == 'fa fa-google'){ echo 'selected'; } ?> value="fa fa-google-plus">Google Plus</option>
                                    <option <?php if($view->icon == 'fa fa-skype'){ echo 'selected'; } ?> value="fa fa-skype">Skype</option>
                                    <option <?php if($view->icon == 'fa fa-pinterest'){ echo 'selected'; } ?> value="fa fa-pinterest">Pinterest</option>
                                    <option <?php if($view->icon == 'fa fa-linkedin'){ echo 'selected'; } ?> value="fa fa-linkedin">Linkedin</option>
                                    <option <?php if($view->icon == 'fa fa-foursquare'){ echo 'selected'; } ?> value="fa fa-foursquare">Foursquare</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <label for="link" class="col-sm-3 control-label">Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="link" name="link" value="<?=$view->link?>">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <label for="rank" class="col-sm-3 control-label">Sıra</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="rank" name="rank" value="<?=$view->rank?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-left">
                    <button type="submit" onclick="$.kobySubmit('?do=social&q=edit&id=<?=$rowID?>','?q=social_networks')" class="btn btn-success btn-lg"><i class="fe fe-refresh-cw"></i> Güncelle</button>
                </div>

            </form>
        </div>
    </div>
</div>

