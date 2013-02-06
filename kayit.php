<?php
//Veritabanı bağlantı dosyamızı çekiyoruz
//vvvvvvvvvv
require_once("vtbaglan.php");
 
$adim = $_GET['adim'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
switch($adim){
case "":
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Üye Kayıt Formu</title>
</head>
 
<body>
<form action="kayit.php?adim=kayitonay" method="post">
<table width="400" border="0">
  <tr>
    <td width="115">Kullanıcı Adı</td>
    <td width="269"><input name="kyt_kulladi" type="text" /> <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td>Şifreniz</td>
    <td><input name="kyt_sifre" type="password" /> <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td>Şifreniz(Tekrar)</td>
    <td><input name="kyt_sifretekrar" type="password" /> <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td>E-Mail</td>
    <td><input name="kyt_email" type="text" /></td>
  </tr>
   <tr>
    <td> </td>
    <td><input type="submit" value="Kayıt Ol" /></td>
  </tr>
</table>
</form>
<br />Giriş yapmak için <a href="index.php">tıklayınız</a>
</body>
</html>
 
<?php
break;
 
case "kayitonay":
//Kayıt formundan metin kutusu verilerini çekiyoruz
$kullanici_adi         = $_POST['kyt_kulladi'];
$kullanici_sifre       = $_POST['kyt_sifre'];
$kullanici_sifretekrar = $_POST['kyt_sifretekrar'];
$kullanici_email       = $_POST['kyt_email'];
 
if(($kullanici_adi == "") and ($kullanici_sifre == "") and ($kullanici_sifretekrar == "")){ //Eğer kullanıcı adı, şifresi ve şifre(tekrar) alanı boş ise hata mesajı verdiriyoruz
    echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}elseif($kullanici_sifre != $kullanici_sifretekrar){ //Eğer kullanıcı şifresi ve şifre(tekrar) eşleşmiyorsa hata mesajı verdiriyoruz
    echo '<script type="text/javascript">alert("Şifreleriniz birbiriyle uyuşmuyor!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}else{ //Eğer boş bırakılan bir alan yoksa, şifre ve şifre(tekrar) eşleşiyorsa kullanıcı kayıt işlemini gerçekleştiriyoruz
    $kullanici_kaydet = mysql_query("INSERT INTO uyeler (kulladi,kullsifre,mail) VALUES ('$kullanici_adi','$kullanici_sifre','$kullanici_email')"); //Kullanıcıyı veritabanına kaydedicek mysql kodu
    echo '<script type="text/javascript">alert("Kayıt işleminiz başarıyla gerçekleşti!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}
break;
}
?>


