<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$isim_ara=$_SESSION['isim_ara'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="refresh" content="1; url=kullanicilar.php">
<script language="Javascript">

  window.print();

</script>
</head>


<body>
<div class="bolum_adi">
	<font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
</div>
<br />

	<table align="center">

	<tr>
	<td align="center" width="250"><h2><font color="black">Kullanıcı Adı</font></h2></td>
	<td align="center" width="350"><h2><font color="black">Ad Soyad</font></h2></td>
	</tr>

	<?php
	if ($_SESSION['listele2'] == 0)
	{
	echo '<font align=\"center\"><H2 align=\"center\">Adı Soyadında '.$isim_ara.' Bulunan Öğrenciler</H2></font>';
	$uyeler = mysql_query("SELECT * FROM personel where ad_soyad like '%$isim_ara%'"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	else if ($_SESSION['listele2'] == 1)
	{
	echo '<font align=\"center\"><H2 align=\"center\">Tüm Kullanıcıların Listesi</H2></font>';
	$uyeler = mysql_query("SELECT * FROM personel"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	
	
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$kullanici_adi = mysql_result($uyeler, $sayac,'kullanici_adi');
		$ad_soyad   =  mysql_result($uyeler, $sayac,'ad_soyad');
	?>
	<tr>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$kullanici_adi.'</font></h3>';?></td>
	<td align="center" width="250"><?php echo '<h3><font color="red">'.$ad_soyad.'</font></h3>';?></td>
	</tr>
	<?php	
		}
	?>
</table>
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