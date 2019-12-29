<?php include "header.php";


$siparisGetir=$db->prepare("SELECT * FROM satis s inner join kullanici k on s.kullanici_tel=k.kullanici_tel inner join kur kr on kr.kur_id=s.kur_id inner join urun u on u.urun_id=kr.urun_id order by satis_id desc");
$siparisGetir->execute();

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
                      <a href="satis-ekle.php" class="btn btn-success btn-xs" >Yeni Ekle</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Siparis ID</th>
                          <th>Kullanici Ad Soyad</th>
                          <th>Kullanici Tel</th>
                          <th>Urun</th>
                          <th>Miktar</th>
                          <th>Fiyat</th>
                          <th>Satiş Tarihi</th>
                          <th></th>
                          <th></th>
                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php 
                        while ($sipariscek=$siparisGetir->fetch(PDO::FETCH_ASSOC)) { ?>
                         <tr>
                          <td><?php echo $sipariscek["satis_id"];?></td>
                          <td><?php echo $sipariscek["kullanici_ad"]." ".$sipariscek["kullanici_soyad"];?></td>
                          <td><?php echo $sipariscek["kullanici_tel"];?></td>
                          <td><?php echo $sipariscek["urun"];?></td>
                          <td><?php echo number_format($sipariscek["miktar"], 2, ',', '.');?></td>
                          <td><?php echo number_format($sipariscek["miktar"]* $sipariscek["fiyat"], 2, ',', '.');?><span class="badge badge-pill badge-success">TL</span></td>
                          <td><?php echo $sipariscek["tarih"];?></td>
                          
                          </center>
                          </td>
                          <td><center><a href="siparistakip-duzenle.php?satis_id=<?php echo $sipariscek['satis_id'];?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../erisim/islem.php?satis_id=<?php echo $sipariscek['satis_id'];?>&satissil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>  


                                               
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





<?php include "footer.php"; ?>