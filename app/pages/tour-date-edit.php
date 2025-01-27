<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$dateDetail = $db->get_row("SELECT * FROM the_tour_date WHERE date_id = '$id'");
$tour_id = $dateDetail->tour_id;
$tourDetail = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id'");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <h1 class="page-title"> Tur Tarihi Düzenle</h1>
            </h1>
            <div class="page-options d-flex ">
                <div class="page-subtitle ">
                    <?php if($tour_id){ ?>
                        <a href="tour-dates-list?tour_id=<?=$tour_id?>"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Touren   </a><strong><?=$tourDetail->name?> </strong> isimli tura ait tarihi düzenliyorsunuz..
                    <?php }else{ ?>
                        <a href="tour-dates-list"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Touren   </a>
                    <?php } ?>
                </div>
            </div>
        </div>



        <div class="card">
            <form id="koby_form" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">


                            <div class="form-group">
                                <label class="form-label">Zugehörige Tour hinzufügen </label>

                               
                                    <select name="tour_id" id="tour_id" class="form-control custom-select">
                                        <option value="0"> Tur Seçiniz</option>
                                        <?php
                                        $tourLists = $db->get_results("SELECT * FROM the_tour ORDER BY tour_id DESC LIMIT 20");
                                        foreach ($tourLists as $tourList){
                                            ?>
                                            <option value="<?=$tourList->tour_id?>" <?php if($tour_id == $tourList->tour_id){echo 'selected';} ?> > <?=$tourList->name?></option>
                                        <?php } ?>
                                    </select>

                            </div>


                            <div class="form-group">
                                <label class="form-label"> Info zur Tour </label>
                                <textarea class="form-control" id="editor" name="description"><?=$dateDetail->description?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Preis Erwachsene</label>
                                        <input type="number" class="form-control" name="person_price" value="<?=$dateDetail->person_price?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Preis Kind</label>
                                        <input type="number" class="form-control" name="child_price" value="<?=$dateDetail->child_price?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Maximale Teilnahme </label>
                                        <input type="number" class="form-control" name="tour_limit" value="<?=$dateDetail->tour_limit?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Preis </label>
                                        <input type="number" class="form-control" name="price_tour" value="<?=$dateDetail->price_tour?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Rabatt </label>
                                        <input type="number" class="form-control" name="price_discount" value="<?=$dateDetail->price_discount?>">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-4 col-lg-4">
                            <fieldset class="form-fieldset">

                                <div class="form-group">
                                    <label class="form-label"> Beginn </label>
                                    <input type="text" class="form-control" name="tour_start_date" data-toggle="datepicker" value="<?=$dateDetail->tour_start_date?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label"> Ende</label>
                                    <input type="text" class="form-control" name="tour_finish_date" data-toggle="datepicker" value="<?=$dateDetail->tour_finish_date?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">  Anzeigen?</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($dateDetail->status == '1'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Ja, anzeigen.</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($dateDetail->status == '0'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Nein, nur abspeichern</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit"   onclick="kobySubmit('?do=tour&q=date-edit&id=<?=$dateDetail->date_id?>','tour-date-edit?id=<?=$dateDetail->date_id?>')" class="btn btn-block btn-success btn-lg"> Speichern und Schließen <i class="fe fe-save"></i>  </button>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

