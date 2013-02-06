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

$onceki_id=mysql_fetch_array(mysql_query("SELECT max(id) FROM staj_bilgileri"));
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script> 
<script type="text/javascript">
jQuery(function($){
$("#tarih").mask("99-99-9999");
$("#tarih2").mask("99-99-9999");
});

</script>
<script type="text/javascript">

function openWin()

{

myWindow=window.open('staj_bilgileri_yer_ekle.php','','width=300,height=200,top=300, left=600');

}
function openWin2()

{

myWindow=window.open('ogrenci_sec.php','','width=600,height=400,top=600, left=1200');

//myWindow.document.write('<form action="ogrenci_sec.php?adim=girisonay" method="post">Staj Yeri Adı<input name="ad" type="text"><br>Staj Yeri Adresi<input name="adress" type="text"><br><input type="submit" value="Staj Yeri Ekle">');

}
</script>
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
	<link type="text/css" href="still.css" rel="stylesheet" />
	<script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="menu.js"></script>
</head>
<body>

<div class="bolum_adi">
	<font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
</div>
<div id="menu">
    <ul class="menu">
		<li class="last"><span><a align="right" href="staj_bilgileri.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />

<div class="staj_bilgisi_ekle ortak_div_ozellikleri">
<form action="staj_bilgisi_ekle.php?adim=girisonay" method="post">
<table align="center" border="5">
<tr>
<td align="left" width="200"><h4>Staj Yeri</h4></td>
<td align="left" width="250">
<select name="staj_yeri" width="250">
<?php
$uyeler = mysql_query("SELECT * FROM staj_yeri order by ad asc"); 
$uyebul = mysql_num_rows($uyeler);
for($sayac=0;$sayac<$uyebul;$sayac++)
{
	$ad = mysql_result($uyeler, $sayac,'ad');
	$id=mysql_result($uyeler, $sayac,'id');
?>
<option <?php if($_SESSION['staj_yeri'] == $id): ?> selected="selected" <?php endif; ?>><?php echo '<h3><font color="red">'.$ad.'</font></h3>';?></option>
<?php
}
?>
</select></td>
<td><input type="button" class="buton" style="width:55px;" value="ekle" onclick="openWin()" /></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
<!--<input name="staj_yeri" type="text">-->
</tr>
<tr>
<td align="left" width="200"><h4>Staj Türü</h4></td>
<td align="left" width="250">
<select name="staj_turu" width="250">
<?php
$uyeler = mysql_query("SELECT * FROM staj_turu"); 
$uyebul = mysql_num_rows($uyeler);
for($sayac=0;$sayac<$uyebul;$sayac++)
{
	$ad2 = mysql_result($uyeler, $sayac,'ad');
	$id=mysql_result($uyeler, $sayac,'id');
?>
<option <?php if($_SESSION['staj_turu'] == $id): ?> selected="selected" <?php endif; ?>><?php echo '<h3><font color="red">'.$ad2.'</font></h3>';?></option>
<?php
}
?>
</select></td>
<td>&nbsp;  </td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
<!--<input name="staj_turu" type="text">-->
</tr>
<tr>
<td align="left" width="200"><h4>Ögrenci No</h4></td>
<td align="left" width="250"><input name="ogrenci_no" type="text" id="ogrenci_no"  value="<?php if($_SESSION['ogrenci_no']!="") echo $_SESSION['ogrenci_no']; else echo $_SESSION['staj_ekle']; ?>"></td>

<td>
<input type="button" style="width:55px;" value="Sec"  class="buton"  onclick="openWin2()" />
</td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Başlangıç</h4></td>
<td align="left" width="250"><input name="baslangic" id="tarih" type="text"  value="<?php  echo $_SESSION['baslangic']; ?>"></td>
<td>&nbsp;  </td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Bitiş</h4></td>
<td align="left" width="250"><input name="bitis" id="tarih2" type="text" value="<?php echo $_SESSION['bitis']; ?>"></td>
<td>&nbsp;  </td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Kabul Gün</h4></td>
<td align="left" width="250"><input name="kabul_gun" type="number" value="<?php if(isset($_SESSION['kabul_gun'])) echo $_SESSION['kabul_gun'] ; ?>"></td>
<td>&nbsp;  </td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Toplam Gün</h4></td>
<td align="left" width="250"><input name="toplam_gun" type="number" value="<?php if(isset($_SESSION['toplam_gun'])) echo $_SESSION['toplam_gun']; ?>"></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Açıklama</h4></td>
<td align="left" width="250"><input name="aciklama" type="text" value="<?php if(isset($_SESSION['aciklama'])) echo $_SESSION['aciklama']; ?>"></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Durum</h4></td>
<td align="left" width="250"><input name="durum" type="text" value="<?php if(isset($_SESSION['durum'])) echo $_SESSION['durum']; ?>"></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Dönem</h4></td>
<td align="left" width="250"><input name="donem" type="text" value="<?php if(isset($_SESSION['donem'])) echo $_SESSION['donem']; ?>"></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td>&nbsp;  </td>
<td><input type="submit"  class="buton"  value="Staj Bilgilerini Ekle"></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
</table>


