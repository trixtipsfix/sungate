

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Neu
            </h1>
        </div>

        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading" style="">
                                <div class="title">Neue Hotel Reservierungen </div>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="nosort">Rez. No</th>
                                        <th>Vorname, Name</th>
                                        <th>Betrag</th>
                                        <th class="text-center">Datum</th>
                                        <th class="nosort text-center">Aktionen</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $rows = $db->get_results("SELECT * FROM reservations WHERE rezervation_type = 'hotel' ORDER BY id DESC LIMIT 5 ");
                                    foreach ($rows as $row){
                                        $userDetail = $db->get_row("SELECT * FROM users WHERE id = '$row->user_id'");
                                        if($row->tour_id){
                                            $tourDetail = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$row->tour_id'");
                                        }
                                        ?>
                                        <tr>
                                            <th> <span class="tag tag-gray-dark"><?=$row->rezervation_number?></span></th>
                                            <th> <strong><?=$userDetail ->firstname?> <?=$userDetail ->lastname?></strong></th>
                                            <th> <?=$row->total_price?> € </th>
                                            <th class="text-center">
                                                <div class="tag tag-gray"><?=timeTR($row->created_at)?></div>
                                            </th>
                                            <th class="text-center">
                                                <a href="otel-reservation-info?id=<?=$row->id?>" class="btn btn-orange btn-sm" data-toggle="tooltip" title="Detaylar"><i class="fe fe-search"></i> </a>
                                            </th>
                                        </tr>
                                    <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading" style="">
                                <div class="title">Neue Tour Reservierungen</div>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="nosort">Rez. No</th>
                                        <th>Vorname, Name</th>
                                        <th>Betrag</th>
                                        <th class="text-center">Datum</th>
                                        <th class="nosort text-center">Aktionen</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $rows = $db->get_results("SELECT * FROM reservations WHERE rezervation_type = 'tour' ORDER BY id DESC LIMIT 5 ");
                                    foreach ($rows as $row){
                                        $userDetail = $db->get_row("SELECT * FROM users WHERE id = '$row->user_id'");
                                        if($row->tour_id){
                                            $tourDetail = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$row->tour_id'");
                                        }
                                        ?>
                                        <tr>
                                            <th> <span class="tag tag-gray-dark"><?=$row->rezervation_number?></span></th>
                                            <th> <strong><?=$userDetail ->firstname?> <?=$userDetail ->lastname?></strong></th>
                                            <th> <?=$row->total_price?> € </th>
                                            <th class="text-center">
                                                <div class="tag tag-gray"><?=timeTR($row->created_at)?></div>
                                            </th>
                                            <th class="text-center">
                                                <a href="otel-reservation-info?id=<?=$row->id?>" class="btn btn-orange btn-sm" data-toggle="tooltip" title="Detaylar"><i class="fe fe-search"></i> </a>
                                            </th>
                                        </tr>
                                    <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

