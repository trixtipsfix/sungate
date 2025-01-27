<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title"> Region </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="province-add" class="btn btn-cyan"> <i class="fe fe-plus"></i> Stadt hinzufügen </a>
                    <a href="state-add" class="btn btn-success"> <i class="fe fe-plus"></i>  Landkreis </a>
                    <a href="district-add" class="btn btn-pink"> <i class="fe fe-plus"></i>  Gegend </a>
                    <a href="neighborhood-add" class="btn btn-primary"> <i class="fe fe-plus"></i>  Gegend hinzufügen </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Region Name</th>
                            <th>Zugeordnet zur Stadt</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $list = $db->get_results("SELECT * FROM ilce ORDER BY ilce_adi ASC");
                        foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->id?></th>
                                <th>
                                    <strong><?=$view->ilce_adi?></strong>
                                </th>
                                <th>
                                    <?php $hotelCategory = $db->get_row("SELECT * FROM il WHERE id = '$view->il_id'");  ?>
                                    <strong><?=$hotelCategory->il_adi?></strong>
                                </th>
                                <th class="text-center">
                                    <a href="state-edit?id=<?=$view->id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->id?>','?do=state&q=delete','state-list')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
