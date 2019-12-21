<?php
include 'header.php';

$urunsor=$db->prepare("SELECT * FROM urun");
$urunsor->execute();

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="urun_id" required="">
                            <?php while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<? echo $uruncek['urun_id']; ?>" ><?php echo $uruncek['urun']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fiyat <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="fiyat" placeholder="Ürün Fiyatı" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="kurekle" class="btn btn-success">Kaydet</button>
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