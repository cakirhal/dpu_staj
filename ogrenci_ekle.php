<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
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



<div class="ogrenci_ekle ortak_div_ozellikleri">
<form action="ogrenci_ekle.php?adim=girisonay" method="post">

<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Öğrenci No</h4></td>
<td align="left" width="150"><input name="ogrenci_no" type="text" value="<?php echo $_SESSION['ogrenci_no']; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>TC Kimlik Numarası</h4></td>
<td align="left" width="150"><input name="tc_no" type="text" value="<?php echo $_SESSION['tc_no']; ?>"></td>
<td>&nbsp;  </td> 
</tr>
<tr>
<td align="left" width="200"><h4>Adı Soyadı</h4></td>
<td align="left" width="150"><input name="ad_soyad" type="text" value="<?php echo $_SESSION['ad_soyad']; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Cep Telefonu</h4></td>
<td align="left" width="150"><input name="cep_telefonu" type="text" value="<?php echo $_SESSION['cep_telefonu']; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>E-Posta</h4></td>
<td align="left" width="150"><input name="e_posta" type="text" value="<?php echo $_SESSION['e_posta']; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Şifre</h4></td>
<td align="left" width="150"><input name="sifre" type="text"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
<tr>
<td>&nbsp;  </td>
<td><input type="submit" class="buton" value="Öğrenci Ekle"></td>
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
$ogrenci_no = $_POST['ogrenci_no'];
$tc_no   = $_POST['tc_no'];
$ad_soyad = $_POST['ad_soyad'];
$cep_telefonu   = $_POST['cep_telefonu'];
$e_posta = $_POST['e_posta'];
$sifre   = $_POST['sifre'];
$sifreli=md5($sifre);

if ($ogrenci_no=="" or $ad_soyad=="" or $sifre=="")
{

	
$_SESSION['ogrenci_no']=$ogrenci_no;
$_SESSION['tc_no']=$tc_no;
$_SESSION['ad_soyad']=$ad_soyad;
$_SESSION['cep_telefonu']=$cep_telefonu;
$_SESSION['e_posta']=$e_posta;


echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=ogrenci_ekle.php">';
}
else
{
	$uyeler = mysql_query("SELECT * FROM ogrenci where ogrenci_no='$ogrenci_no'"); 
	$uyebul = mysql_num_rows($uyeler);
	if ($uyebul>0)
	{
			
		$_SESSION['ogrenci_no']=$ogrenci_no;
		$_SESSION['tc_no']=$tc_no;
		$_SESSION['ad_soyad']=$ad_soyad;
		$_SESSION['cep_telefonu']=$cep_telefonu;
		$_SESSION['e_posta']=$e_posta;

		echo '<script type="text/javascript">alert("aynı nnumarada öğrenci var! Başka öğrenci numarası giriniz");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=ogrenci_ekle.php">';
	}
	else
	{
			
		$_SESSION['ogrenci_no']="";
		$_SESSION['tc_no']="";
		$_SESSION['ad_soyad']="";
		$_SESSION['cep_telefonu']="";
		$_SESSION['e_posta']="";
		mysql_query("INSERT INTO ogrenci VALUES ('".$ogrenci_no."','".$tc_no."','".$ad_soyad."','".$cep_telefonu."','".$e_posta."','".$sifre."','0')");
	
		echo '<script type="text/javascript">alert("Ekleme Gerçekleştirildi");</script>';
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