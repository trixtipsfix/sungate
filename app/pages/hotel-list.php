<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Hotels
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="hotel-add" class="btn btn-success"> <i class="fe fe-plus"></i>  Hotel hinzufügen </a>
                    <a href="hotel-types-add" class="btn btn-azure"> <i class="fe fe-plus"></i> Hotel Typ </a>
                    <a href="hotel-categories-add" class="btn btn-cyan"> <i class="fe fe-folder-plus"></i> Kategorie hinzufügen </a>
                    <a href="hotel-themes-add" class="btn btn-lime"> <i class="fe fe-plus"></i> Themen hinzufügen </a>
                    <a href="hotel-accommodations-add" class="btn btn-purple"> <i class="fe fe-plus"></i> Zimmer Typen hinzufügen</a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Hotel Name</th>
                            <th>Hotel Kategorie</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            $list = $db->get_results("SELECT * FROM the_hotel ORDER BY hotel_id DESC");
                            foreach ($list as $view){
                        ?>

                            <tr>
                                <th>#<?=$view->hotel_id?></th>
                                <th>
                                    <strong><?=$view->name?></strong> <br>
                                    <?=hotelStars($view->stars)?>
                                </th>
                                <th>
                                    <?php
                                        $hotelCategory = $db->get_row("SELECT * FROM the_hotel_category WHERE category_id = '$view->hotel_category_id' ");
                                        echo $hotelCategory->name;
                                    ?>
                                </th>
                                <th class="text-center">
                                    <!--<a href="hotel-detail?id<?=$view->hotel_id?>" class="btn btn-orange btn-sm" data-toggle="tooltip" title="Schauen"><i class="fe fe-search"></i> </a> !-->
                                    <a href="hotel-images-add?id=<?=$view->hotel_id?>" class="btn btn-azure btn-sm" data-toggle="tooltip" title="Bild hinzufügen"><i class="fe fe-camera"></i> </a>
                                    <a href="hotel-images-list?id=<?=$view->hotel_id?>" class="btn btn-teal btn-sm" data-toggle="tooltip" title="Bilder"><i class="fe fe-image"></i> </a>
                                    <a href="hotel-edit?id=<?=$view->hotel_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="hotel-rooms?hotel_id=<?=$view->hotel_id?>" class="btn btn-orange btn-sm" data-toggle="tooltip" title="Zimmer"><i class="fa fa-bed"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->hotel_id?>','?do=hotel&q=delete','hotel-list')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
