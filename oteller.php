<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
    <title>Hotels - <?=$general['site_title']->value;?></title>

<?php $sorgu = $db->get_var("SELECT COUNT(*) FROM the_hotel WHERE status = 1"); ?>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>

    <section class="hero_in hotels">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span> Hotels </h1>
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
            <!--
            <aside class="col-lg-3">
                <div class="custom-search-input-2 inner-2">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Terms...">
                        <i class="icon_search"></i>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Where">
                        <i class="icon_pin_alt"></i>
                    </div>
                    <div class="form-group">
                        <select class="wide">
                            <option>District</option>
                            <option>All</option>
                            <option>Paris Center</option>
                            <option>La Defanse</option>
                            <option>Latin Quarter</option>
                        </select>
                    </div>
                    <input type="submit" class="btn_search" value="Search">
                </div>
                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Distance</h6>
                            <input type="text" id="range" name="range" value="">
                        </div>
                        <div class="filter_type">
                            <h6>Star Category </h6>
                            <ul>
                                <li>
                                    <label><span class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></span> <small>(25)</small></label>
                                    <input type="checkbox" class="js-switch" checked>
                                </li>
                                <li>
                                    <label><span class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></span> <small>(25)</small></label>
                                    <input type="checkbox" class="js-switch">
                                </li>
                                <li>
                                    <label><span class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></span> <small>(25)</small></label>
                                    <input type="checkbox" class="js-switch">
                                </li>
                            </ul>
                        </div>
                        <div class="filter_type">
                            <h6>Rating</h6>
                            <ul>
                                <li>
                                    <label>Superb: 9+</label>
                                    <input type="checkbox" class="js-switch" checked>
                                </li>
                                <li>
                                    <label>Very good: 8+</label>
                                    <input type="checkbox" class="js-switch">
                                </li>
                                <li>
                                    <label>Good: 7+</label>
                                    <input type="checkbox" class="js-switch">
                                </li>
                                <li>
                                    <label>Pleasant: 6+</label>
                                    <input type="checkbox" class="js-switch">
                                </li>
                                <li>
                                    <label>No rating</label>
                                    <input type="checkbox" class="js-switch">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
             /aside -->

            <div class="col-lg-12">
                <div class="isotope-wrapper">
                    <div class="row">

                        <?php
                            @$sayfa = $_GET["sayfa"];
                            if (empty($sayfa) || !is_numeric($sayfa)){
                                $sayfa = 1;
                            }
                            $kacar = 6;
                            $ksayisi = $sorgu;
                            $ssayisi = ceil($ksayisi / $kacar);
                            $nereden = ($sayfa * $kacar) - $kacar;
                            $oteller = $db->get_results("SELECT * FROM the_hotel LIMIT $kacar OFFSET $nereden");
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

                                //$enkucukFiyat = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tur->tour_id' ORDER BY person_price ASC LIMIT 1")
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
                                    <h5 style="font-size: 16px"><a href="otel/<?=$otel->slug?>/<?=$otel->hotel_id?>"><?=kisalt($otel->name,30)?></a></h5>
                                    <!--<span class="price">From <strong>$54</strong> /pro Person</span> !-->
                                </div>
                                <ul class="">
                                    <li><i class="ti-eye"></i> <?=$otel->hit?> View</li>
                                    <!--<li><div class="score"><span>Punkte<em>350 Comment</em></span><strong>8.9</strong></div></li> !-->
                                </ul>
                            </div>
                        </div>

                        <?php } ?>

                    </div><!-- /row -->
                    <?php if($ssayisi > 1){ ?>
                        <div class="gap gap-small"></div>
                        <div class="col-md-12">
                            <nav class="text-center">
                                <!--
                                    <ul class="pagination category-pagination ">
                                        <?php
                                for($s = 1; $s <= $ssayisi; $s++) {
                                    echo '<li class="page-item"><a class="page-link" href="hotels/'.$s.'#page_content_start">'.$s.' <i class="fa fa-angle-right"></i> </a></li>';
                                }
                                ?>
                                    </ul>
                                    !-->

                                <hr>
                                <ul class="pagination category-pagination ">
                                    <?php
                                    if( $sayfa > 1 )
                                    {
                                        echo '<li class="page-item"><a class="page-link" href="hotels">Zuerst</a></li>';
                                    }

                                    for( $i = $sayfa - 3; $i < $sayfa + 4; $i++ )
                                    {
                                        if( $i > 0 && $i <= $ssayisi )
                                        {
                                            echo '<li class=" page-item '.($i == $sayfa ? 'active' : '').'"><a class="page-link" href="hotels/'.$i.'">'.$i.'</a></li>';
                                        }
                                    }

                                    if( $sayfa != $ssayisi )
                                    {
                                        echo '<li class="page-item"><a class="page-link" href="hotels/'.($ssayisi).'">Letzte Seite</a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
                <!-- /isotope-wrapper -->

            </div>
            <!-- /col -->
        </div>
    </div>
    <!-- /container -->
    <?php require_once 'inc/turlar.bottom.php'; ?>

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>