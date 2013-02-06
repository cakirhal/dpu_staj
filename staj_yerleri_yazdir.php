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
	
<meta http-equiv="refresh" content="1; url=staj_yerleri.php">
<script language="Javascript">

  window.print();

</script>
</head>

<body>
</style><font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
<br />



	<table align="center">
	<tr>
</tr>
	<td align="center" width="250"><h2><font color="black">İş Yeri Adı</font></h2></td>
	<td align="center" width="350"><h2><font color="black">İş Yeri Adresi</font></h2></td>
	</tr>

	<?php
	if ($_SESSION['listele3'] == 0)
	{echo '<font align=\"center\"><H2 align=\"center\">Adında '.$isim_ara.' Bulunan Staj Yerleri</H2></font>';
	$uyeler = mysql_query("SELECT * FROM staj_yeri where ad like '%$isim_ara%'"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	if ($_SESSION['listele3'] == 1)
	{echo '<font align=\"center\"><H2 align=\"center\">Tüm Staj Yerleri</H2></font>';
	$uyeler = mysql_query("SELECT * FROM staj_yeri"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id = mysql_result($uyeler, $sayac,'id');
		$ad =  mysql_result($uyeler, $sayac,'ad');
		$adress   =  mysql_result($uyeler, $sayac,'adres');
	?>
	<tr>
	
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$ad.'</font></h3>';?></td>
	<td align="center" width="250"><?php echo '<h3><font color="red">'.$adress.'</font></h3>';?></td>
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