<?php 
include 'header.php';
?>
	
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Geri Dönüşüm Kurları</div>
							<p >Satış Yaptığınız Gündeki Kur Geçerlidir.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	 
				
		<div class="row prdct"><!--Products-->
		<?php	$kursor=$db->prepare("SELECT * FROM urun u inner join kur k on k.urun_id=u.urun_id order by tarih desc");
				$kursor->execute();
				while ($kurcek=$kursor->fetch(PDO::FETCH_ASSOC)) { 
				 if($kurcek['urun_id']==3){ ?>
			<div class="col-md-3">
				<div class="productwrap">
					<div class="pr-img">
						<a href="#"><img src="images\plastikDonusum.jpg" alt="" class="img-responsive"></a>
						<div class="pricetag"><div class="inner"><img width="70" height="70" src="images\down.png" alt=""></div></div>
					</div>
					<div class="title">Plastik</div>
					<span><?php echo $kurcek['fiyat']; ?><span class="badge badge-pill badge-success">KG</span></span>
					<span><?php echo $kurcek['tarih']; ?> </span>
				</div>
			</div>
			<?php } elseif($kurcek['urun_id']==2){ ?>
				
			<div class="col-md-3">
				<div class="productwrap">
					<div class="pr-img">
						<a href="#"><img src="images\camDonusum.jpg" alt="" class="img-responsive"></a>
						<div class="pricetag"><div class="inner"><img width="70" height="70" src="images\up.png" alt=""></div></div>
					</div>
					<div class="title">Cam</div>
					<span><?php echo $kurcek['fiyat']; ?><span class="badge badge-pill badge-success">KG</span></span>
					<span><?php echo $kurcek['tarih']; ?> </span>
				</div>
			</div>
		<?php } elseif($kurcek['urun_id']==1){ ?>	
			<div class="col-md-3">
				<div class="productwrap">
					<div class="pr-img">
						<a href="#"><img src="images\kagitDonusum.jpg" alt="" class="img-responsive"></a>
						<div class="pricetag"><div class="inner"><img width="70" height="70" src="images\up.png" alt=""></div></div>
					</div>
					<div class="title">Kağıt</div>
					<span><?php echo $kurcek['fiyat']; ?><span class="badge badge-pill badge-success">KG</span></span>
					<span><?php echo $kurcek['tarih']; ?> </span>
				</div>
			</div>
		<?php } elseif($kurcek['urun_id']==5){ ?>	
			<div class="col-md-3">
				<div class="productwrap">
					<div class="pr-img">
						<a href="#"><img src="images\metalDonusum.jpg" alt="" class="img-responsive"></a>
						<div class="pricetag"><div class="inner"><img width="70" height="70" src="images\up.png" alt=""></div></div>
					</div>
					<div class="title">Metal</div>
					<span><?php echo $kurcek['fiyat']; ?><span class="badge badge-pill badge-success">KG</span></span>
					<span><?php echo $kurcek['tarih']; ?> </span>
				</div>
			</div>	
		<?php } } ?>
		</div>
		<div class="spacer"></div>		<!--Boşluk bırakır-->

	</div>

	<?include 'footer.php';?>
	
	