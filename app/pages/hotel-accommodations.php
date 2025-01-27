<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title"> Art der Unterkunft </h1>
            <div class="page-options d-flex ">
                 <a href="hotel-list"  class="btn btn-sm btn-orange "> <i class="fa fa-long-arrow-left"></i> Zurück zu den Hotels</a>
            </div>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="hotel-accommodations-add" class="btn btn-success"> <i class="fe fe-plus"></i>  Zimmer Typen hinzufügen </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Unterkunft Typ Name</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php
                            $list = $db->get_results("SELECT * FROM the_hotel_accommodation ORDER BY accommodation_id DESC");
                                foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->accommodation_id?></th>
                                <th>
                                    <strong><?=$view->name?></strong>
                                </th>
                                <th class="text-center">
                                    <a href="hotel-accommodations-edit?id=<?=$view->accommodation_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->accommodation_id?>','?do=hotel-accommodations&q=delete','hotel-accommodations')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
