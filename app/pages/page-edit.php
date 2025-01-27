<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
$id = g('id');
$view = $db->get_row("SELECT * FROM the_page WHERE page_id = '$id'");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Sayfa Zimmer Name
            </h1>
        </div>

        <div class="card">

            <form id="koby_form" method="POST" onsubmit="return false" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="form-group">
                                <label class="form-label">Titel</label>
                                <input type="text" class="form-control" name="name" value="<?=$view->name?>">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Inhalt </label>
                                <textarea class="form-control" id="editor" name="content"><?=$view->content?></textarea>
                            </div>




                        </div>
                        <div class="col-md-4 col-lg-4">
                            <fieldset class="form-fieldset">

                                <div class="form-group">
                                    <div class="form-label"> Wallpaper Bild </div>
                                    <?php if($view->picture){ ?>
                                        <div><img src="../data/page/<?=$view->picture?>" class=" img-thumbnail img-responsive" alt=""></div>
                                        <div class="help-block">Resimi değiştirmeyecekseniz lütfen herhangi bir resim seçimi yapmayınız.</div>
                                        <br>
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="picture">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">  Anzeigen?</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($view->status == '1'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Ja, anzeigen.</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($view->status == '0'){ echo 'checked';} ?>>
                                            <span class="selectgroup-button">Nein, nur abspeichern</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit"   onclick="kobySubmit('?do=page&q=edit&id=<?=$view->page_id?>','page-list')" class="btn btn-block btn-success btn-lg"> Speichern und Schließen <i class="fe fe-save"></i>  </button>


                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

