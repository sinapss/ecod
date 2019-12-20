<?php
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
     

        //parolanın 6 haneden büüykmü bakar
        
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

                    

                    

                    if($ekle){
                        //header("Location:../../index.php?durum=loginbasarili");
                        echo "kayit başarılı";

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

/*
if (isset($_POST['kullaniciduzenle'])) {

	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_gsm=:kullanici_tel
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$kullaniciguncelle->execute(array(
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
        'kullanici_tel' => $_POST['kullanici_tel']));
        
    $kulAdresGuncelle=$db->prepare("UPDATE adres SET
        'il'=:il,
        'ilce'=:ilce,
        'adres'=:adres,
        'kullanici_id'=:kullanici_id
        WHERE kullanici_id={$_POST['kullanici_id']}");

    $update=$kulAdresGuncelle->execute(array(
        'il'=>$_POST['il'],
        'ilce'=>$_POST['ilce'],
        'kullanici_id'=>$_POST['kullanici_id'],
        'adres'=>$_POST['adres']));
}
*/
if (isset($_POST['kullaniciduzenle'])) {
	
	$kullanici_id=$_POST['kullanici_id'];

	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_tel=:kullanici_tel 
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$kullaniciguncelle->execute(array(
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
        'kullanici_tel' => $_POST['kullanici_tel']));
        
        $kullaniciguncelle=$db->prepare("UPDATE adres SET 
		il=:il,
		ilce=:ilce,
		adres=:adres 
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$kullaniciguncelle->execute(array(
		'il' => $_POST['kullanici_id'],
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


?>