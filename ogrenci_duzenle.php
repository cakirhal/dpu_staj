<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$gecici2=$_SESSION['ogrenci_duzenle'];
$uyeler2 = mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$gecici2'"); 
$uyebul2 = mysql_fetch_array($uyeler2);
$ogrenci_no = $uyebul2['ogrenci_no'];
$tc_no   = $uyebul2['tc_no'];
$ad_soyad = $uyebul2['ad_soyad'];
$cep_telefonu   = $uyebul2['cep_telefonu'];
$e_posta = $uyebul2['e_posta'];
$sifre   = $uyebul2['sifre'];

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
		<li class="last"><span><a align="right" href="ogrenci_bilgileri.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />

<div class="ogrenci_duzenle ortak_div_ozellikleri">
<form action="ogrenci_duzenle.php?adim=girisonay" method="post">
<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Öğrenci No</h4></td>
<td align="left" width="150"><input name="ogrenci_no" type="text" value="<?php echo ''.$ogrenci_no.''; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>TC Kimlik Numarası</h4></td>
<td align="left" width="150"><input name="tc_no" type="text" value="<?php echo ''.$tc_no.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Adı Soyadı</h4></td>
<td align="left" width="150"><input name="ad_soyad" type="text" value="<?php echo ''.$ad_soyad.''; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Cep Telefonu</h4></td>
<td align="left" width="150"><input name="cep_telefonu" type="text" value="<?php echo ''.$cep_telefonu.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>E-Posta</h4></td>
<td align="left" width="150"><input name="e_posta" type="text" value="<?php echo ''.$e_posta.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Şifre</h4></td>
<td align="left" width="150"><input name="sifre" type="text"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
<tr>
<td>&nbsp;  </td>
<td><input type="submit" class="buton" value="Öğrenci Güncelle"></td>
<td>&nbsp;  </td>
</tr>
</table>

</form>
</div>
</body>
</html>
<?php
if($adim=="girisonay")
{
//$id   = $_POST['id'];
$ogrenci_no = $_POST['ogrenci_no'];
$tc_no   = $_POST['tc_no'];
$ad_soyad = $_POST['ad_soyad'];
$cep_telefonu   = $_POST['cep_telefonu'];
$e_posta = $_POST['e_posta'];
$sifre   = $_POST['sifre'];
$sifreli=md5($sifre);
if ($ogrenci_no=="" or $ad_soyad=="")
{
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=ogrenci_duzenle.php">';
}
else
{
	$uyeler = mysql_query("SELECT * FROM ogrenci where ogrenci_no='$ogrenci_no'"); 
	$uyebul = mysql_num_rows($uyeler);
	if ($uyebul>1)
	{
		echo '<script type="text/javascript">alert("aynı nnumarada öğrenci var! Başka öğrenci numarası giriniz");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=ogrenci_duzenle.php">';
	}
	else
	{
		if ($sifre=="")
		mysql_query("UPDATE ogrenci set ogrenci_no='".$ogrenci_no."',tc_no='".$tc_no."',ad_soyad='".$ad_soyad."',cep_telefonu='".$cep_telefonu."',e_posta='".$e_posta."' where ogrenci_no='".$gecici2."' ");
		else
		mysql_query("UPDATE ogrenci set ogrenci_no='".$ogrenci_no."',tc_no='".$tc_no."',ad_soyad='".$ad_soyad."',cep_telefonu='".$cep_telefonu."',e_posta='".$e_posta."',sifre='".$sifreli."' where ogrenci_no='".$gecici2."' ");
		
		echo '<script type="text/javascript">alert("Güncelleme Gerçekleştirildi");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=ogrenci_bilgileri.php">';
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