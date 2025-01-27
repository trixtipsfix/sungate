<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$view = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$id'");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <strong><?=$view->name?></strong> Resim Ekle
            </h1>
        </div>

        <div class="card">

            <form id="koby_form" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">

                            <input type="hidden" name="hotel_id" value="<?=$view->name?>" >
                            <div class="form-group">
                                <label for="picture"> <i class="fa fa-picture-o"></i>  Resimleri Seç </label>
                                <input type="file" class="form-control" multiple id="picture" name="pictures[]">
                            </div>

                        </div>
                        <div class="col-md-4 col-lg-4">

                            <div class="form-group">
                                <label class="form-label">  Anzeigen?</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="1" class="selectgroup-input"checked>
                                        <span class="selectgroup-button">Ja, anzeigen.</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="0" class="selectgroup-input">
                                        <span class="selectgroup-button">Nein, nur abspeichern</span>
                                    </label>
                                </div>
                            </div>

                            <fieldset class="form-fieldset">
                                <button type="submit" onclick="kobySubmit('?do=hotel&q=pic-add&id=<?=$id?>','hotel-images-list?id=<?=$id?>')" class="btn btn-block btn-success btn-lg"> Kaydet ve Düzenle <i class="fe fe-save"></i>  </button>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

