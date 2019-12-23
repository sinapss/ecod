<?php include 'header.php'; ?>


<div class="container">
<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Kayıt</div>
							<p>Tüm Bilgileri Eksiksiz Doldurunuz.</p>
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
							<input type="text" class="form-control"  name="ad" placeholder="İsim">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="soyad" placeholder="Soyisim">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="email" placeholder="Email">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="telefon" placeholder="Telefon">
						</div>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="dogum_tarihi" placeholder="Dogum Tarihi">
						</div>
                    </div>
                    
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="password" class="form-control" name="parola_bir" placeholder="Parola">
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control" name="parola_iki" placeholder="Parolanızı doğrulayın">
						</div>
						<div class="col-sm-6">
						</div>
					</div>
					
					<div class="title-bg">
						<div class="title">Banka Bilgileri</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="banka_adi" placeholder="Banka Adı">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kart_sahibi" placeholder="Kart üzerindeki isim">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kart_no" placeholder="Kart No">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="guvenlik_kodu" placeholder="Güvenlik Kodu">
						</div>
						<div class="col-sm-6">
							<input type="date" name="son_kullanma_tarihi" class="form-control">
						</div>
					</div>
					<input type="submit" value="kayit" name="kullanici_kaydet" class="btn btn-default btn-info">
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Adresiniz</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="il" placeholder="İL">
                        </div>
                        <div class="col-sm-6">
							<input type="text" class="form-control" name="ilce" placeholder="İLÇE">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="adres" placeholder="Adres">
						</div>
					</div>
					
                </div>
                <div class="col-md-6" >
                    <img src="images\kayitResim.png" width="100%" height="100%" alt="" class="responsive">
                </div>
			</div>
        </form>
        <div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>