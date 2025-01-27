<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Rezervasyonlar
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                            <tr>
                                <th class="nosort">Rez. No</th>
                                <th class="nosort">Rez. Type</th>
                                <th>Vorname, Name</th>
                                <th>Betrag</th>
                                <th class="text-center">Datum</th>
                                <th class="nosort text-center">Aktionen</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $rows = $db->get_results("SELECT * FROM reservations ORDER BY id DESC ");
                        foreach ($rows as $row){
                            $userDetail = $db->get_row("SELECT * FROM users WHERE id = '$row->user_id'");
                            if($row->tour_id){
                                $tourDetail = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$row->tour_id'");
                            }
                        ?>
                            <tr>
                                <th> <span class="tag tag-gray-dark"><?=$row->rezervation_number?></span></th>
                                <th>
                                    <div><?=$tourDetail->name?></div>

                                    <span class="tag tag-gray-dark"><?=$row->rezervation_type?></span>
                                </th>
                                <th> <strong><?=$userDetail ->firstname?> <?=$userDetail ->lastname?></strong></th>
                                <th> <?=$row->total_price?> € </th>
                                <th class="text-center">
                                    <div class="tag tag-gray"><?=timeTR($row->created_at)?></div>
                                </th>
                                <th class="text-center">

                                    <a href="javascript:void(0)" onclick="$.kobyDelete('<?=$row->id?>','?do=otel-rezervasyon&q=delete','otel-reservations')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
