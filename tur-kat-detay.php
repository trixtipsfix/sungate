<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<?php
	$link = g('link');
    $kategoriBul = $db->get_row("SELECT * FROM the_tour_category WHERE slug = '$link'");
    $sorgu = $db->get_var("SELECT COUNT(*) FROM the_tour WHERE tour_category_id = '$kategoriBul->category_id' AND status = 1");
?>

<title><?=$kategoriBul->name?> </title>
<meta name="keywords" content= "" />
<meta name="description" content=""  />
<link rel="canonical" href="">

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>


    <main>

        <section class="hero_in tours">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span> <?=$kategoriBul->name?> </h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->
        <!--
    <div class="filters_listing sticky_horizontal" id="start">
        <div class="container">

            <ul class="clearfix">
                <li>
                    <div class="switch-field">
                        <input type="radio" id="all" name="listing_filter" value="all" checked data-filter="*" class="selected">
                        <label for="all">Hepsi</label>
                        <input type="radio" id="popular" name="listing_filter" value="popular" data-filter=".popular">
                        <label for="popular">Popüler</label>
                        <input type="radio" id="latest" name="listing_filter" value="latest" data-filter=".latest">
                        <label for="latest">Son Eklenen</label>
                    </div>
                </li>
                <li>
                    <div class="layout_view">
                        <a href="turlar.php" class="active"><i class="icon-th"></i></a>
                        <a href="turlar-liste.php"><i class="icon-th-list"></i></a>
                    </div>
                </li>
            </ul>
            </div>
        </div>
        /filters -->

        <div class="container margin_60_35">
            <div class="row">
                <aside class="col-lg-3">
                    <?php require_once  'inc/turlar.side.php'; ?>
                </aside>
                <!-- /aside -->

                <div class="col-lg-9">
                <?php if ($sorgu) { ?>
                    <div class="isotope-wrapper">
                        <div class="row">

                            <?php 
                                @$sayfa = $_GET["sayfa"];
                                if (empty($sayfa) || !is_numeric($sayfa)){
                                    $sayfa = 1;
                                }
                                $kacar = 1;
                                $ksayisi = $sorgu;
                                $ssayisi = ceil($ksayisi / $kacar);
                                $nereden = ($sayfa * $kacar) - $kacar;
                                $turlar = $db->get_results("SELECT * FROM the_tour WHERE tour_category_id = '$kategoriBul->category_id' LIMIT $kacar OFFSET $nereden");
                                    foreach ($turlar as $tur){
                                        $min_cover = $tur->picture;

                                        $enkucukFiyat = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tur->tour_id' ORDER BY person_price ASC LIMIT 1");

                            ?>
                                <div class="col-md-6 isotope-item popular">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="tur/<?=$tur->slug.'/'.$tur->tour_id?>"><img src="data/tour/<?=$min_cover?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Mehr Erfahren</span></div></a>
                                            <small>... </small>
                                        </figure>
                                        <div class="wrapper">
                                            <h3><a href="tur/<?=$tur->slug.'/'.$tur->tour_id?>"><?=$tur->name?> </a></h3>
                                            <p>.... </p>
                                            <span class="price">Preis: <strong> <?=$enkucukPreis->person_price?> € </strong> /kişi başı</span>
                                        </div>
                                        <ul>
                                            <li><i class="icon_clock_alt"></i> 3 Gün </li>
                                            <li><div class="score"><span>Punkte<em>350 Görüş</em></span><strong>8.9</strong></div></li>
                                        </ul>
                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /isotope-wrapper -->
                    <!-- Sayfalama !-->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="category-pagination-sign text-center">Gesamt <strong><?=$sorgu?></strong> <strong><?=$kategoriBul->name?></strong> tur mevcuttur.</p>
                        </div>
                        <?php if($ssayisi > 1){ ?>
                        <div class="gap gap-small"></div>
                        <div class="col-md-12">
                            <nav class="text-center">
                                <?php
                                    $en_az_orta = ceil($kacar/2);
                                    $en_fazla_orta = ($ssayisi+1) - $en_az_orta;
                                    $sayfa_orta = $sayfa;
                                    if($sayfa_orta < $en_az_orta) $sayfa_orta = $en_az_orta;
                                    if($sayfa_orta > $en_fazla_orta) $sayfa_orta = $en_fazla_orta;
                                    $sol_sayfalar = round($sayfa_orta - (($kacar-1) / 2));
                                    $sag_sayfalar = round((($kacar-1) / 2) + $sayfa_orta);
                                    if($sol_sayfalar < 1) $sol_sayfalar = 1;
                                    if($sag_sayfalar > $ssayisi) $sag_sayfalar = $ssayisi;
                                ?>
                                <ul class="pagination category-pagination ">
                                    <?php
                                        for($s = 1; $s <= $ssayisi; $s++) {
                                            if($sayfa != 1) echo '<li class="page-item"><a class="page-link" href="turlar/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'/sayfa/1#start"> <i class="fa fa-angle-left"></i> İlk sayfa</a></li>';
                                            for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
                                                if($sayfa == $s) {
                                                    echo '<li class="page-item active"><a class="page-link" href="turlar/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'/sayfa/'.$s.'#start">'.$s.'</a></li>';
                                                } else {
                                                    echo '<li class="page-item"><a class="page-link" href="turlar/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'/sayfa/'.$s.'#start">'.$s.'</a></li>';
                                                }
                                            }
                                            if($sayfa != $ssayisi) echo '<li class="page-item"><a class="page-link" href="turlar/'.$kategoriBul->slug.'/'.$kategoriBul->category_id.'/sayfa/'.$ssayisi.'#start">Son Sayfa  <i class="fa fa-angle-right"></i> </a></li>';
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

    </main>
    <!--/main-->


<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>