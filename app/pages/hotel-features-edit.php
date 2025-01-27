<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$view = $db->get_row("SELECT * FROM the_hotel_room_features WHERE features_id = '$id'");
?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <h1 class="page-title">  Özellik Düzenle</h1>
            </h1>
            <div class="page-options d-flex ">
                <div class="page-subtitle ">
                    <a href="hotel-features"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Özelliklere Geri Dön   </a>
                </div>
            </div>
        </div>



        <div class="card">
            <form id="koby_form" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="form-group">
                                <label class="form-label"> Special Name</label>
                                <input type="text" class="form-control" name="name" value="<?=$view->name?>">
                            </div>


                        </div>
                        <div class="col-md-4 col-lg-4">
                            <fieldset class="form-fieldset">


                                <div class="form-group">
                                    <label class="form-label">Zugeordnet zur Gruppe</label>
                                    <select name="feature_group_id" id="feature_group_id" class="form-control custom-select">
                                        <option value="0"> Lütfen Seçiniz</option>
                                        <?php
                                        $ozellikGruplari = $db->get_results("SELECT * FROM the_hotel_room_features_group ORDER BY name ASC");
                                        foreach ($ozellikGruplari as $ozellikGrup){
                                            ?>
                                            <option value="<?=$ozellikGrup->features_gid?>" <?php if($view->feature_group_id == $ozellikGrup->features_gid){echo 'selected';} ?> ><?=$ozellikGrup->name?></option>
                                        <?php }  ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"> Special Rank</label>
                                    <input type="number" class="form-control" name="rank" value="1">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">  Anzeigen?</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($view->status == '1'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Ja, anzeigen.</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($view->status == '0'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Nein, nur abspeichern</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit"   onclick="kobySubmit('?do=hotel-features&q=edit&id=<?=$view->features_id?>','hotel-features')" class="btn btn-block btn-success btn-lg"> Speichern und Schließen <i class="fe fe-save"></i>  </button>


                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

