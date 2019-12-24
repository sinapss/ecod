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

	<form class="form-horizontal checkout" method="POST" action="admin/erisim/islem.php">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kişisel Detaylar</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control"  name="kullanici_ad" value="<?php echo $kullanicicek["kullanici_ad"]; ?>" placeholder="İsim">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="kullanici_soyad" value="<?php echo $kullanicicek["kullanici_soyad"]; ?>" placeholder="Soyisim">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kullanici_mail" value="<?php echo $kullanicicek["kullanici_mail"]; ?>" placeholder="Email">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" disabled value="<?php echo $kullanicicek["kullanici_tel"]; ?>" placeholder="Telefon">
						</div>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="kullanici_yas" value="<?php echo $kullanicicek["kullanici_yas"]; ?>" placeholder="Dogum Tarihi">
						</div>
                    </div>
					
					<div class="title-bg">
						<div class="title">Banka Bilgileri</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="banka_adi" value="<?php echo $kullanicicek["banka_adi"]; ?>" placeholder="Banka Adı">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kart_sahibi" value="<?php echo $kullanicicek["kart_sahibi"]; ?>" placeholder="Kart üzerindeki isim">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kart_no" value="<?php echo $kullanicicek["kart_no"]; ?>" placeholder="Kart No">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="guvenlik_kodu" value="<?php echo $kullanicicek["guvenlik_kodu"]; ?>" placeholder="Güvenlik Kodu">
						</div>
						<div class="col-sm-6">
							<input type="date" name="son_kullanma_tarihi" value="<?php echo $kullanicicek["son_kullanma_tarihi"]; ?>" class="form-control">
						</div>
					</div>
					<input type="submit" value="Güncelle" name="kullaniciduzenle" class="btn btn-default btn-success">
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Adresiniz</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="il" value="<?php echo $kullanicicek["il"]; ?>" placeholder="İL">
                        </div>
                        <div class="col-sm-6">
							<input type="text" class="form-control" name="ilce" value="<?php echo $kullanicicek["ilce"]; ?>" placeholder="İLÇE">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="adres" value="<?php echo $kullanicicek["adres"]; ?>" placeholder="Adres">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<input type="hidden" class="form-control" name="kullanici_tel" value="<?php echo $kullanicicek["kullanici_tel"]; ?>" placeholder="Adres">
						</div>
					</div>
					
                </div>
                <div class="col-md-6" >
                    <img src="images\user.png" width="100%" height="100%" alt="" class="responsive">
                </div>
			</div>
        </form>
<div class="spacer"></div>
</div>

<? include "footer.php";?>