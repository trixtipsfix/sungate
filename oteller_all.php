<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
    <title>Hotel - <?=$general['site_title']->value;?></title>

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
                            $dates = '2020-01-04 > 2020-01-25';

                            $datesExplode = explode(" > ",$dates);
                            $startDate = $datesExplode[0];
                            $endDate = $datesExplode[1];
                            echo $startDate;
                            echo $endDate;

                        ?>

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