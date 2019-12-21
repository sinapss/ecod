<?php
include 'header.php';

$urunsor=$db->prepare("SELECT * FROM urun order by urun_id");
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
                    <h2>Ürün Listeleme <small>,
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
                      <a href="urun-ekle.php" class="btn btn-success btn-xs" >Yeni Ekle</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Ürün ID</th>
                          <th>Ürün Ad</th>
                          <th>Ürün Durum</th>
                          <th></th>
                          <th></th>
                          
                        </tr>
                      </thead>

                      <tbody>

                        <?php 
                        $say=0;

                        while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                          <td><?php echo $uruncek["urun_id"];?></td>
                          <td><?php echo $uruncek["urun"];?></td>
                          

                          <td><center><?php 
                          if($uruncek['urun_durum']==1){
                           ?>
                           <button class="btn-success btn-xs">Aktif</button> 
                         <?php } else {
                            ?>
                            <button class="btn-danger btn-xs">Pasif</button><?php
                          }?>
                          </center>
                          </td>
                          <td><center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id'];?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>

                          <td><center><a href="../erisim/islem.php?urun_id=<?php echo $uruncek['urun_id'];?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>  
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