<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Sosyal Ağlar
            </h1>
        </div>
        <form action="?q=social_networks" method="POST">
            <div class="card">
            <div class="card-header" style="display: block;">
                <a href="?q=social_add" class="btn btn-sm btn-blue"> <i class="fe fe-plus-square mr-1"></i> Ağ Ekle </a>


                <div style="display: inline-block; float: right; ">
                    <?php
                        if($_POST){
                            if(isset($_POST['selected_items'])) {
                                $selected_items = $_POST['selected_items'];
                                foreach($selected_items as $selected_item) {
                                    $delete .= $db->query("DELETE FROM social_networks WHERE id = '$selected_item'");
                                }
                                if($delete){
                                    echo '<div class="alert alert-success" role="success">
                                                Tüm seçilen veriler silindi.
                                          </div>';
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">
                                                Seçilen veriler silinemedi.
                                          </div>';
                                }
                            } else {
                                echo '<div class="alert alert-warning" role="alert">
                                        Hiç bir veri veya veriler seçilmedi.
                                    </div>';
                            }
                        }
                    ?>
                    <label class="fancy-checkbox" style="margin:3px 10px 0 0;">
                        <input  onclick="toggle(this);" type="checkbox">
                        <span><i></i>Tümünü Seç</span>
                    </label>
                    <button type="submit" class=" btn btn-sm btn-danger pull-right"> <i class="fa fa-trash"></i> Toplu Sil</button>
                </div>

            </div>
            <div class="card-body">
                <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                    <thead>
                        <tr>
                            <th class="nosort"></th>
                            <th>Sıra</th>
                            <th>Icon</th>
                            <th>Başlık</th>
                            <th class="nosort">Eklenme ve Güncellenme Tarihi</th>
                            <th class="nosort"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $rows = $db->get_results("SELECT * FROM social_networks ORDER BY rank ASC  ");
                            foreach ($rows as $row){
                        ?>
                        <tr>
                            <th>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="selected_items[]" value="<?=$row->id?>">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </div>
                            </th>
                            <th>
                                <span style="display:none;"> <?=$row->rank?></span>
                                <input type="number" class="form-control" style="width: 70px" onchange="socialRank(this)" value="<?=$row->rank?>" name="rank" id="<?=$row->id?>" >
                            </th>
                            <th><span style="display:none;"> <?=$row->icon?></span><i class="<?=$row->icon?>"></i></th>
                            <th>
                                <?=$row->name?>
                                <?php if($row->link){ ?>
                                    <a href="<?=$row->link?>" target="_blank"> <i class="fa fa-link"></i> </a>
                                <?php } ?>
                            </th>
                            <th>
                                <?=timeTR($row->created_at)?>
                                <?php if($row->updated_at){ ?>
                                <br><?=timeTR($row->updated_at)?>
                                <?php } ?>
                            </th>
                            <th class="text-right">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Aktionen</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="?q=social_edit&id=<?=$row->id?>"> <i class="fe fe-edit"></i> Düzenle</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="$.kobyDelete('<?=$row->id?>','?do=social&q=delete','?q=social_networks')"> <i class="fe fe-trash"></i> Sil </a>
                                    </div>
                                </div>
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
