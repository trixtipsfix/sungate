<?php require_once 'req/start.php'; ?>

    <meta name="author" content="Ansonika">
    <title> Hotels </title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>



    <section class="hero_in hotels">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span> Oteller </h1>
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
                            $oteller = $db->get_results("SELECT * FROM the_hotel");
                                foreach ($oteller as $otel){
                                $min_cover = $otel->picture;

                                //$enkucukFiyat = $db->get_row("SELECT * FROM the_tour_date WHERE tour_id = '$tur->tour_id' ORDER BY person_price ASC LIMIT 1")
                        ?>

                        <div class="col-md-4 isotope-item popular">
                            <div class="box_grid">
                                <figure>
                                    <a href="otel/<?=$otel->slug?>/<?=$otel->hotel_id?>">
                                        <img src="data/hotel/<?=$min_cover?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Lesen Sie mehr</span></div>
                                    </a>
                                    <!--<small>Paris Centre</small> !-->
                                </figure>
                                <div class="wrapper">
                                    <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                                    <h3><a href="otel/<?=$otel->slug?>/<?=$otel->hotel_id?>"><?=$otel->name?></a></h3>
                                    <span class="price">From <strong>$54</strong> /per person</span>
                                </div>
                                <ul>
                                    <li><i class="ti-eye"></i> 164 Ansicht</li>
                                    <li><div class="score"><span>Punkte<em>350 Görüş</em></span><strong>8.9</strong></div></li>
                                </ul>
                            </div>
                        </div>

                        <?php } ?>

                    </div><!-- /row -->
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