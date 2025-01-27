<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<?php
    $link = g('link');
    $kategoriBul = $db->get_row("SELECT * FROM the_hotel_category WHERE slug = '$link'");
    $sorgu = $db->get_var("SELECT COUNT(*) FROM the_hotel WHERE hotel_category_id = '$kategoriBul->category_id' AND status = 1");
?>

<title><?=$kategoriBul->name?> </title>
<meta name="keywords" content= "" />
<meta name="description" content=""  />
<link rel="canonical" href="">

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <section class="hero_in hotels">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span> <?=$kategoriBul->name?> </h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <!--
    <div class="filters_listing sticky_horizontal">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="switch-field">
                        <input type="radio" id="all" name="listing_filter" value="all" checked data-filter="*" class="selected">
                        <label for="all">Hepsi</label>
                        <input type="radio" id="popular" name="listing_filter" value="popular" data-filter=".popular">
                        <label for="popular">Popüler</label>
                        <input type="radio" id="latest" name="listing_filter" value="latest" data-filter=".latest">
                        <label for="latest">Son Eklenenler</label>
                    </div>
                </li>
                <li>
                    <div class="layout_view">
                        <a href="hoteller.php" class="active"><i class="icon-th"></i></a>
                        <a href="hoteller-list.php"><i class="icon-th-list"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
     /filters -->


    <div class="container margin_60_35">
        <div class="row">
            <!-- /aside -->

            <div class="col-lg-12">
                <?php if ($sorgu) { ?>
                <div class="isotope-wrapper">
                    <div class="row">

                        <?php
                        @$sayfa = $_GET["sayfa"];
                        if (empty($sayfa) || !is_numeric($sayfa)){
                            $sayfa = 1;
                        }
                        $kacar = 10;
                        $ksayisi = $sorgu;
                        $ssayisi = ceil($ksayisi / $kacar);
                        $nereden = ($sayfa * $kacar) - $kacar;
                        $oteller = $db->get_results("SELECT * FROM the_hotel WHERE hotel_category_id = '$kategoriBul->category_id' LIMIT $kacar OFFSET $nereden");
                        foreach ($oteller as $otel){
                            if($otel->picture) {
                                $min_cover = 'data/hotel/' . $otel->picture;
                            }else{
                                $min_cover = 'data/no_hotel_pic.png';
                            }
                            $province = $otel->province;
                            $proSrc = $db->get_row("SELECT * FROM il WHERE id = '$province'");

                            $state = $otel->state;
                            $staSrc = $db->get_row("SELECT * FROM ilce WHERE id = '$state'");
                            //$enkucukFiyat = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tur->tour_id' ORDER BY person_price ASC LIMIT 1");

                        ?>

                        <div class="col-md-4 isotope-item popular">
                            <div class="box_grid pb-1">
                                <figure>
                                    <a href="otel/<?=$otel->slug?>/<?=$otel->hotel_id?>">
                                        <img src="<?=$min_cover?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Lesen Sie mehr</span></div>
                                    </a>
                                    <small><?=$proSrc->il_adi?> - <?=$staSrc->ilce_adi?></small>
                                </figure>
                                <div class="wrapper">
                                    <div class="cat_star"><?=hotelhomeStars($otel->stars)?></div>
                                    <h3 style="font-size: 16px"><a href="otel/<?=$otel->slug?>/<?=$otel->hotel_id?>"><?=$otel->name?></a></h3>
                                    <!--<span class="price">From <strong>$54</strong> /per person</span> !-->
                                </div>
                                <ul>
                                    <li><i class="ti-eye"></i> <?=$otel->stars?> Ansicht</li>
                                    <!--<li><div class="score"><span>Punkte<em>350 Görüş</em></span><strong>8.9</strong></div></li> !-->
                                </ul>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                    <!-- /row -->
                </div>
                <!-- /isotope-wrapper -->

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="category-pagination-sign text-center">Gesamt <strong><?=$sorgu?></strong>  <strong><?=$kategoriBul->name?></strong> Hotel ist vorhanden.</p>
                    </div>
                    <?php if($ssayisi > 1){ ?>
                        <div class="gap gap-small"></div>
                        <div class="col-md-12">
                            <nav class="text-center">
                                <ul class="pagination category-pagination ">
                                    <?php
                                    if( $sayfa > 1 )
                                    {
                                        echo '<li class="page-item"><a class="page-link" href="hotels/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'">Zuerst</a></li>';
                                    }

                                    for( $i = $sayfa - 3; $i < $sayfa + 4; $i++ )
                                    {
                                        if( $i > 0 && $i <= $ssayisi )
                                        {
                                            echo '<li class=" page-item '.($i == $sayfa ? 'active' : '').'"><a class="page-link" href="hotels/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'/'.$i.'">'.$i.'</a></li>';
                                        }
                                    }

                                    if( $sayfa != $ssayisi )
                                    {
                                        echo '<li class="page-item"><a class="page-link" href="hotels/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'/'.($ssayisi).'">Letzte Seite</a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
                <!-- Sayfalama End !-->
                <!--<p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> !-->
                <?php } else{ ?>
                    <div class="alert alert-success">
                        Bu kategoriye ait tur bulunmamaktadır.
                    </div>
                <?php } ?>
            </div>
            <!-- /col -->
        </div>
    </div>
    <!-- /container -->
<?php require_once 'inc/turlar.bottom.php'; ?>

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>