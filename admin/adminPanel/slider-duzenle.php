<?php
include 'header.php';


$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array(
'id' => $_GET['slider_id']));

$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider Düzenleme<small>,
                      

                     
                      </small>
                    </h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!-- / => en kök dizine çık     ../bir üst dizine çık -->
                    <form action="../erisim/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <div align="center">
                          <img  width="200" height="200" src="../../<?php echo $slidercek['slider_resimyol']?>">
                        </div>
                        
                        
                      </div>

                 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_ad" required="required" value="<?php echo $slidercek['slider_ad'] ?>" placeholder="Slider Adını Giriniz." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Slider Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_link" value="<?php echo $slidercek['slider_link'] ?>" placeholder="Slider Url Giriniz." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_sira" value="<?php echo $slidercek['slider_sira'] ?>" placeholder="Slider Sıra Giriniz." required="required" class="form-control col-md-7 col-xs-12">
                          <input type="hidden" id="first-name" name="slider_id" value="<?php echo $slidercek['slider_id'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="slider_durum" required="">
                            <option value="1" <?php echo $slidercek['slider_durum'] =='1' ? 'selected=""' : ''; ?>>Aktif</option>

                            <option value="0" <?php echo $slidercek['slider_durum'] =='0' ? 'selected=""' : ''; ?>>Pasif</option>

                          </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="sliderguncelle" class="btn btn-success">Kaydet</button>
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