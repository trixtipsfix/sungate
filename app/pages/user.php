<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Kullanıcılar
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    ...
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Vorname, Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Kayıt</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $rows = $db->get_results("SELECT * FROM users ORDER BY id DESC ");
                        foreach ($rows as $row){
                            ?>
                            <tr>
                                <th> <span class="tag tag-gray-dark"><?=$row->id?></span></th>
                                <th> <strong><?=$row->firstname?> <?=$row->lastname?></strong> </th>
                                <th> <?=$row->telephone?> </th>
                                <th> <?=$row->email?> </th>
                                <th>
                                    <?php if($row->lastlogin_at){ ?>
                                        <div class="tag tag-teal" data-toggle="tooltip" title="Son Giriş: Yaklaşık <?=timeConvert($row->lastlogin_at)?>"><?=timeTR($row->created_at)?></div>
                                    <?php }else{ ?>
                                        <div class="tag tag-gray" data-toggle="tooltip" title="Henüz Anmeldenmamış."><?=timeTR($row->created_at)?></div>
                                    <?php } ?>
                                </th>
                                <th class="text-center">
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$row->id?>','?do=user&q=delete','user')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
