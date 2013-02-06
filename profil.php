<?php
session_start();
if($_SESSION['rutbe'] ==5)
{

//Veritabanı bağlantı dosyamızı çekiyoruz
require_once("vtbaglan.php");
if (!isset($_GET['adim']))
{
//If not isset -> set with dumy value
$_GET['adim'] = "";
} 
$adim = $_GET['adim'];

if (!isset($_SESSION['ogr_no']))
{
//If not isset -> set with dumy value
$_SESSION['ogr_no'] = "";
} 
$giris_adi=$_SESSION['ogr_no'];

 $bilgi=mysql_fetch_row(mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$giris_adi'"));
//<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<title>Üye Profili</title>
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
		<li class="last"><span><a align="right" href="ogrenci2.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<div class="profil ortak_div_ozellikleri">
 <form action="profil.php?adim=girisonay" method="post">
 <table border="1" align="center">
<tr>
<td align="left" width="300" height="40"><?php echo '<h3>Öğrenci Numarasi   :</td><td align="center"><font color="red">'.$bilgi[0].'</font></h3>';?></td>
</tr>
<tr>
<td align="left" width="300" height="40"><?php echo '<h3>TC Kimlik No       :</td><td align="center"><font color="red">'.$bilgi[1].'</font></h3>';?></td>
</tr>
<tr>
<td align="left" width="300" height="40"><?php echo '<h3>Adi Soyadi            :</td><td align="center"><font color="red">'.$bilgi[2].'</font></h3>';?></td>
</tr>
<tr>
<td align="left" width="300" height="40"><?php echo '<h3>Telefon Numarasi      :</td><td align="center">';?><font color="red"><input name="tel_no" type="text" value="<?php echo''.$bilgi[3].''; ?>"></font></h3></td>
</tr>
<tr>
<td align="left" width="300" height="40"><?php echo '<h3>Mail Adresi           :</td><td align="center">';?><font color="red"><input name="mail" type="text" value="<?php echo''.$bilgi[4].''; ?>"></font></h3></td>
</tr>
<tr>
<td align="left" width="300" height="40"><?php echo '<h3>yeni sifrenizi giriniz:</td><td align="center">';?><input name="sifre" type="text"></td>
</tr>
</tr>
<tr>
<td colspan="2" align="right"> <input type="submit" class="buton" value="Güncelle" width="80" height="17" alt=""></td>
</tr>
</table>
</div>
<?php

if ($adim=="girisonay")
{
$tel_no   = $_POST['tel_no'];
$mail = $_POST['mail'];
$sif = $_POST['sifre'];
$mailcek = mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$giris_adi'");
			$mailcek2 = mysql_fetch_array($mailcek);
	
	if ($sif!="")
	{
		$sifre=md5($sif);
	}
	if($sif!="")
			mysql_query("update ogrenci set cep_telefonu='".$tel_no."',e_posta='".$mail."',sifre='".$sifre."' WHERE ogrenci_no='$giris_adi'");
	else
			mysql_query("update ogrenci set cep_telefonu='".$tel_no."',e_posta='".$mail."' WHERE ogrenci_no='$giris_adi'");
		echo '<script type="text/javascript">alert("Güncelleme işlemi Başarıyla gerçekleşti...");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=ogrenci2.php">';
}
?>
</form>
</body>
</html>

<?php
}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>