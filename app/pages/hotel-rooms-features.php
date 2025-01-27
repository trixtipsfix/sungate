<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$room_id = g('id');
$roomDetail = $db->get_row("SELECT * FROM the_hotel_room WHERE room_id = '$room_id'");

$hotel_id = $roomDetail->hotel_id;
$hotelDetail = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <h1 class="page-title"> Odaya Special hinzufügen </h1>
            </h1>
            <div class="page-options d-flex ">
                <div class="page-subtitle ">
                        <strong><?=$roomDetail->name?> </strong> isimli oda özellik ekliyorsunuz..
                        <a href="hotel-rooms?hotel_id=<?=$hotel_id?>"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Zimmern
                        </a>

                </div>
            </div>
        </div>



        <div class="card">
            <form id="koby_form" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="row">
                                <input type="hidden" name="<?=$roomDetail->name?>">
                                <?php
                                $groupLists = $db->get_results("SELECT * FROM the_hotel_room_features_group ORDER BY rank ASC");
                                foreach ($groupLists  as $groupList ){
                                ?>

                                <div class="col-4 mb-4">
                                    <h6 class="mb-3 lead"><?=$groupList->name?></h6>
                                    <?php
                                    $featuresLists = $db->get_results("SELECT * FROM the_hotel_room_features WHERE feature_group_id = '$groupList->features_gid' ORDER BY rank ASC");
                                    foreach ($featuresLists  as $featuresList ){
                                        $aktif = $db->get_row("SELECT * FROM the_hotel_room_features_relationship WHERE room_id = '$room_id' AND features_id = '$featuresList->features_id'");
                                    ?>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="hidden" name="features[<?=$featuresList->features_id?>]" value="0">
                                                <input type="checkbox" name="features[<?=$featuresList->features_id?>]" value="1" <?php if(!empty($aktif)){echo 'checked';} ?> >
                                                <?=$featuresList->name?>

                                            </label>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                                <?php } ?>


                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <fieldset class="form-fieldset">
                                <button type="submit"   onclick="kobySubmit('?do=hotel-room&q=features-add&id=<?=$roomDetail->room_id?>','hotel-rooms-features?id=<?=$roomDetail->room_id?>')" class="btn btn-block btn-success btn-lg"> Speichern und Schließen <i class="fe fe-save"></i>  </button>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

