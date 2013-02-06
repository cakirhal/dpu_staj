<?php 
session_start();
if($_SESSION['rutbe'] ==5)
{
require_once("vtbaglan.php");
if (!isset($_GET['adim2']))
{
//If not isset -> set with dumy value
$_GET['adim2'] = "";
} 
$adim2 = $_GET['adim2'];

if (!isset($_GET['adim3']))
{
//If not isset -> set with dumy value
$_GET['adim3'] = "";
} 
$adim3 = $_GET['adim3'];

if (!isset($_GET['adim4']))
{
//If not isset -> set with dumy value
$_GET['adim4'] = "";
} 
$adim4 = $_GET['adim4'];

if (!isset($_SESSION['ogr_no']))
{
//If not isset -> set with dumy value
$_SESSION['ogr_no'] = "";
} 
$giris_adi=$_SESSION['ogr_no'];
//<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head><title>Dokuman</title>
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
		<li class="last"><span><a align="right" href="ogrenci2.php">&nbsp;    GERİ     &nbsp;</a></span></li>
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />

<div class="dokumanlarim ortak_div_ozellikleri">
<table border="0" align="center">

	<?php
	$uyeler = mysql_query("SELECT * FROM dokuman where kullanici_id='".$giris_adi."'"); 
	$uyebul = mysql_num_rows($uyeler);
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id= mysql_result($uyeler, $sayac,'id');
		$ad = mysql_result($uyeler, $sayac,'ad');
		$yol =  mysql_result($uyeler, $sayac,'yol');
		//dokuman.php?adim3=girisonay3
	?>
	<tr>
		<td align="left" width="350"><?php echo '<h3><font color="red"><a align="left" target="blank" href="'.$yol.'">'.$ad.'</a></font></h3>';?></td>
	</tr>
	<?php	
		}
	?>
</table>
</div>
	<?php
	
		
		if ($adim3=="girisonay3")
		{
			$sil = $_REQUEST['sil'];
			$sil2=mysql_query("select * from dokuman where id='".$sil."' ");
			$sil3= mysql_fetch_array($sil2);
			$yol2=$sil3['yol'];
			echo '<img border="0" src="'.$yol2.'">';
			fopen ("$yol2" , 'r');
		}
	?>	

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