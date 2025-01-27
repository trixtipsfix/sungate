<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$view = $db->get_row("SELECT * FROM the_hotel WHERE hotel_id = '$id'");
$rows = $db->get_var("SELECT * FROM the_hotel_picture WHERE hotel_id = '$id'");
?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <strong> <?=$view->name?> </strong> İsimli Otele Ait Resimler
            </h1>
        </div>
        <form action="hotel-images-list?id=<?=$id?>" method="POST">
            <div class="card">
                <div class="card-header" style="display: block;">
                    <div>
                        <?php
                            if($_POST){
                                if(isset($_POST['tumresimler'])) {
                                    $resimler = $_POST['tumresimler'];
                                    foreach($resimler as $resim) {
                                        $bul = $db->get_row("SELECT * FROM the_hotel_picture WHERE picture_id = '$resim'");
                                        unlink('../data/hotel/pictures/'.$bul->mini_picture);
                                        unlink('../data/hotel/pictures/'.$bul->big_picture);
                                        $sil = $db->query("DELETE FROM the_hotel_picture  WHERE picture_id = '$resim'");
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
                    <a href="hotel-images-add?id=<?=$id?>" class="btn btn-success"> <i class="fe fe-plus"></i>  Resim Ekle </a>
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
                                <th>Resim Info zur Tour</th>
                                <th class="nosort text-center">Aktionen</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $list = $db->get_results("SELECT * FROM the_hotel_picture WHERE hotel_id = '$id' ORDER BY rank ASC");
                            foreach ($list as $view){
                                ?>

                                <tr>
                                    <td><input type="checkbox" name="tumresimler[]" value="<?=$view->picture_id?>"/></td>
                                    <td id="<?=$view->sira?>">
                                        <div class="none"><?=$view->sira?></div>
                                        <input type="number" class="form-control" style="width: 70px" onchange="rankChange(this,'?do=hotel&q=pic-rank')" value="<?=$view->rank?>" name="rank" id="<?=$view->picture_id?>" >
                                    </td>
                                    <th>
                                        <div class="none"><?=$view->mini_picture?></div>
                                        <a href="#">
                                            <img src="../data/hotel/pictures/<?=$view->mini_picture?>" class="img-fluid img-thumbnail" width="100" >
                                        </a>
                                    </th>

                                    <th>
                                        <div class="none"><?=$view->content?></div>
                                        <h6>Resim Info zur Tour</h6>
                                        <textarea name="content" class="form-control" onchange="contentChange(this,'?do=hotel&q=pic-content')" id="<?=$view->picture_id?>" cols="30" rows="3"><?=$view->content?></textarea>
                                    </th>
                                    <th class="text-center">
                                        <a href="javascript:void(0)" onclick="kobySingle('<?=$view->hotel_id?>','?do=hotel&q=pic-delete&id=<?=$view->picture_id?>','hotel-images-list?id=<?=$id?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Löschen"><i class="fe fe-trash"></i> </a>
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


