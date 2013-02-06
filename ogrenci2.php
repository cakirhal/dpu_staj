<?php 
session_start();
if($_SESSION['rutbe'] ==5)
{
require_once("vtbaglan.php");
$giris_adi=$_SESSION['ogr_no'];

 $bilgi=mysql_fetch_row(mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$giris_adi'"));
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
	<li class="last"><span><a align="right" href="profil.php">&nbsp;    PROFİLİ GÜNCELLE     &nbsp;</a></span></li>
	<li class="last"><span><a align="right" href="dokumanlarim.php">&nbsp;    DÖKÜMANLARIM     &nbsp;</a></span></li>
		<li class="last"><span><a href="whatever.htm" onClick="window.print();return false">&nbsp;    YAZDIR     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<div class="ogrenci2_bilgi ortak_div_ozellikleri">
<table>
<tr>
<td align="left" width="150" height="30px" style="color:black; font-weight:900;">Öğrenci Numarasi</td>
<td width="800" style="color:#9C0B0B; font-weight:900;"><?php echo $bilgi[0];?></td>
</tr><tr>
<td align="left" height="30px" style="color:black; font-weight:900;">TC Kimlik No</td>
<td style="color:#9C0B0B; font-weight:900;"><?php echo $bilgi[1];?></td>
</tr>
<tr>
<td align="left" height="30px" style="color:black; font-weight:900;">Adi Soyadi</td>
<td style="color:#9C0B0B; font-weight:900;"><?php echo $bilgi[2];?></td>
</tr><tr>
<td align="left" height="30px" style="color:black; font-weight:900;">Telefon Numarasi</td>
<td style="color:#9C0B0B; font-weight:900;"><?php echo $bilgi[3];?></td>
</tr>

<tr>
<td align="left" height="30px" style="color:black; font-weight:900;">Mail adresi</td>
<td style="color:#9C0B0B; font-weight:900;"><?php echo $bilgi[4];?></td>
</tr>

</table>
</div>
<div class="ogrenci2_staj ortak_div_ozellikleri">
<table border="1">
<tr>
<td width="350"><h3>Öğrenci No</h3></td>
<td width="350"><h3>Staj Yeri</h3></td>
<td width="350"><h3>Staj Türü</h3></td>
<td width="350"><h3>Başlangıç</h3></td>
<td width="350"><h3>Bitiş</h3></td>
<td width="350"><h3>Kabul Gün</h3></td>
<td width="350"><h3>Toplam Gün</h3></td>
<td width="350"><h3>Açıklama</h3></td>
<td width="350"><h3>Dönem</h3></td>
</tr>
<?php
$uyeler = mysql_query("SELECT staj_bilgileri.staj_turu,staj_bilgileri.ogrenci_no,staj_yeri.ad,staj_turu.ad,staj_bilgileri.baslangic,staj_bilgileri.bitis,staj_bilgileri.kabul_gun,
staj_bilgileri.toplam_gun,staj_bilgileri.aciklama,staj_bilgileri.donem FROM (staj_bilgileri inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id WHERE ogrenci_no='$giris_adi'"); //Veritabanındaki uyeler tablosundaki verilerimizi metin kutusu verileri ile eşleştiriyoruz
$uyebul = mysql_num_rows($uyeler);
//$topla=0;
$durum="mezun olamaz";
$uyeler2 = mysql_query("SELECT * FROM staj_turu WHERE en_az>0"); //Veritabanındaki uyeler tablosundaki verilerimizi metin kutusu verileri ile eşleştiriyoruz
$uyebul2= mysql_num_rows($uyeler2);
$say=0;
for($sayac2=0;$sayac2<$uyebul2;$sayac2++)
{
	$id2 = mysql_result($uyeler2, $sayac2,'id');
	$en_az = mysql_result($uyeler2, $sayac2,'en_az');
	$dizi[$sayac2][0]=$id2;
	$dizi[$sayac2][1]=$en_az;
	$dizi[$sayac2][2]=0;
}
for($sayac=0;$sayac<$uyebul;$sayac++)
{
	$no = mysql_result($uyeler, $sayac,'ogrenci_no');
	$yer = mysql_result($uyeler, $sayac,'staj_yeri.ad');
	$tur = mysql_result($uyeler, $sayac,'staj_turu.ad');
	$tur2 = mysql_result($uyeler, $sayac,'staj_turu');
	$basla = mysql_result($uyeler, $sayac,'baslangic');
	$bitis = mysql_result($uyeler, $sayac,'bitis');
	$kabul = mysql_result($uyeler, $sayac,'kabul_gun');
	$toplam = mysql_result($uyeler, $sayac,'toplam_gun');
	$acikla = mysql_result($uyeler, $sayac,'aciklama');
	$donem = mysql_result($uyeler, $sayac,'donem');

?>
<tr>
<td width="350"><?php echo '<h3><font>'.$no.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$yer.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$tur.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$basla.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$bitis.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$kabul.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$toplam.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$acikla.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$donem.'</font></h3>';?></td>
</tr>

<?php
	if(!isset($topla))
		$topla = 0;
		
	$topla=$topla+$kabul;
	
		for($sayac2=0;$sayac2<$uyebul2;$sayac2++)
		{
			if($dizi[$sayac2][0]==$tur2 and $kabul>=$dizi[$sayac2][1])
			{
				$dizi[$sayac2][2]=1;
			}
		}

		$uyeler3 = mysql_query("SELECT * FROM toplam_staj"); 
$uyebul3 = mysql_fetch_array($uyeler3);
$staj_toplam = $uyebul3['staj_toplam'];
	if($topla>=$staj_toplam)
	{
	$kont=false;
	for($sayac2=0;$sayac2<$uyebul2;$sayac2++)
		{
		if($dizi[$sayac2][2]==0)
			{
				$kont=true;
			}
		}
		if($kont==false)
			$durum="Mezun Olabilir";
		else
			$durum="Mezun Olamaz";
	}
	else
		$durum="Mezun Olamaz";
}
?>
</table>

<div class="daha" style="font-weight:900; font-size:14px; margin-bottom:0px;"><?php echo 'DURUM :'.$durum;?></div>
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