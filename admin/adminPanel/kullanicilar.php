<?php include "header.php";

$kullaniciGetir=$db->prepare("SELECT * FROM kullanici");
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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
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
                          <th></th>
                          <th></th>
                          
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