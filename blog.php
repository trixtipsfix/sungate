<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<?php
    $link = g('link');
    $id = g('id');
    if($link || $id ){
        $sorgu = $db->get_var("SELECT COUNT(*) FROM the_blog WHERE blog_category_id = '$id' AND status = 1");
        $blogKatDetail = $db->get_row("SELECT * FROM the_blog_category WHERE category_id = '$id'");
    }else{
        $sorgu = $db->get_var("SELECT COUNT(*) FROM the_blog WHERE status = 1");
    }
?>
<title><?=$general['site_title']->value;?></title>

<?php require_once 'req/head.php'; ?>
<link href="lib/css/blog.css" rel="stylesheet">

<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>

    <main>
        <section class="hero_in general">
            <div class="wrapper">
                <div class="container">
                    <?php if($link || $id ){ ?>
                        <h1 class="fadeInUp"><span></span> <?=$blogKatDetail->name?></h1>
                    <?php }else{ ?>
                        <h1 class="fadeInUp"><span></span> Blog</h1>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35" id="page_content_start">
            <div class="row">
                <div class="col-lg-9">
                    <?php if ($sorgu) { ?>
                        <?php
                            @$sayfa = $_GET["sayfa"];
                            if (empty($sayfa) || !is_numeric($sayfa)){
                                $sayfa = 1;
                            }
                            $kacar = 8;
                            $ksayisi = $sorgu;
                            $ssayisi = ceil($ksayisi / $kacar);
                            $nereden = ($sayfa * $kacar) - $kacar;
                            if($link || $id ){
                                $oteller = $db->get_results("SELECT * FROM the_blog WHERE blog_category_id = '$id' AND status = 1 ORDER BY created_at DESC LIMIT $kacar OFFSET $nereden");
                            }else{
                                $oteller = $db->get_results("SELECT * FROM the_blog WHERE status = 1 ORDER BY created_at DESC  LIMIT $kacar OFFSET $nereden");
                            }
                            foreach ($oteller as $blog){
                        ?>

                        <article class="blog wow fadeIn">
                            <div class="row no-gutters">
                                <div class="col-lg-7">
                                    <figure>
                                        <a href="text/<?=$blog->slug?>/<?=$blog->blog_id?>">
                                            <?php if($blog->picture){ ?>
                                            <img src="data/blog/<?=$blog->picture?>" alt="">
                                            <?php }else{ ?>
                                                <img src="lib/img/blog-1.jpg" alt="">
                                            <?php } ?>
                                            <div class="preview"><span>Read more</span></div>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-lg-5">
                                    <div class="post_info">
                                        <small><?=timeTR($blog->created_at)?></small>
                                        <h3><a href="text/<?=$blog->slug?>/<?=$blog->blog_id?>"><?=$blog->name?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- /article -->
                    <?php } ?>

                    <?php if($link || $id ){ ?>
                        <?php if($ssayisi > 1){ ?>
                            <div class="gap gap-small"></div>
                            <div class="col-md-12">
                                <nav class="text-center">
                                    <!--
                                    <ul class="pagination category-pagination ">
                                        <?php
                                        for($s = 1; $s <= $ssayisi; $s++) {
                                            echo '<li class="page-item"><a class="page-link" href="blog/kategori/'.$blogKatDetail->slug.'/'.$blogKatDetail->category_id.'/'.$s.'#page_content_start">'.$s.' <i class="fa fa-angle-right"></i> </a></li>';
                                        }
                                        ?>
                                    </ul>
                                    !-->

                                    <hr>
                                    <ul class="pagination category-pagination ">
                                        <?php
                                        if( $sayfa > 1 )
                                        {
                                            echo '<li class="page-item"><a class="page-link" href="blog/kategori/'.$blogKatDetail->slug.'/'.$blogKatDetail->category_id.'">Zuerst</a></li>';
                                        }

                                        for( $i = $sayfa - 3; $i < $sayfa + 4; $i++ )
                                        {
                                            if( $i > 0 && $i <= $ssayisi )
                                            {
                                                echo '<li class=" page-item '.($i == $sayfa ? 'active' : '').'"><a class="page-link" href="blog/kategori/'.$blogKatDetail->slug.'/'.$blogKatDetail->category_id.'/'.$i.'">'.$i.'</a></li>';
                                            }
                                        }

                                        if( $sayfa != $ssayisi )
                                        {
                                            echo '<li class="page-item"><a class="page-link" href="blog/kategori/'.$blogKatDetail->slug.'/'.$blogKatDetail->category_id.'/'.($ssayisi).'">Letzte Seite</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        <?php } ?>

                    <?php } else{ ?>
                        <?php if($ssayisi > 1){ ?>
                            <div class="gap gap-small"></div>
                            <div class="col-md-12">
                                <nav class="text-center">
                                    <!--
                                                    <ul class="pagination category-pagination ">
                                                        <?php
                                    for($s = 1; $s <= $ssayisi; $s++) {
                                        echo '<li class="page-item"><a class="page-link" href="blog/sayfa/'.$s.'#page_content_start">'.$s.' <i class="fa fa-angle-right"></i> </a></li>';
                                    }
                                    ?>
                                                    </ul>
                                                    !-->

                                    <hr>
                                    <ul class="pagination category-pagination ">
                                        <?php
                                        if( $sayfa > 1 )
                                        {
                                            echo '<li class="page-item"><a class="page-link" href="blog">Zuerst</a></li>';
                                        }

                                        for( $i = $sayfa - 3; $i < $sayfa + 4; $i++ )
                                        {
                                            if( $i > 0 && $i <= $ssayisi )
                                            {
                                                echo '<li class=" page-item '.($i == $sayfa ? 'active' : '').'"><a class="page-link" href="blog/'.$i.'">'.$i.'</a></li>';
                                            }
                                        }

                                        if( $sayfa != $ssayisi )
                                        {
                                            echo '<li class="page-item"><a class="page-link" href="blog/'.$ssayisi.'">Letzte Seite</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php } else{ ?>
                        <div class="alert alert-success">
                            Bu kategoriye ait tur bulunmamaktadır.
                        </div>
                    <?php } ?>

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