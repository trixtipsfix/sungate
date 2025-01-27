<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Hotel Comments
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card"> 
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Hotel Name</th>
                            <th>Puan</th>
                            <th>Adsoyad - Email </th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            $list = $db->get_results("SELECT * FROM the_hotel_comment ORDER BY status ASC,created_at DESC");
                            foreach ($list as $view){
                                $hotelSrc = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$view->hotel_id' ");
                        ?>

                            <tr>
                                <th>#<?=$view->id?></th>
                                <th><?=$hotelSrc->name?></th>
                                <th><?=commentStars($view->rating_review)?></th>
                                <th><strong><?=$view->name?> - <?=$view->email?></strong></th>
                                <th><textarea name="content" class="form-control" onchange="contentChange(this,'?do=hotel_comment&q=comment-change')" id="<?=$view->id?>" cols="30" rows="3"><?=$view->content?></textarea></th>
                                <th><?=$view->created_at?></th>
                                <th class="text-center">
                                    <label class="custom-switch">
                                        <input type="checkbox" onchange="icerikdurum(this,'?do=hotel_comment&q=comment-status')" id="<?=$view->id?>" value="<?=$view->id?>" name="status" class="custom-switch-input" <?php if($view->status == 1){echo 'checked';} ?>>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                    <br>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->id?>','?do=hotel_comment&q=delete','hotel-comments')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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
