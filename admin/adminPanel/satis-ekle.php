<?php
include 'header.php';

$urunGetir=$db->prepare("SELECT * FROM urun");
$urunGetir->execute();
$kurGetir=$db->prepare("SELECT * FROM kur order by kur_id desc");
$kurGetir->execute();

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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Urun ID <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="urun_id" class="form-control col-md-7 col-xs-12">
                              <?php while($urunCek=$urunGetir->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $urunCek["urun_id"]; ?>"><?php echo $urunCek["urun_id"]." ".$urunCek["urun"]; ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Miktar <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="miktar" placeholder="Miktar..." required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kur ID <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kur_id" class="form-control col-md-7 col-xs-12">
                              <?php while($kurCek=$kurGetir->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $kurCek["kur_id"]; ?>"><?php echo "KurID=".$kurCek["kur_id"]." Fiyatı=".$kurCek["fiyat"]."TL UrunID= ".$kurCek["urun_id"]; ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Telefon <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="kullanici_tel" placeholder="Kullanıcı Telefon..." required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="satisekle" class="btn btn-success">Kaydet</button>
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