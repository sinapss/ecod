<?php include "header.php";?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Hesap Bilgilerinizi Kontrol Edebilirsiniz veya Güncelleyebilirsiniz.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Hesap Bilgilerim</div>
				</div>

				<?php 

				if ($_GET['durum']=="basarili") {?>

				<div class="alert alert-success">
					<strong>Güncellendi!</strong> Girdiğiniz Bilgiler Güncellendi.
				</div>
					
				<?php } elseif ($_GET['durum']=="basarisiz") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Güncelleme Başarısız.
				</div>
					
				<?php }
				 ?>


				
				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']; ?>" placeholder="Adınızı Giriniz...">
					</div>
					
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']; ?>" placeholder="Soyadınızı Giriniz...">
					</div>
					
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control"  required="" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail']; ?>"  placeholder="Mail Adresinizi Giriniz.">
					</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control" disabled="" required="" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm']; ?>" placeholder="Kullanici Adiniz Olduğu için Değişim Yapamazsınız.">
					</div>
					
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il']; ?>" placeholder="İl Giriniz...">
					</div>
					
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce']; ?>" placeholder="İlçe Giriniz...">
					</div>

					<input type="hidden" class="form-control"  required="" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
					
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						
						
						<textarea class="form-control" required="" name="kullanici_adres"  placeholder="Adresinizi Giriniz..."><?php echo $kullanicicek['kullanici_adres']; ?></textarea>
					</div>
					
				</div>



				<button type="submit" name="kullaniciguncelle" class="btn btn-default btn-red">Güncelle</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><img width="400" src="dimg/sifre.png"></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<? include "footer.php";?>