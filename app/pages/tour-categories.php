<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title"> Tour Kategorie </h1>
            <div class="page-options d-flex ">
                 <a href="tour-list"  class="btn btn-sm btn-orange "> <i class="fa fa-long-arrow-left"></i> Zurück zu den Touren   </a>
            </div>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="tour-categories-add" class="btn btn-cyan"> <i class="fe fe-folder-plus"></i> Kategorie hinzufügen</a>
                    <a href="tour-add" class="btn btn-success"> <i class="fe fe-plus"></i>  Tour hinzufügen </a>
                    <a href="tour-date-add" class="btn btn-pink"> <i class="fa fa-calendar-plus-o"></i>  Datum hinzufügen </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Kategorie Name</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $list = $db->get_results("SELECT * FROM the_tour_category ORDER BY category_id DESC");
                        foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->category_id?></th>
                                <th>
                                    <strong><?=$view->name?></strong>
                                </th>
                                <th class="text-center">
                                    <a href="tour-categories-edit?id=<?=$view->category_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->category_id?>','?do=tour-categories&q=delete','tour-categories')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
