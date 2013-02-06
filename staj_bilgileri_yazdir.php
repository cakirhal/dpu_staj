<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{ 
require_once("vtbaglan.php");
$arama=$_SESSION['arama'];
$ne_arama=$_SESSION['ne_arama'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="refresh" content="1; url=staj_bilgileri.php">
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
	<td align="center" width="250"><h4><font size="2" color="black">Öğrenci No</font></h4></td>
	<td align="center" width="250"><h4><font size="2" color="black">Öğrenci Adı</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Staj Yeri</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Staj Türü</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Başlangıç</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Bitiş</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Kabul Gün</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Toplam Gün</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Açıklama</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Durum</font></h4></td>
	<td align="center" width="350"><h4><font size="2" color="black">Dönem</font></h4></td>
	</tr>

	<?php
	if ($_SESSION['listele'] == 0)
	{
		
		if ($arama=="ad_soyad")
		{
								echo '<font align=\"center\"><H2 align=\"center\">Adı ve Soyadı nda '.$ne_arama.' Bulunan Öğrenciler</H2></font>';
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE ogrenci.ad_soyad like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="ogrenci_numarasi")
		{
								echo '<font align=\"center\"><H2 align=\"center\">Öğrenci Numarası nda '.$ne_arama.' Bulunan Öğrenciler</H2></font>';
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE ogrenci.ogrenci_no like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="staj_yeri")
		{
								echo '<font align=\"center\"><H2 align=\"center\">'.$ne_arama.' Adlı Staj Yerinde Staj Yapan Öğrenciler</H2></font>';
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE staj_yeri.ad like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="staj_turu")
		{
								echo '<font align=\"center\"><H2 align=\"center\">'.$ne_arama.' Staj Türünde Staj Yapan Öğrenciler</H2></font>';
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE staj_turu.ad like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="donem")
		{
								echo '<font align=\"center\"><H2 align=\"center\">'.$ne_arama.' Döneminde Staj Yapan Öğrenciler</H2></font>';
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE staj_bilgileri.donem like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
	}
	else if ($_SESSION['listele'] == 1)
	{
		echo '<font align=\"center\"><H2 align=\"center\">Tüm Stajların Listesi</H2></font>';
		$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id)");
		$uyebul = mysql_num_rows($uyeler);
	}
	
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id = mysql_result($uyeler, $sayac,'staj_bilgileri.id');
		$staj_yeri =  mysql_result($uyeler, $sayac,'staj_yeri.ad');
		$staj_turu   =  mysql_result($uyeler, $sayac,'staj_turu.ad');
		$ogrenci_no = mysql_result($uyeler, $sayac,'staj_bilgileri.ogrenci_no');
		$ogrenci_ad = mysql_result($uyeler, $sayac,'ogrenci.ad_soyad');
		$baslangic   =  mysql_result($uyeler, $sayac,'staj_bilgileri.baslangic');
		$bitis =  mysql_result($uyeler, $sayac,'staj_bilgileri.bitis');
		$kabul_gun   =  mysql_result($uyeler, $sayac,'staj_bilgileri.kabul_gun');
		$toplam_gun = mysql_result($uyeler, $sayac,'staj_bilgileri.toplam_gun');
		$aciklama   =  mysql_result($uyeler, $sayac,'staj_bilgileri.aciklama');
		$durum =  mysql_result($uyeler, $sayac,'staj_bilgileri.durum');
		$donem= mysql_result($uyeler, $sayac,'staj_bilgileri.donem');
	?>
	<tr>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$ogrenci_no.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$ogrenci_ad.'</font></h5>';?></td>
	<td align="center" width="250"><?php echo '<h5><font color="red">'.$staj_yeri.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$staj_turu.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$baslangic.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$bitis.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$kabul_gun.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$toplam_gun.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$aciklama.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$durum.'</font></h5>';?></td>
	<td align="center" width="350"><?php echo '<h5><font color="red">'.$donem.'</font></h5>';?></td>
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