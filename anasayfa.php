<?php include 'header.php';?>

<div class="container">
		<div class="clearfix"></div>
		<div class="lines"></div>
		<div class="main-slide">
			<div id="sync1" class="owl-carousel">
				<?php 
				$slidersor=$db->prepare("SELECT * FROM slider");
				$slidersor->execute();

				while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {  

				?>
                <div class="item">
					<div class="slide-type-1">
                        <a href="<?php echo $slidercek['slider_link']; ?>">
                        <img src="<?php echo $slidercek['slider_resimyol']; ?>" alt="" class="img-responsive">
                        </a>
					</div>
				</div>
				<?php } ?>
				
			</div>
		</div>
		<div class="bar"></div>
		<div id="sync2" class="owl-carousel">			
            <div class="item">
				<div class="slide-type-1-sync">
					<h3><?php echo $slidercek['slider_ad']; ?></h3>
					<p>Tükettikçe Güçleniyor!!!</p>
				</div>
			</div>			
		</div>
	</div>
	
	</div>



<?php include 'footer.php' ?>