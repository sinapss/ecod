<?php
include 'header.php';


$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
'id' => $_GET['urun_id']
));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürün Düzenleme <small>,
                      <?php
                      if($_GET['durum']=="ok"){?>
                        <b style="color: green;">İşlem Başarılı...</b>
                      <?php } elseif ($_GET['durum']=="no") {?>
                        <b style="color: red;">İşlem Başarısız...</b>
                      <?php }
                      ?>
                      </small>
                    </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!-- / => en kök dizine çık     ../bir üst dizine çık -->
                    <form action="../erisim/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">




                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="urun" value="<?php echo $uruncek['urun'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="urun_durum" required="">
                            <option value="1" <?php echo $uruncek['urun_durum'] =='1' ? 'selected=""' : ''; ?>>Aktif</option>

                            <option value="0" <?php echo $uruncek['urun_durum'] =='0' ? 'selected=""' : ''; ?>>Pasif</option>

                          </select>
                        </div>
                      </div>

                      <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'];?>">
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="urunduzenle" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>


             
          </div>
        </div>
       <?php
       include 'footer.php';
       ?>