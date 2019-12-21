<?php include "header.php";

$kullaniciGetir=$db->prepare("SELECT * FROM kullanici k inner join adres a on a.kullanici_id=k.kullanici_id");
$kullaniciGetir->execute();
?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanici Ayarları <small>,
                     
                      </small>
                    </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kullanici ID</th>
                          <th>Kayıt Tarihi</th>
                          <th>Ad</th>
                          <th>Soyad</th>
                          <th>Mail Adresi</th>
                          <th>Telefon</th>
                          <th>Dogum Tarihi</th>
                          <th>İl</th>
                          <th>İlce</th>
                          <th>Adres</th>
                          
                        </tr>
                      </thead>

                      <tbody>

                       <?php
                       while($kullaniciYaz=$kullaniciGetir->fetch(PDO::FETCH_ASSOC)){

                           ?>
                          <td><?php echo $kullaniciYaz["kullanici_id"]; ?></td>
                          <td><?php echo $kullaniciYaz["kullanici_kayit_tarih"];  ?></td>  
                          <td><?php echo $kullaniciYaz["kullanici_ad"]; ?></td>
                          <td><?php echo $kullaniciYaz["kullanici_soyad"]; ?></td>
                          <td><?php echo $kullaniciYaz["kullanici_mail"];  ?></td>
                          <td><?php echo $kullaniciYaz["kullanici_tel"]; ?> </td>
                          <td><?php echo $kullaniciYaz["kullanici_yas"]; ?></td>
                          <td><?php echo $kullaniciYaz["il"]; ?></td>
                          <td><?php echo $kullaniciYaz["ilce"]; ?></td>
                          <td><?php echo $kullaniciYaz["adres"]; ?></td>
                          <td><center><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullaniciYaz['kullanici_id'];?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>                          
                          <td><center><a href="../erisim/islem.php?kullanici_id=<?php echo $kullaniciYaz['kullanici_id'];?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>  

                        <tr>                        
                        </tr>

                        <?php } ?>
                        
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>


             
          </div>
        </div>





<?php include "footer.php"; ?>