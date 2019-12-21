<?php
include 'header.php';

$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider Listeleme <small>,
                      <?php
                      if($_GET['durum']=="ok"){?>
                        <b style="color: green;">İşlem Başarılı...</b>
                      <?php } elseif ($_GET['durum']=="no") {?>
                        <b style="color: red;">İşlem Başarısız...</b>
                      <?php }
                      ?>
                      </small>
                    </h2>
                    <div align="right">
                      <a href="slider-ekle.php" class="btn btn-success btn-xs" >Yeni Ekle</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Resim</th>
                          <th>Ad</th>
                          <th>Url</th>
                          <th>Sıra</th>
                          <th>Durum</th>
                          <th></th>
                          <th></th>
                          
                        </tr>
                      </thead>

                      <tbody>

                        <?php 
                        $say=0;

                        while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                          <td><?php echo $say;?></td>
                          <td><img width="200" src="../../<?php echo $slidercek['slider_resimyol']?>"></td>
                          <td><?php echo $slidercek["slider_ad"];?></td>
                          <td><?php echo $slidercek["slider_url"];?></td>
                          <td><?php echo $slidercek["slider_sira"];?></td>

                          <td><center><?php 
                          if($slidercek['slider_durum']==1){
                           ?>
                           <button class="btn-success btn-xs">Aktif</button> 
                         <?php } else {
                            ?>
                            <button class="btn-danger btn-xs">Pasif</button><?php
                          }?>
                          </center>
                          </td>
                          <td><?php echo $slidercek["slider_gsm"];?></td>
                          <td><center><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id'];?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>

                          <td><center><a href="../erisim/islem.php?slider_id=<?php echo $slidercek['slider_id'];?>&slidersil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>  

                        <tr>                        
                        </tr>
                            
                      <?php  }

                         ?>
                        
                        
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>


             
          </div>
        </div>
       <?php
       include 'footer.php';
       ?>