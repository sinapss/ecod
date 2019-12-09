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


?>