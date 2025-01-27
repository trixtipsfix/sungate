<!-- /widget -->
<div class="widget">
    <div class="widget-title">
        <h4>Letzte Beiträge</h4>
    </div>
    <ul class="comments-list">
        <?php
            $sideBlogs = $db->get_results("SELECT * FROM the_blog ORDER BY blog_id DESC LIMIT 4");
            foreach ($sideBlogs as $sideBlog){
        ?>
        <li>
            <small><?=timeTR($sideBlog->created_at)?></small>
            <h3><a href="text/<?=$sideBlog->slug?>/<?=$sideBlog->blog_id?>" title=""><?=$sideBlog->name?></a></h3>
        </li>
        <?php } ?>
    </ul>
</div>
<!-- /widget -->
<div class="widget">
    <div class="widget-title">
        <h4>Blog Kategorie</h4>
    </div>
    <ul class="cats">
        <?php
        $sideBlogKats = $db->get_results("SELECT * FROM the_blog_category ORDER BY category_id DESC");
        foreach ($sideBlogKats as $sideBlogKat){
            ?>

            <li><a href="blog/kategori/<?=$sideBlogKat->slug?>/<?=$sideBlogKat->category_id?>"><?=$sideBlogKat->name?></a></li>
        <?php } ?>

    </ul>
</div>
<!-- /widget -->