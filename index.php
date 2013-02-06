<?php
session_start();
require_once("vtbaglan.php");
 
//Bir string değişken oluşturduk
// Undefined index hatası vermesin diye değeri
// kontrol etmemiz gerekiyor
if (!isset($_GET['adim']))
{
//If not isset -> set with dumy value
$_GET['adim'] = "";
} 

$adim = $_GET['adim'];

$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo $bolum_adi;?> Staj Sistemi</title>

	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
	<link type="text/css" href="still.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>
</head>


<body>
<div class="bolum_adi">
	<font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
</div>

<div id="menu">
    <ul class="menu">
		<li class="last"><span><a align="right" href="dokuman.php">&nbsp;    DÖKÜMAN     &nbsp;</a></span></li>
		<li class="last"><span><a class="parent" href="staj_yeri.php">&nbsp;   STAJ YERLERİ    &nbsp;</a></span></li>
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<form action="index.php?adim=girisonay" method="post">
<div class="kullanici_giris ortak_div_ozellikleri">
<table id="kullanici_giris">
	<tr>
		<td><h3>Kullanıcı Adı &nbsp;&nbsp; </h3></td>
		<td><input class="text" name="grs_kulladi" type="text"></td>
	</tr>
	<tr>
		<td><h3>Şifre</h3></td>
		<td><input class="text" name="grs_sifre" type="password"></td>
	</tr>
	<tr>
		<td><input class="buton" type="submit" value="Giriş Yap"></td>
		<td><a class="buton" align="right" style="color:white;" href="sifremi_unuttum.php">&nbsp;    şifremi unuttum     &nbsp;</a></td>
	</tr>



<?php
switch($adim){
case "girisonay":
//Giriş formundan metin kutusu verilerini çekiyoruz
$giris_adi   = strip_tags(trim($_POST['grs_kulladi']));
$giris_sifre = strip_tags(trim($_POST['grs_sifre']));
$sifreli=md5($giris_sifre);
	if(($giris_adi == "") or ($giris_sifre == ""))
	{ //Eğer kullanıcı adı ve şifre alanı boş bırakılırsa bir hata mesajı verdiriyoruz
		echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
	else
	{ //Eğer kullanıcı adı ve şifre alanı boş değilse kullanıcı bilgilerini veritabanındaki bilgiler ile karşılarştırıyoruz
		$uyeler = mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$giris_adi' and sifre='$sifreli'"); //Veritabanındaki uyeler tablosundaki verilerimizi metin kutusu verileri ile eşleştiriyoruz
		$uyebul = mysql_num_rows($uyeler); //Üyeleri sayı olarak tanımlıyoruz
		$uyeler2 = mysql_query("SELECT * FROM personel WHERE kullanici_adi='$giris_adi' and sifre='$sifreli'"); //Veritabanındaki uyeler tablosundaki verilerimizi metin kutusu verileri ile eşleştiriyoruz
		$uyebul2 = mysql_num_rows($uyeler2); //Üyeleri sayı olarak tanımlıyoruz
	
		if($uyebul >0)
		{ //Eğer üye varsa aşağıdaki kodları çalıştırıyoruz
			$mailcek = mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$giris_adi'"); //Giriş doğrulanırsa giriş yapan kişinin kullanıcı adı ile mail adresini eşleştiriyoruz
			$mailcek2 = mysql_fetch_array($mailcek); //Giriş yapan kişinin kullanıcı adı ve mail adresi eşleşen mail adresini yeni bir değişkene atıyoruz
			$_SESSION['ogr_no'] = $giris_adi; //Giriş doğrulanırsa metin kutusundaki kullanıcı adını kulladi isimli SESSION'a atıyoruz
			$_SESSION['sifre']   = $mailcek2['sifre']; //Giriş doğrulanırsa profil sayfası için giriş yapan kişinin kullanıcı adı ile eşleşen mail adresini email isimli SESSION'a atıyoruz
			$_SESSION['rutbe']   = 5; //Giriş doğrulanırsa rutbe isimli bir SESSION oluşturup istediğimiz bir değer atıyoruz
			echo '<meta http-equiv="refresh" content="0;URL=ogrenci2.php">';
		}
		else if($uyebul2 >0)
		{
		$mailcek = mysql_query("SELECT * FROM personel WHERE kullanici_adi='$giris_adi'"); //Giriş doğrulanırsa giriş yapan kişinin kullanıcı adı ile mail adresini eşleştiriyoruz
			$mailcek2 = mysql_fetch_array($mailcek); //Giriş yapan kişinin kullanıcı adı ve mail adresi eşleşen mail adresini yeni bir değişkene atıyoruz
			$_SESSION['pers_no'] = $giris_adi; //Giriş doğrulanırsa metin kutusundaki kullanıcı adını kulladi isimli SESSION'a atıyoruz
			$_SESSION['sifre']   = $mailcek2['sifre']; //Giriş doğrulanırsa profil sayfası için giriş yapan kişinin kullanıcı adı ile eşleşen mail adresini email isimli SESSION'a atıyoruz
			$_SESSION['rutbe']   = 10; //Giriş doğrulanırsa rutbe isimli bir SESSION oluşturup istediğimiz bir değer atıyoruz
			//echo '<script type="text/javascript">alert("Başarıyla giriş yaptınız! Personel sayfanıza yönlendirileceksiniz...");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=personel.php">';
		
		}
		else
		{ //Eğer kullanıcı adı veya şifre yanlışsa veya yoksa hata mesajı verdiriyoruz
		//echo '<h3>Burası <font color="red">'.asdasd.'</font> isimli öğrencinin profilidir.</h3>';
		   echo '<script type="text/javascript">alert("Kullanıcı adı veya şifreniz yanlış!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			
		}
    }
break;
}
?>

</table>
</div>
</form>

<!-- End Save for Web Slices -->
</body>
</html>