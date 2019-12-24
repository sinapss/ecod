<?php include "header.php";


$siparisGetir=$db->prepare("SELECT * FROM satis s inner join kullanici k on s.kullanici_tel=k.kullanici_tel inner join kur kr on kr.kur_id=s.kur_id inner join urun u on u.urun_id=kr.urun_id where k.kullanici_tel=".$_SESSION["kullanici_tel"]." order by satis_id desc");
$siparisGetir->execute();


?>

<div class="container">
<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Satişlarım</div>
							<p>Satış Geçmişim.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="title-bg">
			<div class="title">Satışlar</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Satış ID</th>
						<th>Satiş Tarih</th>
						<th>Ürün</th>
						<th>Kilogram</th>
						<th>Fiyat</th>
					</tr>
				</thead>
				<tbody>
					<?php	while ($sipariscek=$siparisGetir->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td><?php echo $sipariscek["satis_id"]; ?></td>
						<td><?php echo $sipariscek["satisTarih"]; ?></td>
						<td><?php echo $sipariscek["urun"]; ?> </td>
						<td><?php echo number_format($sipariscek["miktar"], 2, ',', '.'); ?> <span class="badge badge-pill badge-success">KG</span></td>
						<td><?php  echo number_format($sipariscek["miktar"]* $sipariscek["fiyat"], 2, ',', '.'); ?> <span class="badge badge-pill badge-success">TL</span></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="spacer"></div>
	</div>

</div>

<?php include "footer.php"; ?>