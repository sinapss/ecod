<?php include 'header.php'; ?>


<div class="container">
<form class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kişisel Detaylar</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name" placeholder="İsim">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="last_name" placeholder="Soyisim">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="email" placeholder="Email">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="phone" placeholder="Telefon">
						</div>
						<div class="col-sm-6">
							<input type="date" class="form-control" id="date" placeholder="Dogum Tarihi">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-6">
							<select name="" class="form-control" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
					<div class="title-bg">
						<div class="title">Banka Bilgileri</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="username-2" placeholder="Banka Adı">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="username-2" placeholder="Kart üzerindeki isim">
						</div>
                    </div>
                    <div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="username-2" placeholder="Kart No">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="conpass" placeholder="Güvenlik Kodu">
						</div>
						<div class="col-sm-6">
							<input type="date" class="form-control">
						</div>
					</div>
					<button class="btn btn-default btn-info">Kayıt</button>
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Adresiniz</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="company" placeholder="İL">
                        </div>
                        <div class="col-sm-6">
							<input type="text" class="form-control" id="address" placeholder="İLÇE">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="address" placeholder="Adress">
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