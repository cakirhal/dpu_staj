<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim = @$_GET['adim'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
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
		<li class="last"><span><a align="right" href="kullanicilar.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<div class="kullanici_ekle ortak_div_ozellikleri">
<form action="kullanici_ekle.php?adim=girisonay" method="post">
<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Kullanıcı Adı</h4></td>
<td align="left" width="150"><input name="kullanici_adi" type="text" value="<?php echo $_SESSION['kullanici_adi']; ?>" ></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Adı Soyadı</h4></td>
<td align="left" width="150"><input name="ad_soyad" type="text" value="<?php echo $_SESSION['ad_soyad']; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Şifre</h4></td>
<td align="left" width="150"><input name="sifre" type="password"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
<tr>
<td>&nbsp;  </td>
<td><input type="submit" class="buton" value="Kullanıcı Ekle"></td>
<td>&nbsp;  </td>
</tr>
</table>

</form>
</div>
</body>
</html>
<?php


if ($adim=="girisonay")
{
$kullanici_adi = $_POST['kullanici_adi'];
$ad_soyad = $_POST['ad_soyad'];
$sifre   = $_POST['sifre'];
$sifreli=md5($sifre);

if ($ad_soyad=="" or $kullanici_adi=="" or $sifre=="")
{
		$_SESSION['kullanici_adi']=$kullanici_adi;
		$_SESSION['ad_soyad']=$ad_soyad;
		
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=kullanici_ekle.php">';
}
else
{
	$uyeler = mysql_query("SELECT * FROM personel where kullanici_adi='$kullanici_adi'"); 
	$uyebul = mysql_num_rows($uyeler);
	if ($uyebul>0)
	{
	$_SESSION['kullanici_adi']=$kullanici_adi;
		$_SESSION['ad_soyad']=$ad_soyad;
		echo '<script type="text/javascript">alert("bu kullanıcı adı kullanılıyor başka bir kullanıcı adı giriniz");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=kullanici_ekle.php">';
	}
	else
	{
	$_SESSION['kullanici_adi']="";
		$_SESSION['ad_soyad']="";
		
		mysql_query("INSERT INTO personel VALUES ('".$kullanici_adi."','".$ad_soyad."','".$sifreli."')");
		echo '<script type="text/javascript">alert("Ekleme Gerçekleştirildi");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=kullanicilar.php">';
	}

}
}

}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>