<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$hotel_id = g('hotel_id');
$hotelDetail = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <h1 class="page-title"> Hotel Zimmer </h1>
            </h1>
            <div class="page-options d-flex ">
                <div class="page-subtitle ">
                    <?php if($hotel_id){ ?>
                    <a href="hotel-rooms?hotel_id=<?=$hotel_id?>"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Zimmern
                    </a><strong><?=$hotelDetail->name?> </strong> isimli otele oda ekliyorsunuz..
                    <?php }else{ ?>
                    <a href="hotel-room-list"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Zimmern
                    </a>
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
                                <label class="form-label">Zimmer Name</label>
                                <input type="text" class="form-control" name="name">
                                <?php if($hotel_id){ ?>
                                <input type="hidden" name="hotel_id" value="<?=$hotel_id?>">
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Zimmer Info </label>
                                <textarea class="form-control" id="editor" name="content"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Preis Erwachsene</label>
                                        <input type="text" class="form-control" name="person_price" placeholder="Örnek: 10.00">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Preis Kind</label>
                                        <input type="text" class="form-control" name="child_price" placeholder="Örnek: 10.00">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Zimmer quadratmeter olarak</label>
                                        <input type="text" class="form-control" name="room_size" placeholder="Örnek: 120">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Bett Anzahl</label>
                                        <input type="text" class="form-control" name="beds_number" placeholder="Örnek: 2">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-4 col-lg-4">
                            <fieldset class="form-fieldset">


                                <div class="form-group">
                                    <label class="form-label">Zugeordnet zum Hotel</label>
                                    <select name="hotel_id" id="hotel_id" class="form-control custom-select" <?php if($hotel_id){echo 'disabled';} ?> >
                                        <option value="0"> Otel Seçiniz</option>
                                        <?php
                                            $hotelLists = $db->get_results("SELECT * FROM the_hotel ORDER BY hotel_id DESC");
                                            foreach ($hotelLists as $hotelLis){
                                        ?>
                                        <option value="<?=$hotelLis->hotel_id?>" <?php if($hotel_id == $hotelLis->hotel_id){echo 'selected';} ?> > <?=$hotelLis->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-label"> Wallpaper Bild </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="picture">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">  Anzeigen?</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" checked="">
                                            <span class="selectgroup-button">Ja, anzeigen.</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Nein, nur abspeichern</span>
                                        </label>
                                    </div>
                                </div>


                                <button type="submit"   onclick="kobySubmit('?do=hotel-room&q=add','hotel-list')" class="btn btn-block btn-success btn-lg"> Speichern und Schließen <i class="fe fe-save"></i>  </button>

                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

