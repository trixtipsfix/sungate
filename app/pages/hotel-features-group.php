<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Otel Özellik Grupları
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="hotel-features-group-add" class="btn btn-indigo"> <i class="fe fe-plus"></i> Gruppe hinzufügen </a>
                    <a href="hotel-features-add" class="btn btn-indigo"> <i class="fe fe-plus"></i> Special hinzufügen </a>
                    <a href="hotel-features-group" class="btn btn-indigo"> <i class="fe fe-list"></i> Gruplar  </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#Sıra</th>
                            <th>Gruppen Name</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $list = $db->get_results("SELECT * FROM the_hotel_room_features_group ORDER BY rank ASC");
                        foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->rank?></th>
                                <th>
                                    <strong><?=$view->name?></strong>
                                </th>
                                <th class="text-center">
                                    <a href="hotel-features-group-edit?id=<?=$view->features_gid?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->features_gid?>','?do=hotel-features-group&q=delete','hotel-features-group')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
