<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$view = $db->get_row("SELECT * FROM the_tour WHERE tour_id = '$id'");
$rows = $db->get_var("SELECT * FROM the_tour_picture WHERE tour_id = '$id'");
?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <strong> <?=$view->name?> </strong> İsimli Tur'a Ait Resimler
            </h1>
        </div>
        <form action="tour-images-list?id=<?=$id?>" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <div>
                        <?php
                            if($_POST){
                                if(isset($_POST['tumresimler'])) {
                                    $resimler = $_POST['tumresimler'];
                                    foreach($resimler as $resim) {
                                        $bul = $db->get_row("SELECT * FROM the_tour_picture WHERE picture_id = '$resim'");
                                        unlink('../data/tour/pictures/'.$bul->mini_picture);
                                        unlink('../data/tour/pictures/'.$bul->big_picture);
                                        $sil = $db->query("DELETE FROM the_tour_picture  WHERE picture_id = '$resim'");
                                    }
                                    if($sil){
                                        echo '<div class="alert alert-success">Tüm resimler temizlendi.</div>';
                                    }else{
                                        echo '<div class="alert alert-danger">Resimler silinemedi.</div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger">Herhangi bir resim seçmediniz.</div>';
                                }
                            }
                        ?>
                    </div>
                    <a href="tour-images-add?id=<?=$id?>" class="btn btn-success"> <i class="fe fe-plus"></i>  Resim Ekle </a>
                    <?php if($rows){ ?>
                    <button type="submit"  class="btn btn-danger pull-right mr-4"> <i class="fe fe-trash"></i>  Seçilen Resimleri Sil</button>
                    <label class="custom-control custom-checkbox pull-right mr-4 mt-2">
                        <input  onclick="toggle(this);" type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" >
                        <span class="custom-control-label">Hepsini Seç</span>
                    </label>
                    <?php } ?>
                </div>
                <script>
                    function toggle(source) {
                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        for (var i = 0; i < checkboxes.length; i++) {
                            if (checkboxes[i] != source)
                                checkboxes[i].checked = source.checked;
                        }
                    }
                </script>

                <div class="card-body">
                    <table class="table card-table table-vcenter text-nowrap" id="koby_table">
                            <thead>
                            <tr>
                                <th class="nosort">Seç</th>
                                <th class="nosort">#Sıra</th>
                                <th>Resim </th>
                                <th>Info zur Tour</th>
                                <th class="nosort text-center">Aktionen</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $list = $db->get_results("SELECT * FROM the_tour_picture WHERE tour_id = '$id' ORDER BY rank ASC");
                            foreach ($list as $view){
                                ?>

                                <tr>
                                    <td><input type="checkbox" name="tumresimler[]" value="<?=$view->picture_id?>"/></td>
                                    <td id="<?=$view->sira?>">
                                        <div class="none"><?=$view->sira?></div>
                                        <input type="number" class="form-control" style="width: 70px" onchange="rankChange(this,'?do=tour&q=pic-rank')" value="<?=$view->rank?>" name="rank" id="<?=$view->picture_id?>" >
                                    </td>
                                    <th>
                                        <div class="none"><?=$view->mini_picture?></div>
                                        <a href="#">
                                            <img src="../data/tour/pictures/<?=$view->mini_picture?>" class="img-fluid img-thumbnail" width="100" >
                                        </a>
                                    </th>

                                    <th>
                                        <div class="none"><?=$view->content?></div>
                                        <h6>Info zur Tour</h6>
                                        <textarea name="content" class="form-control" onchange="contentChange(this,'?do=tour&q=pic-content')" id="<?=$view->picture_id?>" cols="30" rows="3"><?=$view->content?></textarea>
                                    </th>
                                    <th class="text-center">
                                        <a href="javascript:void(0)" onclick="kobySingle('<?=$view->tour_id?>','?do=tour&q=pic-delete&id=<?=$view->picture_id?>','tour-images-list?id=<?=$id?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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


