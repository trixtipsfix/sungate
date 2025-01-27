<?php require_once 'req/start.php'; ?>


    <title><?=$general['site_title']->value;?></title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>


    <main>

        <section class="hero_in tours">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span> Bölge Adı</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

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
            <!-- /container -->
        </div>
        <!-- /filters -->

        <div class="container margin_60_35">
            <div class="row">
                <aside class="col-lg-3">
                <?php require_once  'inc/turlar.side.php'; ?>
                </aside>
                <!-- /aside -->

                <div class="col-lg-9">
                    <div class="isotope-wrapper">
                        <div class="row">
                            <div class="col-md-6 isotope-item popular">
                                <div class="box_grid">
                                    <figure>
                                        <a href="tur-detay.php"><img src="lib/img/tour_1.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                        <small>Historic</small>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a href="tur-detay.php">Arc Triomphe</a></h3>
                                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                        <span class="price">From <strong>$54</strong> /per person</span>
                                    </div>
                                    <ul>
                                        <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                        <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /box_grid -->
                            <div class="col-md-6 isotope-item latest">
                                <div class="box_grid">
                                    <figure>
                                        <a href="tur-detay.php"><img src="lib/img/tour_2.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                        <small>Churches</small>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a href="tur-detay.php">Notredam</a></h3>
                                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                        <span class="price">From <strong>$124</strong> /per person</span>
                                    </div>
                                    <ul>
                                        <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                        <li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /box_grid -->
                            <div class="col-md-6 isotope-item popular">
                                <div class="box_grid">
                                    <figure>
                                        <a href="tur-detay.php"><img src="lib/img/tour_3.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                        <small>Historic</small>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a href="tur-detay.php">Versailles</a></h3>
                                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                        <span class="price">From <strong>$25</strong> /per person</span>
                                    </div>
                                    <ul>
                                        <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                        <li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /box_grid -->
                            <div class="col-md-6 isotope-item latest">
                                <div class="box_grid">
                                    <figure>
                                        <a href="tur-detay.php"><img src="lib/img/tour_4.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                        <small>Museum</small>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a href="tur-detay.php">Pompidue Museum</a></h3>
                                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                        <span class="price">From <strong>$45</strong> /per person</span>
                                    </div>
                                    <ul>
                                        <li><i class="icon_clock_alt"></i> 2h 30min</li>
                                        <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.0</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /box_grid -->
                            <div class="col-md-6 isotope-item popular">
                                <div class="box_grid">
                                    <figure>
                                        <a href="tur-detay.php"><img src="lib/img/tour_5.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                        <small>Walking</small>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a href="tur-detay.php">Tour Eiffel</a></h3>
                                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                        <span class="price">From <strong>$65</strong> /per person</span>
                                    </div>
                                    <ul>
                                        <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                        <li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.5</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /box_grid -->
                            <div class="col-md-6 isotope-item latest">
                                <div class="box_grid">
                                    <figure>
                                        <a href="tur-detay.php"><img src="lib/img/tour_6.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                        <small>Museum</small>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a href="tur-detay.php">Louvre Museum</a></h3>
                                        <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                                        <span class="price">From <strong>$95</strong> /per person</span>
                                    </div>
                                    <ul>
                                        <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                        <li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.8</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /box_grid -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /isotope-wrapper -->

                    <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>
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