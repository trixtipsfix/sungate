<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
    $id = g('id');
    $groupDetail = $db->get_row("SELECT * FROM the_hotel_room_features_group WHERE features_gid = '$id'");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <h1 class="page-title">  Özellik Grubu Düzenle </h1>
            </h1>
            <div class="page-options d-flex ">
                <div class="page-subtitle ">
                    <a href="hotel-features-group"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Gruppen   </a>
                </div>
            </div>
        </div>



        <div class="card">
            <form id="koby_form" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="form-group">
                                <label class="form-label"> Gruppen Name</label>
                                <input type="text" class="form-control" name="name" value="<?=$groupDetail->name?>">
                                <input type="hidden" name="features_gid" value="<?=$id?>">
                            </div>

                            <div class="form-group">
                                <label class="form-label"> Info zur Tour </label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"> <?=$groupDetail->description?> </textarea>
                            </div>


                        </div>
                        <div class="col-md-4 col-lg-4">
                            <fieldset class="form-fieldset">


                                <div class="form-group">
                                    <label class="form-label"> Gruppen Ranking</label>
                                    <input type="number" class="form-control" name="rank" value="<?=$groupDetail->rank?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">  Anzeigen?</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($groupDetail->status == '1'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Ja, anzeigen.</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($groupDetail->status == '0'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Nein, nur abspeichern</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit"   onclick="kobySubmit('?do=hotel-features-group&q=edit&id=<?=$id?>','hotel-features-group')" class="btn btn-block btn-success btn-lg"> Speichern und Schließen <i class="fe fe-save"></i>  </button>


                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

