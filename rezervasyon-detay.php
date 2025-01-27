 <?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

<title>Nehmen Sie Kontakt mit uns auf! - <?=$general['site_title']->value;?></title>
<?php require_once 'req/head.php'; ?>
    <!-- SPECIFIC CSS -->
    <link href="lib/css/blog.css" rel="stylesheet">

<?php require_once 'req/body_start.php'; ?>
    
	<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }
    
    .table > tbody > tr > .no-line {
        border-top: none;
    }
    
    .table > thead > tr > .no-line {
        border-bottom: none;
    }
    
    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
        
    <?php 
    $output = '';
    $grezervasyonNO = g('siparisno');
    $grezDetail = $db->get_row("SELECT * FROM reservations WHERE rezervation_number = '$grezervasyonNO'");
    $grezOtelDetail = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$grezDetail->hotel_id'");
    $grezUserDetail = $db->get_row("SELECT * FROM users WHERE id = '$grezDetail->user_id'");
    $peopleCount = $grezDetail->person_size + $grezDetail->child_size;
    $gReztotal = $grezDetail->total_price;
    $gRezTaxtotal = kdv_cikar($gReztotal,'18');
    $qRezLastTotal = $gReztotal - $gRezTaxtotal;

        $output = '
        <style>
            .invoice-title h2, .invoice-title h3 {
                display: inline-block;
            }
            
            .table > tbody > tr > .no-line {
                border-top: none;
            }
            
            .table > thead > tr > .no-line {
                border-bottom: none;
            }
            
            .table > tbody > tr > .thick-line {
                border-top: 2px solid;
            }
            </style>
            <div class="receipt-content">
                 <div class="row">
                    <div class="col-6">
                        <address>
                        <strong>Informationen zur Unterkunft</strong><br>
                            Reservierungsnummer <strong>'.$grezDetail->rezervation_number.'</strong><br>
                            Start Date: <strong>'.$grezDetail->start_date.'</strong> - End Date: <strong>'.$grezDetail->end_date.'</strong> <br>
                            Name des Hotels: <strong>'.$grezOtelDetail ->name.'</strong><br>
                            Gesamtzahl der Personen: <strong>'.$peopleCount.'</strong>
                        </address>
                    </div>
                    <div class="col-6 text-right">
                        <address>
                        <strong>Booker:</strong><br>
                            '.$grezUserDetail->firstname.' '.$grezUserDetail->lastname.'<br>
                            '.$grezUserDetail->fatura_unvan.'<br>
                            '.$grezUserDetail->fatura_telefon.'<br>
                            '.$grezUserDetail->fatura_adresi.'
                        </address>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="add_top_15">
                            <h5><strong>Kontaktinformationen</strong></h5>
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td><strong>Vorname Nachname</strong></td>
                                                <td class="text-center"><strong></strong></td>
                                                <td class="text-center"><strong></strong></td>
                                                <td class="text-right"><strong></strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                            $grezUsers = $db->get_results("SELECT * FROM reservations_users WHERE rezervation_number = '$grezervasyonNO'");
                                            foreach ($grezUsers as $grezUsersDetail) {
                                            $output .= '<tr>
                                                    <td> '.$grezUsersDetail->firstname.' '.$grezUsersDetail->lastname.' </td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-right"></td>
                                                </tr>';
                                            }

    $output .='
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                <td class="thick-line text-right">'.number_format($qRezLastTotal, 0, ',', '.').' €</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"><strong>Tax</strong></td>
                                                <td class="no-line text-right">'.number_format($gRezTaxtotal, 0, ',', '.').' €</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"><strong>Total</strong></td>
                                                <td class="no-line text-right">'.number_format($gReztotal, 0, ',', '.').' €</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

    


?>
        
    <div class="container"> 
        <h3><strong>Order summary</strong></h3>
        <div class="table-responsive">
                <?php echo $output; ?>
        </div>
    </div>

<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>