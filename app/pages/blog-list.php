<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Artikel
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <a href="blog-add" class="btn btn-success"> <i class="fe fe-plus"></i>  Artikel hinzufügen </a>
                    <a href="blog-categories-add" class="btn btn-cyan"> <i class="fe fe-folder-plus"></i> Blog kategorie hinzufügen </a>
                </div>
                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                        <thead>
                        <tr>
                            <th class="nosort">#ID</th>
                            <th>Artikel Name</th>
                            <th>Artikel Kategorie</th>
                            <th class="nosort text-center">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $list = $db->get_results("SELECT * FROM the_blog ORDER BY blog_id DESC");
                        foreach ($list as $view){
                            ?>

                            <tr>
                                <th>#<?=$view->blog_id?></th>
                                <th>
                                    <strong><?=$view->name?></strong>
                                </th>
                                <th>
                                    <?php
                                    $Category = $db->get_row("SELECT * FROM the_blog_category WHERE category_id = '$view->blog_category_id' ");
                                    echo $Category->name;
                                    ?>
                                </th>
                                <th class="text-center">
                                    <a href="blog-edit?id=<?=$view->blog_id?>" class="btn btn-blue btn-sm" data-toggle="tooltip" title="Bearbeiten"><i class="fe fe-edit"></i> </a>
                                    <a href="javascript:void(0)" onclick="kobySingle('<?=$view->blog_id?>','?do=blog&q=delete','blog-list')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
                                </th>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
