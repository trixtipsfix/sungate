<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>

<?php
$link = g('link');
$textID = g('id');
$detail = $db->get_row("SELECT * FROM the_blog WHERE slug = '$link' AND blog_id = '$textID'");
?>

<title><?=$detail->name?></title>
<?php require_once 'req/head.php'; ?>
    <!-- SPECIFIC CSS -->
    <link href="lib/css/blog.css" rel="stylesheet">

<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>
        <section class="hero_in general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span> blog</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bloglist singlepost">
                        <?php if($detail->picture){ ?>
                        <p><img alt="" class="img-fluid" src="data/blog/<?=$detail->picture?>"></p>
                        <?php } ?>
                        <h1><?=$detail->name?></h1>
                        <div class="postmeta">
                            <ul><?php $katBuls = $db->get_row("SELECT * FROM the_blog_category WHERE category_id = '$detail->blog_category_id'"); ?>
                                <li><a href="blog/kategori/<?=$katBuls->slug?>/<?=$katBuls->category_id?>"><i class="icon_folder-alt"></i> <?=$katBuls->name?></a></li>
                                <li><a href="#"><i class="icon_clock_alt"></i> <?=timeTR($detail->created_at)?></a></li>
                            </ul>
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">
                            <div class="dropcaps">
                                <?=$detail->content?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /post -->
                    </div>
                    <!-- /single-post -->

                    <div id="comments">
                        <h5>Kommentare</h5>
                        <div><?php include 'inc/fb.comment.php'; ?></div>
                    </div>
                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                <?php include 'inc/blog.side.php'; ?>
                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->

<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>


<?php require_once 'req/body_end.php'; ?>