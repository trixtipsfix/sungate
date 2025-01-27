<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Zimmer specials
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="hotel-features-add" class="btn btn-indigo"> <i class="fe fe-plus"></i> Special hinzufügen </a>
                    <a href="hotel-features-group-add" class="btn btn-indigo"> <i class="fe fe-plus"></i> Gruppe hinzufügen </a>
                    <a href="hotel-features-group" class="btn btn-indigo"> <i class="fe fe-list"></i> Gruppen  </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Special Name</th>
                            <th>Özellik Grubu </th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $list = $db->get_results("SELECT * FROM the_hotel_room_features ORDER BY rank ASC ");
                        foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->features_id?></th>
                                <th>
                                    <strong><?=$view->name?></strong>
                                </th>
                                <th>
                                    <?php
                                    $Category = $db->get_row("SELECT * FROM the_hotel_room_features_group WHERE features_gid = '$view->feature_group_id' ");
                                    echo $Category->name;
                                    ?>
                                </th>
                                <th class="text-center">
                                    <!--<a href="hotel-detail?id<?=$view->hotel_id?>" class="btn btn-orange btn-sm" data-toggle="tooltip" title="Schauen"><i class="fe fe-search"></i> </a> !-->
                                    <a href="hotel-features-edit?id=<?=$view->features_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->features_id?>','?do=hotel-features&q=delete','hotel-features')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
