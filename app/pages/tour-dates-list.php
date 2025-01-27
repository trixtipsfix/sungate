<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
    $tour_id = g('tour_id');
    if($tour_id){
        $tourDetail = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$tour_id' ");
    }
?>
<div class="my-3 my-md-5">
    <div class="container">
    <div class="page-header">
            <h1 class="page-title">
                <h1 class="page-title"> Tur Tarihleri </h1>
            </h1>
            <div class="page-options d-flex ">
                <div class="page-subtitle ">
                    <strong><?=$tourDetail->name?> </strong> isimli tura ait tarihleri
                    <a href="tour-list"  class="btn btn-sm btn-orange mr-4"> <i class="fa fa-long-arrow-left"></i> Zurück zu den Touren   </a>
                </div>
            </div>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <?php  if(!$tour_id){ ?>
                    <a href="tour-date-add" class="btn btn-pink"> <i class="fa fa-calendar-plus-o"></i>  Datum hinzufügen </a>
                    <?php }else{ ?>
                    <a href="tour-date-add?tour_id=<?=$tour_id?>" class="btn btn-pink"> <i class="fa fa-calendar-plus-o"></i>  Datum hinzufügen </a>
                    <?php } ?>
                    <a href="tour-add" class="btn btn-success"> <i class="fe fe-plus"></i>  Tour hinzufügen </a>
                    <a href="tour-categories" class="btn btn-cyan"> <i class="fe fe-plus"></i> Kategorie</a>
                    <a href="tour-categories-add" class="btn btn-cyan"> <i class="fe fe-plus"></i> Kategorie hinzufügen</a>
                    <a href="tour-categories" class="btn btn-lime"> <i class="fe fe-plus"></i> Program Ekle </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <?php  if(!$tour_id){ ?>
                            <th>Tour Name</th>
                            <?php } ?>
                            <th>Başlangıç ve Bitiş Tarihi</th>
                            <th>Fiyatlar</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            if($tour_id){
                                $list = $db->get_results("SELECT * FROM the_tour_date WHERE tour_id = '$tour_id' ORDER BY tour_id,date_id DESC");
                            }else{
                                $list = $db->get_results("SELECT * FROM the_tour_date ORDER BY tour_id,date_id DESC");
                            }
                            foreach ($list as $view){
                        ?>

                            <tr>
                                <th>#<?=$view->tour_id?></th>
                                <?php  if(!$tour_id){ ?>
                                <th>
                                    <?php
                                    $tourDetail = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$view->tour_id' ");
                                    echo $tourDetail->name;
                                    ?><strong><?=$view->name?></strong> <br>
                                </th>
                                <?php } ?>
                                <th><?=dateTR($view->tour_start_date)?> - <?=dateTR($view->tour_finish_date)?></th>
                                <td>
                                    <?=$view->person_price?> TL Erwachsene <br>
                                    <?=$view->child_price?> TL Kind
                                </td>
                                <th class="text-center">
                                    <a href="tour-date-edit?id=<?=$view->date_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->date_id?>','?do=tour&q=delete','tour-list')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