</form>
</div>
</body>
</html>
<?php
if($adim=="girisonay")
{
//$id   = $_POST['id'];
$staj_yeri = $_POST['staj_yeri'];
$staj_turu   = $_POST['staj_turu'];
$ogrenci_no = $_POST['ogrenci_no'];
$baslangic1   = $_POST['baslangic'];
$baslangic=$baslangic1[6].''.$baslangic1[7].''.$baslangic1[8].''.$baslangic1[9].'-'.$baslangic1[3].''.$baslangic1[4].'-'.$baslangic1[0].''.$baslangic1[1];
$bitis1 = $_POST['bitis'];
$bitis=$bitis1[6].''.$bitis1[7].''.$bitis1[8].''.$bitis1[9].'-'.$bitis1[3].''.$bitis1[4].'-'.$bitis1[0].''.$bitis1[1];
$kabul_gun   = $_POST['kabul_gun'];
$toplam_gun = $_POST['toplam_gun'];
$aciklama   = $_POST['aciklama'];
$durum = $_POST['durum'];
$donem=$_POST['donem'];
if ($baslangic=="" or $staj_yeri=="" or $staj_turu=="" or $ogrenci_no=="" or $kabul_gun=="")
{
$_SESSION['staj_yeri']=$staj_yeri;
$_SESSION['staj_turu']=$staj_turu;
$_SESSION['ogrenci_no']=$ogrenci_no;
$_SESSION['baslangic']=$baslangic1;
$_SESSION['bitis']=$bitis1;
$_SESSION['kabul_gun']=$kabul_gun;
$_SESSION['toplam_gun']=$toplam_gun;
$_SESSION['aciklama']=$aciklama;
$_SESSION['durum']=$durum;
$_SESSION['donem']=$donem;

echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=staj_bilgisi_ekle.php">';
}
else
{

$uyeler = mysql_query("SELECT * FROM ogrenci where ogrenci_no='$ogrenci_no'"); 
	$uyebul = mysql_num_rows($uyeler);
	if ($uyebul>0)
	{
		$uyeler = mysql_query("SELECT * FROM ogrenci,staj_bilgileri where (staj_bilgileri.ogrenci_no='$ogrenci_no' and (staj_bilgileri.baslangic='$baslangic' or staj_bilgileri.bitis='$bitis'))"); 
		$uyebul = mysql_num_rows($uyeler);
		if ($uyebul>0)
		{
		
$_SESSION['staj_yeri']=$staj_yeri;
$_SESSION['staj_turu']=$staj_turu;
$_SESSION['ogrenci_no']=$ogrenci_no;
$_SESSION['baslangic']=$baslangic;
$_SESSION['bitis']=$bitis;
$_SESSION['kabul_gun']=$kabul_gun;
$_SESSION['toplam_gun']=$toplam_gun;
$_SESSION['aciklama']=$aciklama;
$_SESSION['durum']=$durum;
$_SESSION['donem']=$donem;
			echo '<script type="text/javascript">alert("bu öğrenci için bu tarihlerde zaten bilgi mevcut");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=staj_bilgisi_ekle.php">';
			
		}
		else
		{
			$uyeler = mysql_query("SELECT * FROM staj_turu where ad='$staj_turu'"); 
			$uyebul =mysql_fetch_array($uyeler);
			$uyeler2 = mysql_query("SELECT * FROM staj_yeri where ad='$staj_yeri'"); 
			$uyebul2 =mysql_fetch_array($uyeler2);
			$tur_id =$uyebul['id'];
			$yer_id =$uyebul2['id'];
			
						
			$_SESSION['staj_yeri']="";
			$_SESSION['staj_turu']="";
			$_SESSION['ogrenci_no']="";
			$_SESSION['baslangic']="";
			$_SESSION['bitis']="";
			$_SESSION['kabul_gun']="";
			$_SESSION['toplam_gun']="";
			$_SESSION['aciklama']="";
			$_SESSION['durum']="";
			$_SESSION['donem']="";
			$_SESSION['staj_ekle']="";
			mysql_query("INSERT INTO staj_bilgileri VALUES ('','".$yer_id."','".$tur_id."','".$ogrenci_no."','".$baslangic."','".$bitis."','".$kabul_gun."','".$toplam_gun."','".$aciklama."','".$durum."','".$donem."')");
			echo '<script type="text/javascript">alert("Ekleme Gerçekleştirildi");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=staj_bilgileri.php">';
$_SESSION['son1']=1;		
		}
	}
	else
	{
	echo '<script type="text/javascript">alert("bu öğrenci numarasında bir öğrenci yok");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=staj_bilgisi_ekle.php">';
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
