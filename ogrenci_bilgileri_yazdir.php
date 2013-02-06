<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$arama=$_SESSION['arama'];
$ne_arama=$_SESSION['ne_arama'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=@$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="refresh" content="1; url=ogrenci_bilgileri.php">
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
	<td align="center" width="250"><h2><font color="black">Öğrenci No</font></h2></td>
	<td align="center" width="250"><h2><font color="black">TC No</font></h2></td>
	<td align="center" width="350"><h2><font color="black">Ad Soyad</font></h2></td>
	<td align="center" width="350"><h2><font color="black">Cep Telefonu</font></h2></td>
	<td align="center" width="350"><h2><font color="black">E posta</font></h2></td>
	</tr>

	<?php
	if ($_SESSION['listele1'] == 0)
	{
		if ( $arama=="tc_no")
		{
		echo '<font align=\"center\"><H2 align=\"center\">'.$ne_arama.' Tc Kimlik Numaralı Öğrenci</H2></font>';
		$uyeler = mysql_query("SELECT * FROM ogrenci where tc_no like '%$ne_arama%'"); 
		$uyebul = mysql_num_rows($uyeler);
		}
		else if ( $arama=="ogrenci_numarasi")
		{
		echo '<font align=\"center\"><H2 align=\"center\">'.$ne_arama.' Öğrenci Numaralı Öğrenci</H2></font>';
		$uyeler = mysql_query("SELECT * FROM ogrenci where ogrenci_no like '%$ne_arama%'"); 
		$uyebul = mysql_num_rows($uyeler);
		}
		else if ( $arama=="ad_soyad")
		{
		echo '<font align=\"center\"><H2 align=\"center\">Adı Soyadında '.$ne_arama.' Bulunan Öğrenciler</H2></font>';
		$uyeler = mysql_query("SELECT * FROM ogrenci where ad_soyad like '%$ne_arama%'"); 
		$uyebul = mysql_num_rows($uyeler);
		}
	}
	else if($_SESSION['listele1'] == 1)
	{
		echo '<font align=\"center\"><H2 align=\"center\">Tüm Öğrencilerin Listesi</H2></font>';
		$uyeler = mysql_query("SELECT * FROM ogrenci"); 
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
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$ogrenci_no.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$tc_no.'</font></h3>';?></td>
	<td align="center" width="250"><?php echo '<h3><font color="red">'.$ad_soyad.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$cep_telefonu.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$e_posta.'</font></h3>';?></td>
	</tr>
	<?php	
		}
	?>
</table>

<?php

}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>
	
</body>
</html>