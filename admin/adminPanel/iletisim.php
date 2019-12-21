<?php
include 'header.php';

$iletisimsor=$db->prepare("SELECT * FROM iletisim_mesaj i inner join kullanici k on i.kullanici_id=k.kullanici_id");
$iletisimsor->execute();
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
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>İletisim ID</th>
                          <th>Kullanici ID</th>
                          <th>Kullanici AD</th>
                          <th>Kullanici SOYAD</th>
                          <th>Mesajı</th>
                          
                        </tr>
                      </thead>

                      <tbody>

                        <?php 
                        $say=0;

                        while ($iletisimcek=$iletisimsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                          <td><?php echo $iletisimcek["iletisim_id"];?></td>
                          <td><?php echo $iletisimcek["kullanici_id"];?></td>
                          <td><?php echo $iletisimcek["kullanici_ad"];?></td>
                          <td><?php echo $iletisimcek["kullanici_soyad"];?></td>
                          <td><?php echo $iletisimcek["iletisim_soru"];?></td>

                          <td><center><a href="../erisim/islem.php?iletisim_id=<?php echo $iletisimcek['iletisim_id'];?>&iletisimsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>  

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