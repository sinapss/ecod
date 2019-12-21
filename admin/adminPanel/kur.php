<?php
include 'header.php';

$kursor=$db->prepare("SELECT * FROM kur k inner join urun u on k.urun_id=u.urun_id order by tarih");
$kursor->execute();
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
                      <a href="kur-ekle.php" class="btn btn-success btn-xs" >Yeni Ekle</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kur ID</th>
                          <th>Urun Ad</th>
                          <th>Fiyat</th>
                          <th>Tarih</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php 
                        while ($kurcek=$kursor->fetch(PDO::FETCH_ASSOC)) { ?>
                          <td><?php echo $kurcek["kur_id"];?></td>
                          <td><?php echo $kurcek["urun"];?></td>
                          <td><?php echo number_format($kurcek["fiyat"], 2, ',', '.');?><span class="badge badge-pill badge-success">TL</span></td>
                          <td><?php echo $kurcek["tarih"];?></td>
                          
                          </center>
                          </td>
                          <td><center><a href="kur-duzenle.php?kur_id=<?php echo $kurcek['kur_id'];?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>

                          <td><center><a href="../erisim/islem.php?kur_id=<?php echo $kurcek['kur_id'];?>&kursil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>  
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