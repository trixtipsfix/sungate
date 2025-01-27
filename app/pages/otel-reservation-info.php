<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$view = $db->get_row("SELECT * FROM reservations WHERE id = '$id'");
?>
<div class="my-3 my-md-5">
    <div class="container">

        <div class="page-header">
            <h1 class="page-title">
                Hotel Reservations Info #<?=$view->rezervation_number?>
            </h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice" id="invoice">
                            <?php
                            $userID = $view->user_id;
                            $userSearch = $db->get_row("SELECT * FROM users WHERE id = '$userID'");
                            ?>
                            <div class="row invoice-header">
                                <div class="col-sm-6 col-xs-12">
                                    <span class="invoice-id">#<?=$view->rezervation_number?></span>
                                    <span class="incoice-date"><?=timeTR($view->created_at)?></span>
                                    <small><?=$view->havalimani?></small>
                                </div>
                                <div class="col-sm-6 col-xs-12 text-right">
                                    <span class="name"><?=$userSearch->name?></span> <br>
                                    <span><?=$userSearch->firstname?> <?=$userSearch->lastname?></span> <br>
                                    <span><?=$userSearch->telephone?></span> <br>
                                    <span><?=$userSearch->email?></span> <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="invoice-details">
                                        <tbody><tr>
                                            <th style="width:40%">Notes</th>
                                            <th style="width:20%"><center>Datum hinzufügen</center></th>
                                            <th style="width:17%" class="hours"></th>
                                            <th style="width:15%" class="amount">Betrag</th>
                                        </tr>
                                        <?php
                                        $tourID = $view->hotel_id;
                                        $tourDate = $view->hotel_dates;
                                        $tourSearch = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$tourID'");
                                        ?>
                                        <tr>
                                            <td class="description"><?=$tourSearch->name?></td>
                                            <td class="hours center"><center> <?=$tourDate?></center></td>
                                            <td class="hours"><?=$view->person_size?> Erwachsene - <?=$view->child_size?> Kind</td>
                                            <td class="amount"><?=$view->total_price?> €
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="summary">Total</td>
                                            <td class="amount"><?=$view->total_price?> €</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="summary total">Gesamt</td>
                                            <td class="amount total-value"><?=$view->total_price?> €</td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 invoice-message"><center><span class="title">Bilgilendirme amaçlı olup mali değeri yoktur</span></center></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

