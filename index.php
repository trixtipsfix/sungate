<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

<title><?=$general['site_title']->value;?></title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>
        <section class="hero_single version_2">
            <div class="wrapper">
                <div class="container">
                    <h3>Sungate24</h3>
                    <p> Ihr Experte für exklusive Reisen zu besten Preisen!</p>
                    <form role="form" action="arama-sonuc" method="GET">
                        <div class="row no-gutters custom-search-input-2">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="kelime" placeholder="Suchen Sie nach Stadt oder Hotel Namen">
                                    <i class="icon_search"></i>
                                </div>
                            </div>
                            <!--
                            <div class="col-lg-3">
                                <select class="wide" name="type">
                                    <option value="1">Hotels</option>
                                    <option value="2">Tours</option>
                                </select>
                            </div>
                            !-->
                            <div class="col-lg-3">
                                <input type="submit" class="btn_search" value="Suchen">
                            </div>
                        </div>
                        <!-- /row -->
                    </form>
                </div>
            </div>
        </section>
        <!-- /hero_single -->

        <!--
        <div class="container-fluid margin_80_0">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Unsere beliebtesten Touren</h2>
                <p>Meistverkaufte Tour der letzten 24 Stunden.</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">

                <div class="item">
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

            </div>
            <div class="container">
                <p class="btn_home_align"><a href="tours" class="btn_1 rounded"> Alle Touren anzeigen</a></p>
            </div>
            <hr class="large">
        </div>
        /container -->

        <div class="container-fluid margin_30_95 pl-lg-5 pr-lg-5">
            <section class="add_bottom_45">
                <div class="main_title_3">
                    <span><em></em></span>
                    <h2> Unsere beliebtesten Hotels</h2>
                </div>
                <div class="row">
                    <?php
                    $oteller = $db->get_results("SELECT * FROM the_hotel ORDER BY name DESC LIMIT 12");
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
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <a href="otel/<?=$otel->slug?>/<?=$otel->hotel_id?>" class="grid_item">
                                <figure>
                                    <img src="<?=$min_cover?>" class="img-fluid" alt="">
                                    <div class="info">
                                        <div class="cat_star"><?=hotelhomeStars($otel->stars)?></div>
                                        <h3><?=$otel->name?></h3>
                                    </div>
                                    <small><?=$proSrc->il_adi?> - <?=$staSrc->ilce_adi?></small>
                                </figure>
                            </a>
                        </div>
                    <?php } ?>


                </div>
                <!-- /row -->
                <div class="text-center"><a href="hotels"><strong> Alle Hotels <i class="arrow_carrot-right"></i></strong></a></div>
            </section>

        </div>
        <!-- /container -->



        <div class="bg_color_1">
            <div class="container margin_80_55">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h3> Inspirationen</h3>
                    <p> Die beliebtesten Inspiration Tipps</p>
                </div>
                <div class="row">

                    <?php
                        $lastBlog = $db->get_results("SELECT * FROM the_blog ORDER BY blog_id dESC LIMIT 4");
                        foreach ($lastBlog as $blog){
                    ?>
                    <div class="col-lg-6">
                        <a class="box_news" href="text/<?=$blog->slug?>/<?=$blog->blog_id?>">
                            <figure>
                                <?php if($blog->picture){ ?>
                                    <img src="data/blog/<?=$blog->picture?>" alt="">
                                <?php }else{ ?>
                                    <img src="lib/img/blog-1.jpg" alt="">
                                <?php } ?>
                            </figure>
                            <ul>
                                <li><?=timeTR($blog->created_at)?></li>
                            </ul>
                            <h4><?=$blog->name?></h4>
                        </a>
                    </div>
                    <?php } ?>

                </div>
                <!-- /row -->
                <p class="btn_home_align"><a href="blog" class="btn_1 rounded">Alle Anzeigen</a></p>
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->

        <div class="call_section" style="background-image: url(https://www.rd.com/wp-content/uploads/2017/07/01-birth-month-If-You-Were-Born-In-Summer-This-Is-What-We-Know-About-You_644740429-icemanphotos.jpg)">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <h3> Unser Support freut sich auf Sie!</h3>
                            <p> Sie haben Fragen? Kontaktieren Sie uns jetzt! </p>
                            <a href="tel: 0800 711 82 17 " class="btn_1 rounded"> Tel: <i class="fa fa-phone"></i>   0800 711 82 17  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->
    </main>
    <!-- /main -->

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>
<?php require_once 'req/body_end.php'; ?>