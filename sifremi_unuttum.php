<?php
session_start();
require_once("vtbaglan.php");

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
<title>


</title>
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
		<li class="last"><span><a align="right" href="index.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<div class="sifremi_unuttum ortak_div_ozellikleri">
<form action="sifremi_unuttum.php?adim=girisonay" method="post">
<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Öğrenci Numarası</h4></td>
<td align="left" width="150"><input name="ogrenci_no" type="text"></td>

</tr>
<tr>
<td align="left" width="200"><h4>Mail Adresi</h4></td>
<td align="left" width="150"><input name="e_mail" type="text"></td>
</tr>
<tr>
<td align="left" width="200"></td>
<td align="left" width="150"><input class="buton" type="submit" value="onayla"></td>
</tr>
</form>

</table>
</div>
</body>
</html>
<?php


if ($adim=="girisonay")
{
$ogrenci_no = $_POST['ogrenci_no'];
$e_mail = $_POST['e_mail'];

if ($ogrenci_no=="" or $e_mail=="")
{
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=sifremi_unuttum.php">';
}
else
{
	$uyeler = mysql_query("SELECT * FROM ogrenci where ogrenci_no='$ogrenci_no' and e_posta='$e_mail'"); 
	$uyebul = mysql_num_rows($uyeler);
	if ($uyebul>0)
	{
		$_SESSION['sifremi_unuttum_ogrenci_no']=$ogrenci_no;
		$_SESSION['sifremi_unuttum_e_mail']=$e_mail;
		$_SESSION['sifremi_unuttum_adi']=mysql_result($uyeler, 0,'ad_soyad');
		//echo '<script type="text/javascript">alert("yeni şifre mail olarak gönderildi");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=eposta.php">';
	}
	else
	{
		echo '<script type="text/javascript">alert("bu öğrencinin böyle bir mail adresi yok");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=sifremi_unuttum.php">';
	}

}
}
?>