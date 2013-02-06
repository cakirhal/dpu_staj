<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim2 = $_GET['adim2'];
$adim4 = $_GET['adim4'];
$giris_adi=$_SESSION['ogr_no'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link type="text/css" href="still.css" rel="stylesheet" />

<script type="text/javascript">
function aktar(af){
var ad = document.getElementById(af).innerHTML;
window.opener.document.getElementById("ogrenci_no").value=ad;
window.close();
}

</script>
</head>
<body>
<div class="upload_ogrenci_sec ortak_div_ozellikleri">
<table align="right">

	<table border="1">
	<tr>
	
<form action="upload_ogrenci_sec.php?adim4=girisonay4" method="post">
	<td align="center" width="250"><h4><font color="black">Aramak istediğiniz öğrencinin adını soyadını giriniz.</font></h4></td>
	<td align="center" width="350"><h2><input name="isim_ara" type="text" class="hide"><input type="submit" value="ara"></h2></td>
	</tr>
	</form>
	</table>
	
	
	<?php
	if ($adim4=="girisonay4")
	{
	$no_ara=$_POST['no_ara'];
	$isim_ara=$_POST['isim_ara'];

	?>
	<table border="1">
	<tr>
	<td align="center" width="250"><h2><font color="black">Öğrenci No</font></h2></td>
	<td align="center" width="350"><h2><font color="black">Ad Soyad</font></h2></td>

	<td align="center" width="50">seç</td>
	</tr>

	<?php
	if ( $adim4=="girisonay4")
	{
	$uyeler = mysql_query("SELECT * FROM ogrenci where ad_soyad like '%$isim_ara%'"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$ogrenci_no = mysql_result($uyeler, $sayac,'ogrenci_no');
		$tc_no =  mysql_result($uyeler, $sayac,'tc_no');
		$ad_soyad   =  mysql_result($uyeler, $sayac,'ad_soyad');
		$cep_telefonu = mysql_result($uyeler, $sayac,'cep_telefonu');
		$e_posta = mysql_result($uyeler, $sayac,'e_posta');
	?>
	<tr>
	<td id="<?php echo $ogrenci_no;?>" align="center" width="350"><?php echo $ogrenci_no;?></td>
	<td align="center" width="250"><?php echo $ad_soyad;?></td>

	<form action="upload_ogrenci_sec.php?adim2=<?php echo $ogrenci_no;	 ?>" method="post">
	<td align="center" width="50"><input type="button" name="sec" value="seç" onclick="aktar('<?php echo $ogrenci_no;?>')"> </td>
	</form>
	</tr>
	<?php	
		}
	?>
</table>

<?php

}

?>
	<?php
	
		if ($adim2!="")
		{
	$_SESSION['ogrenci_sec'] = $_GET['adim2'];
	echo '<script type="text/javascript"> window.opener.document.getElementById("ad").value="ad"; window.close();</script>';
	 }
	?>	

</table>
</div>
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