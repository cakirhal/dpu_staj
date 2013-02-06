<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
//Oturumumuzu başlatıyoruz
//echo'personel sayfasına hoşgeldiniz';

//Veritabanı bağlantı dosyamızı çekiyoruz
require_once("vtbaglan.php");
$giris_adi=$_SESSION['pers_no'];
$_SESSION['son1']=0;
 $bilgi=mysql_fetch_row(mysql_query("SELECT * FROM personel WHERE kullanici_adi='$giris_adi'"));
 $uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
// Undefined index hatası vermesin diye değeri
// kontrol etmemiz gerekiyor
if (!isset($_GET['adim']))
{
//If not isset -> set with dumy value
$_GET['adim'] = "";
} 

$adim = $_GET['adim'];
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
		<li class="last"><span><a align="right" href="staj_bilgileri.php">    STAJ BİLGİLERİ     </a></span></li>
		<li class="last"><span><a align="right" href="ogrenci_bilgileri.php">   ÖGRENCİ BİLGİLERİ</a></span></li>
		<li class="last"><span><a align="right" href="kullanicilar.php">    KULLANICILAR    </a></span></li>
        <li class="last"><span><a class="parent" href="staj_yerleri.php">  STAJ YERLERİ   </a></span></li>
		<li class="last"><span><a align="right" href="staj_turleri.php">   STAJ TÜRLERİ      </a></span></li>
		<li class="last"><span><a align="right" href="toplam_staj_gunu.php"> TOPLAM STAJ GÜNÜ     </a></span></li>
		<li class="last"><span><a align="right" href="dokumanlar.php">  DÖKÜMANLAR    </a></span></li>
		<li class="last"><span><a align="right" href="mezunlar.php">  MEZUNLAR     </a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">   OTURUMU KAPAT    </a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />

<h2 align="center">SAYIN <font color="red"><?PHP ECHO $bilgi[1];?></font> HOŞGELDİNİZ.</h2>

<div class="mezun_olabilir ortak_div_ozellikleri">
<table align="center" border="1">
<tr class="baslik">
<td width="350" color="black"><h3>Öğrenci No</h3></td>
<td width="350"><h3>Adı Soyadı</h3></td>
<td width="150"><h3>mezun durumu</h3></td>
</tr>
<?php
$uyl=mysql_query("Select * from ogrenci order by ogrenci.ogrenci_no");
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

	$kabul2=0;
	$uyeler3 = mysql_query("SELECT * FROM staj_bilgileri WHERE ogrenci_no='$no' && staj_turu='$tur2'");
	$uyebul3= mysql_num_rows($uyeler3);
	for($sayac1=0;$sayac1<$uyebul3;$sayac1++)
	{
		$kabul2=$kabul2 + mysql_result($uyeler3, $sayac1,'kabul_gun');
	}
	

?>

<?php
	$topla=$topla+$kabul;
	
		for($sayac2=0;$sayac2<$uyebul2;$sayac2++)
		{
			if($dizi[$sayac2][0]==$tur2 and $kabul2>=$dizi[$sayac2][1])
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
		if($kont==false and $bilgi[6]!='1')
		{
		
		?>
		<tr>
<td width="350"><?php echo '<h3><font>'.$giris_adi.'</font></h3>';?></td>
<td width="350"><?php echo '<h3><font>'.$ad_soyad2.'</font></h3>';?></td>
<form action="personel.php?adim=<?php echo ''.$giris_adi.'';?>" method="post">
	<td width="50"><input type="submit" class="buton mezun_buton" name="mezun_oldu" value="mezun et"> </td>
	</form>
</tr>

		
		<?php
		}
		
	
	}

}
?>
</table>

</div>

	<?php
	

	if ($adim!="")
		{
		/*$onay = $_POST["onayk"];
				 if($onay){
						mysql_query("UPDATE ogrenci set mezundur='1' where ogrenci_no='".$sil."' ");
						echo '<script type="text/javascript">alert("Bu öğrenci artık, sistemde mezun oldu gözükecektir");</script>';
						echo '<meta http-equiv="refresh" content="0;URL=personel.php">';
				}else echo '<script type="text/javascript">alert("onay kutusunu seçin!!!");</script>';
*/
	$sil = $_GET['adim'];
	$_SESSION['mezun1']=$sil;
				 echo '<script type="text/javascript">
				 if (confirm("Mezun işlemini onaylıyor musunuz?"))
				 {
				$(document).ready(function() {
				var data=1;
				$.ajax({
					type: "POST",
					url: "mezun1.php",
					data: "tmp="+data,
					success: function(sonuc) {
						$("p").html(sonuc);
					}			
				});


}); 
				 
				 //alert("silinecek!!!");
				}
				else				
				alert("Kayıt silinmedi!!!");
				 
				 </script><p></p>';
echo '<meta http-equiv="refresh" content="0;URL=personel.php">';
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