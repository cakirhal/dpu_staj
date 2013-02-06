<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
 @$bilgi=@mysql_fetch_row(mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$giris_adi'"));
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
$adim8 = @$_GET['adim8'];
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
	<li class="last"><span><a align="right" href="personel.php">&nbsp;    GERİ    &nbsp;</a></span></li>
		<li class="last"><span><a href="whatever.htm" onClick="window.print();return false">&nbsp;    YAZDIR     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<div class="mezunlar ortak_div_ozellikleri">
<table align="center"  border="1">
<tr>
<td align="center" width="350"><h3>Öğrenci No</h3></td>
<td align="center" width="350"><h3>Adı Soyadı</h3></td>
<td align="center" width="350"><h3>Mezun Değil</h3></td>
<td align="center" width="350"><h3>Stajlar</h3></td>
<td align="center" width="350"><h3>Mezuniyet Belgesini Çıkart</h3></td>
</tr>
<?php
$uyl=mysql_query("Select * from ogrenci");
$uyb = mysql_num_rows($uyl);
for($sayac5=0;$sayac5<$uyb;$sayac5++)
{

$giris_adi = mysql_result($uyl, $sayac5,'ogrenci_no');
$ad_soyad2 = mysql_result($uyl, $sayac5,'ad_soyad');


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
	$topla=0;
	$say=0;
	$kont=true;
}
for($sayac=0;$sayac<$uyebul;$sayac++)
{
	$no = mysql_result($uyeler, $sayac,'ogrenci_no');
	 $bilgi=mysql_fetch_row(mysql_query("SELECT * FROM ogrenci WHERE ogrenci_no='$no'"));
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

<?php
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
		}}
		if($kont==false and $bilgi[6]=='1')
		{
		
		?>
		<tr>
<td align="center" width="350"><?php echo '<h3><font color="red">'.$giris_adi.'</font></h3>';?></td>
<td align="center" width="350"><?php echo '<h3><font color="red">'.$ad_soyad2.'</font></h3>';?></td>
<form action="staj_bilgileri.php?adim7=<?php echo ''.$giris_adi.'';?>" method="post">
	<td align="center" width="50"><input type="submit" name="stajlara_bak"  class="buton"  value="stajlara bak"> </td>
	</form>
	<form action="mezunlar.php?adim8=<?php echo ''.$giris_adi.'';?>" method="post">
	<td align="center" width="50"><input type="submit" name="mezun_degil"  class="buton"  value="mezun degil"> </td>
	</form>
	<form action="mezuniyet_belgesi_yazdir.php?no=<?php echo ''.$giris_adi.''; ?>&ad=<?php echo ''.$ad_soyad2.''; ?>" method="post">
	<td align="center" width="50">
	<input type="submit" name="mezuniyet_belgesi_cikart" class="buton" value="mezuniyet belgesi cikart"></td>
	</form>
</tr>

		
		<?php
		}
		
	
	}

}
?>
</table>
</div>
</body>
</html>
<?php
 if ($adim8!="")
		{
	mysql_query("UPDATE ogrenci set mezundur='0' where ogrenci_no='".$adim8."' ");
						echo '<script type="text/javascript">alert("Bu ogrenci artik, sistemde mezun oldu gozukmeyecektir");</script>';
						echo '<meta http-equiv="refresh" content="0;URL=mezunlar.php">';
			
	 }
}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>