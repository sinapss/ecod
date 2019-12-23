<?php 
session_start();
include "admin/erisim/baglan.php"; 
$kullanicisor=$db->prepare("SELECT * FROM kullanici k inner join adres a on k.kullanici_tel=a.kullanici_tel inner join banka_bilgileri bb on bb.kullanici_tel=k.kullanici_tel where k.kullanici_tel=:kullanici_tel");
$kullanicisor->execute(array(
  'kullanici_tel' => $_SESSION['kullanici_tel']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>ECOD</title>
	
	<link rel="shortcut icon" href="images\ecodIkon.png">
	
    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
	
    <link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">

  </head>
  <body>
	<div id="wrapper">
	<div class="header"><!--Header -->
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4 main-logo">
					<a href="anasayfa.php"><img src="images\logoUst.png" alt="logo" width="150" height="30" class="logo img-responsive"></a>
				</div>
				<div class="col-md-8">
					<div class="pushright">
						<div class="top">
							<?php if (!isset($_SESSION['kullanici_tel'])) {?>
							

							<a href="#" id="reg" class="btn btn-default btn-success">Giriş Yap<span>-- yada --</span>Kayıt Ol</a>

							<?php } else { ?>

							<a href="#"  class="btn btn-default btn-info">Hoşgeldin<span>--</span><?php echo $kullanicicek['kullanici_ad'] ?></a>

								<?php } ?>
							<div class="regwrap">
								<div class="row">
									<div class="col-md-6 regform">
										<div class="title-widget-bg">
											<div class="title-widget">Giriş</div>
										</div>
										<form role="form" method="POST" action="admin\erisim\islem.php">
											<div class="form-group">
												<input type="text" class="form-control" name="kullanici_tel"  id="username" placeholder="Kullanıcı Telefon">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="kullanici_password" id="password" placeholder="Parola">
											</div>
											<div class="form-group">
												<button class="btn btn-default btn-success btn-sm" name="kullanicigiris">Giriş Yap</button>
											</div>
										</form>
									</div>
									<div class="col-md-6">
										<div class="title-widget-bg">
											<div class="title-widget">Kayıt Olun</div>
										</div>
										<p>
											Yeni Kullanıcımısınız? Kayıt oluşturmanız gerekli.
                                        </p>
                                        <a href="kayit.php" class="btn btn-default btn-info">Kayit Ol</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashed"></div>
	</div><!--Header -->
	<div class="main-nav"><!--end main-nav -->
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="anasayfa.php"  >AnaSayfa</a><div class="curve"></div></li>
								<li><a href="kurlar.php" > Geri Dönüşüm Kurları</a></li>
								<li><a href="nasil.php" >Nasıl Uygularım?</a></li>
                                <li><a href="duyuru.php"  >Duyurular</a></li>
                                <li><a href="sss.php" >S.S.S </a></li>
                                <li><a href="iletisim.php" >İletişim</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--end main-nav -->

	<div class="container">
		<ul class="small-menu"><!--small-nav -->
		<?php 

		if (isset($_SESSION['kullanici_tel'])) {?>

		<ul class="small-menu">
  			<li><a href="hesabim.php" class="myacc">Hesap Bilgilerim</a></li>
  			<li><a href="satislarim.php" class="myshop">Siparişlerim</a></li>
  			<li><a href="logout.php" class="mycheck">Güvenli Çıkış</a></li>
		</ul>

		<?php } ?>
		</ul><!--small-nav -->
		<div class="clearfix"></div>
		<div class="lines"></div>
	</div>
	