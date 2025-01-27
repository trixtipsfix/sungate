<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
    $hotel_id = g('hotel_id');
    $hotelDetail = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$hotel_id'");
    $hotelRoomRows = $db->get_var("SELECT COUNT(*) FROM the_hotel_room WHERE hotel_id = '$hotel_id' ");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <?php if($hotelRoomRows == 0){ ?>
        <div class="alert alert-info" role="alert">
            <h6><strong><?=$hotelDetail->name?></strong> isimli otele ait henüz bir oda eklenmemiş.</h6>
        </div>
        <?php } ?>
        <div class="page-header">
            <h1 class="page-title"><strong><?=$hotelDetail->name?></strong> isimli otele ait odalar</h1>
            <div class="page-options d-flex ">
                 <a href="hotel-list"  class="btn btn-sm btn-orange "> <i class="fa fa-long-arrow-left"></i> Zurück zu den Hotels</a>
            </div>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="hotel-rooms-add?hotel_id=<?=$hotel_id?>" class="btn btn-success"> <i class="fe fe-plus"></i>  Hotel Zimmer </a>
                    <a href="hotel-features" class="btn btn-warning"> <i class="fe fe-plus"></i> Zimmer specials </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Zimmer Name</th>
                            <th>Hotel Name</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $list = $db->get_results("SELECT * FROM the_hotel_room WHERE hotel_id = '$hotel_id' ORDER BY hotel_id DESC");
                        foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->room_id?></th>
                                <th>
                                    <strong><?=$view->name?></strong>
                                </th>
                                <th>
                                    <?php
                                    $hotelCategory = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$view->hotel_id' ");
                                    echo $hotelCategory->name;
                                    ?>
                                </th>
                                <th class="text-center">
                                    <a href="hotel-rooms-features?id=<?=$view->room_id?>" class="btn btn-pink btn-sm" data-toggle="tooltip" title="Special hinzufügen"><i class="fe fe-git-merge"></i> </a>
                                    <a href="hotel-rooms-images-add?id=<?=$view->room_id?>" class="btn btn-azure btn-sm" data-toggle="tooltip" title="Bild hinzufügen"><i class="fe fe-camera"></i> </a>
                                    <a href="hotel-rooms-images-list?id=<?=$view->room_id?>" class="btn btn-teal btn-sm" data-toggle="tooltip" title="Bilder"><i class="fe fe-image"></i> </a>
                                    <a href="hotel-rooms-edit?id=<?=$view->room_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->room_id?>','?do=hotel-rooms&q=delete','hotel-list')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
                                </th>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
