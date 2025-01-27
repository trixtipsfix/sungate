<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<?php
	$link = g('link');
    $detail = $db->get_row("SELECT * FROM the_tour WHERE slug = '$link'");
?>


    <meta name="author" content="Ansonika">
    <title><?=$detail->name?></title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>


    <main>
        <style>
        .hero_in.tours_detail:before{
            background-image: url('data/tour/<?=$detail->picture?>');
        }
        </style>
        <section class="hero_in tours_detail">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span> <?=$detail->name?> </h1>
                </div>
                <span class="magnific-gallery">
                    <?php 
                        $i = '0';
                        $pictures = $db->get_results("SELECT * FROM the_tour_picture WHERE tour_id = $detail->tour_id");
                        $picturesRows = $db->get_var("SELECT COUNT(*) FROM the_tour_picture WHERE tour_id = $detail->tour_id");
                        foreach ($pictures as $picture) {
                            $i++;
                            $content = $picture->content;
                            if(!$content){
                                $content = $detail->name;
                            }
                            
                    ?>
					<a href="data/tour/pictures/<?=$picture->big_picture?>" <?php if($i== 1){ echo 'class="btn_photos"';} ?>  title="<?=$content?>" data-effect="mfp-zoom-in"><?php if($i== 1){ echo 'Tur Resimleri ('.$picturesRows.' Adet)';} ?></a>
                    <?php } ?>
                </span>
                

            </div>
        </section>
        <!--/hero_in-->

        <div class="bg_color_1">
            <nav class="secondary_nav sticky_horizontal">
                <div class="container">
                    <ul class="clearfix">
                        <li><a href="#description" class="active">Tour Details</a></li>
                        <li><a href="#reviews">Bewertungen</a></li>
                        <li><a href="#sidebar">Rezervasyon</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-8">
                        <section id="description">
                            <h2>Tour Details</h2>
                            <?=$detail->content?><!-- 
                            <hr>
                            <h3> Tur Programı <small>(4 Saat)</small></h3>
                            <p>
                                Iudico omnesque vis at, ius an laboramus adversarium. An eirmod doctus admodum est, vero numquam et mel, an duo modo error. No affert timeam mea, legimus ceteros his in. Aperiri honestatis sit at. Eos aeque fuisset ei, case denique eam ne. Augue invidunt has ad, ullum debitis mea ei, ne aliquip dignissim nec.
                            </p>
                            <ul class="cbp_tmtimeline">
                                
                                <li>
                                    <time class="cbp_tmtime" datetime="14:30"><span>2 hours</span><span>14:30</span>
                                    </time>
                                    <div class="cbp_tmicon">
                                        4
                                    </div>
                                    <div class="cbp_tmlabel">
                                        <div class="hidden-xs">
                                            <img src="img/tour_plan_4.jpg" alt="" class="rounded-circle thumb_visit">
                                        </div>
                                        <h4>Vasari's fresco</h4>
                                        <p>
                                            Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                                        </p>
                                    </div>
                                </li>

                            </ul>

                            /row -->
<!-- 
                            <hr>
                            <h3>Tur Bölgesi</h3>
                            <div id="map" class="map map_single add_bottom_30"></div>
                            End Map -->
                        </section>
                        <!-- /section -->

                        <section id="reviews">
                            <h2>Reviews</h2>
                            <div class="reviews-container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div id="review_summary">
                                            <strong>8.5</strong>
                                            <em>Superb</em>
                                            <small>Based on 4 reviews</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                            
                            <hr>

                            <div class="reviews-container">

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="img/avatar1.jpg" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        <div class="rev-info">
                                            Admin – April 03, 2016:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /review-container -->
                        </section>
                        <!-- /section -->
                        <hr>

                        <div class="add-review">
                            <h5>Leave a Review</h5>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name and Lastname *</label>
                                        <input type="text" name="name_review" id="name_review" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email *</label>
                                        <input type="email" name="email_review" id="email_review" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Rating </label>
                                        <div class="custom-select-form">
                                            <select name="rating_review" id="rating_review" class="wide">
                                                <option value="1">1 (lowest)</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected>5 (medium)</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10 (highest)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Your Review</label>
                                        <textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 add_top_20">
                                        <input type="submit" value="Submit" class="btn_1" id="submit-review">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-4" id="sidebar">
                        <div class="box_detail booking">
                            <div class="price">
                                <?php 
                                    $enkucukFiyat = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$detail->tour_id' ORDER BY person_price ASC LIMIT 1");
                                ?>
                                <span><?=$enkucukFiyat->person_price?> € <small> </small></span>
                                <div class="score"><span>Çok iyi</span><strong>7.0</strong></div>
                            </div>
                            
                            
                            <form  id="rez_one"  method="POST" onsubmit="return false" action="" class="user-form payment">
                                <input type="hidden" name="rez_type" value="tour">
                                <input type="hidden" name="tour_id" value="<?=$detail->tour_id?>">
                                <div class="form-group clearfix">
                                    <div class="custom-select-form">
                                        <select class="wide" name="tour_dates" >
                                            <option value="0">Tarih Seçiniz</option>
                                            <?php 
                                                $dates = $db->get_results("SELECT * FROM the_tour_date WHERE tour_id = '$detail->tour_id' ");
                                                foreach ($dates as $date) {
                                            ?>
                                            <option value="<?=$date->date_id?>"><?=dateTR($date->tour_start_date)?> - <?=dateTR($date->tour_finish_date)?> (<?=$date->tour_limit?>) </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="panel-dropdown">
                                    <a href="#">Anzahl Personen <span class="qtyTotal">1</span></a>
                                    <div class="panel-dropdown-content right">
                                        <div class="qtyButtons">
                                            <label>Erwachsene</label>
                                            <input type="text" name="person_size" class="qtyInput" value="2">
                                        </div>
                                        <div class="qtyButtons">
                                            <label>Anzahl Kinder</label>
                                            <input type="text" name="child_size" class="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn_1 full-width purchase" type="submit"  onclick="$.rezervasyonForm(<?=$detail->tour_id?>)"> Reservieren </button>
                            </form>
                            <div class="text-center"><small> Kinder ab 12 Jahren zahlen den vollen Preis.</small></div>
                        </div>
                        <ul class="share-buttons">
                            <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                            <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
                            <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                        </ul>
                    </aside>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
        <?php require_once 'inc/turlar.bottom.php'; ?>

    </main>
    <!--/main-->


<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<!-- Map -->
<script src="lib/js/infobox.js"></script>
<script>
    $.rezervasyonForm = function(){
        var deger = $("form#rez_one").serialize();
        $.ajax({
            url:"rezervasyonOne",
            type:"post",
            data:deger,
            dataType :"json",
            success:function(cevap){
                if(cevap.hata){
                    alert(cevap.hata);
                }else{
                    window.location.href = "rezervasyon";
                }
            }
        });
    }
</script>
<!-- DATEPICKER  -->
<script src="lib/js/moment.min.js"></script>
<script src="lib/js/daterangepicker.js"></script>
<script>
    $(function() {
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            opens: 'left',
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
        });
        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>

<!-- INPUT QUANTITY  -->
<script src="lib/js/input_qty.js"></script>

<?php require_once 'req/body_end.php'; ?>