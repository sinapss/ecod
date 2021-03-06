<?php
session_start();
include "baglan.php";

if(isset($_POST["kullanici_kaydet"])){
       //kişisel
       $kullanici_ad=htmlspecialchars($_POST["ad"]);
       $kullanici_soyad=htmlspecialchars($_POST["soyad"]);
       $kullanici_mail=htmlspecialchars($_POST["email"]);
       $kullanici_telefon=htmlspecialchars($_POST["telefon"]);
       $kullanici_dogum=htmlspecialchars($_POST["dogum_tarihi"]);
       $kullanici_parola_bir=($_POST['parola_bir']);
       $kullanici_parola_iki=($_POST['parola_iki']);

    if($kullanici_parola_bir==$kullanici_parola_iki){

            $kullanicisor=$db->prepare("select * from kullanici where kullanici_tel=:tel");
			$kullanicisor->execute(array(
                'tel'=>$kullanici_telefon
                ));
                //dönen satır varsa daha önce bu telefon numarasında kayıt oluşturulmuş anlamına geliyor bu yüzden kayıt gerçekleşmiyor
                $say=$kullanicisor->rowCount();
                if($say==0){

                    //parola şifrelendi
                    $sifre=md5($kullanici_parola_iki);

                    //Kullanıcı kayıt işlemi yapılıyor...
				    $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					    kullanici_ad=:kullanici_ad,
					    kullanici_soyad=:kullanici_soyad,
					    kullanici_mail=:kullanici_mail,
					    kullanici_sifre=:kullanici_sifre,
                        kullanici_tel=:kullanici_tel,
                        kullanici_yas=:kullanici_yas
                    ");
                    $ekle=$kullanicikaydet->execute(array(
                        'kullanici_ad' => $kullanici_ad,
                        'kullanici_soyad' => $kullanici_soyad,
                        'kullanici_mail' => $kullanici_mail,
                        'kullanici_sifre' => $sifre,
                        'kullanici_tel' => $kullanici_telefon,
                        'kullanici_yas' => $kullanici_dogum
					));
					//banka
					$kullanicibankakaydet=$db->prepare("INSERT INTO banka_bilgileri SET
					    kullanici_tel=:kullanici_tel,
					    banka_adi=:banka_adi,
					    kart_no=:kart_no,
					    kart_sahibi=:kart_sahibi,
                        son_kullanma_tarihi=:son_kullanma_tarihi,
                        guvenlik_kodu=:guvenlik_kodu
                    ");
                    $eklee=$kullanicibankakaydet->execute(array(
                        'kullanici_tel' => $_POST['telefon'],
                        'banka_adi' => $_POST['banka_adi'],
                        'kart_no' => $_POST['kart_no'],
                        'kart_sahibi' => $_POST['kart_sahibi'],
                        'son_kullanma_tarihi' => $_POST['son_kullanma_tarihi'],
                        'guvenlik_kodu' => $_POST['guvenlik_kodu']
					)); echo $eklee;
					
					//adres
					$kullaniciadreskaydet=$db->prepare("INSERT INTO adres SET
					    il=:il,
					    ilce=:ilce,
					    adres=:adres,
						kullanici_tel=:kullanici_tel
                    ");
                    $eklee=$kullaniciadreskaydet->execute(array(
                        'il' => $_POST['il'],
                        'ilce' => $_POST['ilce'],
						'adres' => $_POST['adres'],
						'kullanici_tel'=>$_POST['telefon']
                    ));

                    

                    

                    if($ekle){
                        //header("Location:../../index.php?durum=loginbasarili");
                        Header("Location:../../anasayfa.php?kullanici_id=$kullanici_id&durum=ok");

                    }
                    else{//kayıt sırasında hata oluşursa
                        //header("Location:../../register.php?durum=basarisiz");
                        echo "kayıt hatasi";
                    }

                }
                else{//aynı kayıt olduğu için kayıt başarısız
                    //header("Location:../../register.php?durum=mukerrerkayit");
                    echo "aynı telefon var";
                }

    }else{
        //header("Location:../../register.php?durum=farklisifre");
        echo "şifre aynı değil";
    }

}


if (isset($_POST['kullaniciduzenle'])) {
	
	$kullanici_id=$_POST['kullanici_id'];

	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_tel=:kullanici_tel 
		WHERE kullanici_tel={$_POST['kullanici_tel']}");

	$update=$kullaniciguncelle->execute(array(
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
        'kullanici_tel' => $_POST['kullanici_tel']));
        
        $kullaniciguncelle=$db->prepare("UPDATE adres SET 
		il=:il,
		ilce=:ilce,
		adres=:adres 
		WHERE kullanici_tel={$_POST['kullanici_tel']}");

	$update=$kullaniciguncelle->execute(array(
		'il' => $_POST['kullanici_il'],
		'ilce' => $_POST['kullanici_ilce'],
		'adres' => $_POST['kullanici_adres']));

	if($update){
		Header("Location:../adminPanel/kullanicilar.php?kullanici_id=$kullanici_id&durum=ok");
	}
	else{//düzenle
		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
    
}

if($_GET['kullanicisil']){

	$sil=$db->prepare("DELETE from kullanici WHERE kullanici_id=:id");
	$kontrol=$sil->execute(array(
        'id'=> $_GET['kullanici_id']));
        
        $sil=$db->prepare("DELETE from adres WHERE kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['kullanici_id']));

	if($kontrol){
		header("location:../adminPanel/kullanicilar.php?sil=ok");
	}
	else{
		header("location:../adminPanel/admin.php?sil=no");
	}
}

if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../images';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol,
        slider_durum=:slider_durum
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
        'slider_resimyol' => $refimgyol,
        'slider_durum'=>$_POST['slider_durum']
		));

	if ($insert) {

		Header("Location:../adminPanel/slider.php?durum=ok");

	} else {

		Header("Location:../adminPanel/slider.php?durum=no");
	}




}

if($_GET['slidersil']=="ok"){

	$sil=$db->prepare("DELETE from slider WHERE slider_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['slider_id']));

	if($kontrol){
		header("Location:../adminPanel/slider.php?durum=ok");
	}
	else{
		header("Location:../adminPanel/slider.php?durum=no");
	}
}

if(isset($_POST['sliderguncelle'])){

    $sliderguncelle=$db->prepare("UPDATE slider SET 
    slider_ad=:slider_ad,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_durum=:slider_durum
    WHERE slider_id={$_POST['slider_id']}");

$update=$sliderguncelle->execute(array(
'slider_ad' => $_POST['slider_ad'],
'slider_sira' => $_POST['slider_sira'],
'slider_link' => $_POST['slider_link'],
'slider_durum' => $_POST['slider_durum']
));

if($update){
header("Location:../adminPanel/slider.php?durum=ok");
}
else{
header("Location:../adminPanel/slider.php?durum=no");
}
}

if (isset($_POST['urunekle'])) {
	

	$urunekle=$db->prepare("INSERT INTO urun SET 
		urun=:urun_ad,
		urun_durum=:urun_durum");

	$insert=$urunekle->execute(array(
		'urun_ad' => $_POST['urun_ad'],
		'urun_durum' => $_POST['urun_durum']
	));

	if($insert){
		Header("Location:../adminPanel/urun.php?durum=ok");
	}
	else{
		Header("Location:../adminPanel/urun-ekle.php?durum=no");
	}
}

if (isset($_POST['urunduzenle'])) {
	
	$urunguncelle=$db->prepare("UPDATE urun SET 
    urun=:urun,
    urun_durum=:urun_durum
    WHERE urun_id={$_POST['urun_id']}");

$update=$urunguncelle->execute(array(
'urun' => $_POST['urun'],
'urun_durum' => $_POST['urun_durum']
));

if($update){
header("Location:../adminPanel/urun.php?durum=ok");
}
else{
header("Location:../adminPanel/urun.php?durum=no");
}
}


if($_GET['urunsil']=="ok"){

	$sil=$db->prepare("DELETE from urun WHERE urun_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['urun_id']));

	if($kontrol){
		header("Location:../adminPanel/urun.php?durum=ok");
	}
	else{
		header("Location:../adminPanel/urun.php?durum=no");
	}
}

if (isset($_POST['kurekle'])) {
	

	$urunekle=$db->prepare("INSERT INTO kur SET 
		urun_id=:urun_id,
		fiyat=:fiyat");

	$insert=$urunekle->execute(array(
		'urun_id' => $_POST['urun_id'],
		'fiyat' => $_POST['fiyat']
	));

	if($insert){
		Header("Location:../adminPanel/kur.php?durum=ok");
	}
	else{
		Header("Location:../adminPanel/kur-ekle.php?durum=no");
	}
}

if($_GET['kursil']=="ok"){

	$sil=$db->prepare("DELETE from kur WHERE kur_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['kur_id']));

	if($kontrol){
		header("Location:../adminPanel/kur.php?durum=ok");
	}
	else{
		header("Location:../adminPanel/kur.php?durum=no");
	}
}

if($_GET['iletisimisteksil']=="ok"){

	$sil=$db->prepare("DELETE from anonim_iletisim WHERE iletisim_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['iletisim_id']));

	if($kontrol){
		header("Location:../adminPanel/iletisimistek.php?durum=ok");
	}
	else{
		header("Location:../adminPanel/iletisimistek.php?durum=no");
	}
}

if (isset($_POST['iletisimgonder'])) {
	

	$urunekle=$db->prepare("INSERT INTO anonim_iletisim SET 
		mesaj=:mesaj");

	$insert=$urunekle->execute(array(
		'mesaj' => $_POST['email']
	));

	if($insert){
		Header("Location:../../anasayfa.php?durum=ok");
	}
	else{
		Header("Location:../../anasayfa.php?durum=no");
	}
}

if($_GET['iletisimsil']=="ok"){

	$sil=$db->prepare("DELETE from iletisim_mesaj WHERE iletisim_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['iletisim_id']));

	if($kontrol){
		header("Location:../adminPanel/iletisim.php?durum=ok");
	}
	else{
		header("Location:../adminPanel/iletisim.php?durum=no");
	}
}


if (isset($_POST['satisekle'])) {
	

	$urunekle=$db->prepare("INSERT INTO satis SET 
		urun_id=:urun_id,
		miktar=:miktar,
		kur_id=:kur_id,
		kullanici_tel=:kullanici_tel");

	$insert=$urunekle->execute(array(
		'urun_id' => $_POST['urun_id'],
		'miktar'=>$_POST['miktar'],
		'kur_id'=>$_POST['kur_id'],
		'kullanici_tel'=>$_POST['kullanici_tel']
	));

	if($insert){
		Header("Location:../adminPanel/siparistakip.php?durum=ok");
	}
	else{
		Header("Location:../adminPanel/siparistakip.php?durum=no");
	}
}

if($_GET['satissil']=="ok"){

	$sil=$db->prepare("DELETE from satis WHERE satis_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['satis_id']));

	if($kontrol){
		header("Location:../adminPanel/siparistakip.php?durum=ok");
	}
	else{
		header("Location:../adminPanel/siparistakip.php?durum=no");
	}
}

if (isset($_POST['satisduzenle'])) {
	
	$satisguncelle=$db->prepare("UPDATE satis SET 
    miktar=:miktar,
	urun_id=:urun_id,
	kullanici_tel=:kullanici_tel,
	satisTarih=:satisTarih,
	kur_id=:kur_id
	WHERE satis_id={$_POST['satis_id']}");
$update=$satisguncelle->execute(array(
'miktar' => $_POST['miktar'],
'urun_id'=>$_POST['urun_id'],
'kullanici_tel'=>$_POST['kullanici_tel'],
'satisTarih'=>$_POST['satisTarih'],
'kur_id'=>$_POST['kur_id']
));
 
if($update){
header("Location:../adminPanel/siparistakip.php?durum=ok");
}
else{
header("Location:../adminPanel/siparistakip.php?durum=no");
}
}





if (isset($_POST['kullanicigiris'])) {


	$kullanici_tel=$_POST['kullanici_tel']; 
	$kullanici_password=md5($_POST['kullanici_password']); 

	$kullanicisor=$db->prepare("select * from kullanici where kullanici_tel=:kullanici_tel and kullanici_yetki=:kullanici_yetki and kullanici_sifre=:kullanici_sifre");
	$kullanicisor->execute(array(
		'kullanici_tel' => $kullanici_tel,
		'kullanici_yetki' => 0,
		'kullanici_sifre' => $kullanici_password
		));

	$say=$kullanicisor->rowCount();

	if ($say==1) {
		$_SESSION['kullanici_tel']=$kullanici_tel;
		echo $_SESSION['kullanici_tel'];
		header("Location:../../anasayfa.php");
		exit;	
	} 
	else {
		header("Location:../../anasayfa.php?durum=basarisizgiris");
	}
}

if (isset($_POST['kullaniciduzenle'])) {

	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
	kullanici_ad=:kullanici_ad,
	kullanici_soyad=:kullanici_soyad,
	kullanici_mail=:kullanici_mail,
	kullanici_yas=:kullanici_yas
	WHERE kullanici_tel={$_POST['kullanici_tel']}");

	$update=$kullaniciguncelle->execute(array(
	'kullanici_ad' => $_POST['kullanici_ad'],
	'kullanici_soyad' => $_POST['kullanici_soyad'],
	'kullanici_mail' => $_POST['kullanici_mail'],
	'kullanici_yas' => $_POST['kullanici_yas']
	));
	
	$adresguncelle=$db->prepare("UPDATE adres SET 
	il=:il,
	ilce=:ilce,
	adres=:adres
	WHERE kullanici_tel={$_POST['kullanici_tel']}");

	$update=$adresguncelle->execute(array(
		'il'=>$_POST['il'],
		'ilce'=>$_POST['ilce'],
		'adres'=>$_POST['adres']
	));


	$bankaguncelle=$db->prepare("UPDATE banka_bilgileri SET
	banka_adi=:banka_adi,
	kart_no=:kart_no,
	kart_sahibi=:kart_sahibi,
	son_kullanma_tarihi=:son_kullanma_tarihi,
	guvenlik_kodu=:guvenlik_kodu
	WHERE kullanici_tel={$_POST['kullanici_tel']}");

	$update=$bankaguncelle->execute(array(
		'banka_adi'=>$_POST['banka_adi'],
		'kart_no'=>$_POST['kart_no'],
		'kart_sahibi'=>$_POST['kart_sahibi'],
		'son_kullanma_tarihi'=>$_POST['son_kullanma_tarihi'],
		'guvenlik_kodu'=>$_POST['guvenlik_kodu']
	));




	if($update){
	header("Location:../../hesabim.php?durum=basarili");
	}
	else{
	header("Location:../../hesabim.php?durum=basarisiz");
	}


}



if(isset($_POST["admingiris"])){
	$kullanici_tel=$_POST["kullanici_tel"];
	$kullanici_password=md5($_POST["kullanici_password"]);

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_tel=:kullanici_tel and kullanici_sifre=:kullanici_sifre 
		and kullanici_yetki=:kullanici_yetki");
	$kullanicisor->execute(array(
		'kullanici_tel'=> $kullanici_tel,
		'kullanici_sifre'=> $kullanici_password,
		'kullanici_yetki'=> 5
			));
	echo $say=$kullanicisor->rowCount();

	if($say==1){
		$_SESSION['kullanici_tel']=$kullanici_tel;
		header("Location:../adminPanel/admin.php");
		exit;
	}
	else{
		header("Location:../adminPanel/index.php?durum=no");
		exit;
	}

}

?>