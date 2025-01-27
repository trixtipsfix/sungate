<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<?php
$link = g('link');
$detail = $db->get_row("SELECT * FROM the_page WHERE slug = '$link'");
?>
    <title><?=$detail->name?></title>

    <!-- SPECIFIC CSS -->
    <link href="lib/css/blog.css" rel="stylesheet">
<?php require_once 'req/head.php'; ?>

<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>

        <section class="hero_in general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span><?=$detail->name?> </h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->
        <!-- /container -->

        <div class="bg_color_1">
            <div class="container margin_80_55">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2><?=$detail->name?></h2>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-12">

                        <?=$detail->content?>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <!--/bg_color_1-->
    </main>
    <!--/main-->

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>


<?php require_once 'req/body_end.php'; ?>