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
$gecici=$_SESSION['staj_duzenle'];
$uyeler2 = mysql_query("SELECT * FROM staj_bilgileri WHERE id='$gecici'"); 
$uyebul2 = mysql_fetch_array($uyeler2);
$staj_yeri = $uyebul2['staj_yeri'];
$staj_turu   = $uyebul2['staj_turu'];
$ogrenci_no = $uyebul2['ogrenci_no'];
$baslangic   = $uyebul2['baslangic'];
$bitis = $uyebul2['bitis'];
$kabul_gun   = $uyebul2['kabul_gun'];
$toplam_gun = $uyebul2['toplam_gun'];
$aciklama   = $uyebul2['aciklama'];
$durum = $uyebul2['durum'];
$donem=$uyebul2['donem'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script src="jquery.js" type="text/javascript"></script> <script src="jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($){
$("#tarih").mask("9999-99-99");
$("#tarih2").mask("9999-99-99");
});

</script>

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

<div class="staj_bilgisi_duzenle ortak_div_ozellikleri">
<form action="staj_bilgisi_duzenle.php?adim=girisonay" method="post">
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
<option <?php if($staj_yeri == $id): ?> selected="selected" <?php endif; ?>><?php echo '<h3><font color="red">'.$ad.'</font></h3>';?></option>
<?php
}
?>
</select>
</td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Staj Türü</h4></td>
<td align="left" width="250">
<select name="staj_turu" width="250" value="<?php echo ''.$ad.''; ?>">
<?php
$uyeler = mysql_query("SELECT * FROM staj_turu order by ad"); 
$uyebul = mysql_num_rows($uyeler);
for($sayac=0;$sayac<$uyebul;$sayac++)
{
	$ad2 = mysql_result($uyeler, $sayac,'ad');
	$id=mysql_result($uyeler, $sayac,'id');
?>
<option <?php if($staj_turu == $id): ?> selected="selected" <?php endif; ?>><?php echo '<h3><font color="red">'.$ad2.'</font></h3>';?></option>
<?php
}
?>
</select>
</td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Öğrenci No</h4></td>
<td align="left" width="250"><input name="ogrenci_no" type="text" value="<?php echo ''.$ogrenci_no.''; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Başlangıç</h4></td>
<td align="left" width="250"><input name="baslangic" id="tarih" type="text" value="<?php echo ''.$baslangic.''; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Bitiş</h4></td>
<td align="left" width="250"><input name="bitis" id="tarih2" type="text" value="<?php echo ''.$bitis.''; ?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>Kabul Gün</h4></td>
<td align="left" width="250"><input name="kabul_gun" type="number" value="<?php echo ''.$kabul_gun.''; ?>"></td>
<td><h5><font color="red">*Bos Birakilamaz</font></h5></td>

</tr>
<tr>
<td align="left" width="200"><h4>Toplam Gün</h4></td>
<td align="left" width="250"><input name="toplam_gun" type="number" value="<?php echo ''.$toplam_gun.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Açıklama</h4></td>
<td align="left" width="250"><input name="aciklama" type="text" value="<?php echo ''.$aciklama.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Durum</h4></td>
<td align="left" width="250"><input name="durum" type="text" value="<?php echo ''.$durum.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td align="left" width="200"><h4>Dönem</h4></td>
<td align="left" width="250"><input name="donem" type="text" value="<?php echo ''.$donem.''; ?>"></td>
<td>&nbsp;  </td>
</tr>
<tr>
<td>&nbsp;  </td>
<td><input type="submit" class="buton" value="Staj Bilgilerini Güncelle"></td>
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
$staj_yeri = $_POST['staj_yeri'];
$staj_turu   = $_POST['staj_turu'];
$ogrenci_no = $_POST['ogrenci_no'];
$baslangic   = $_POST['baslangic'];
$bitis = $_POST['bitis'];
$kabul_gun   = $_POST['kabul_gun'];
$toplam_gun = $_POST['toplam_gun'];
$aciklama   = $_POST['aciklama'];
$durum = $_POST['durum'];
$donem=$_POST['donem'];
if ($baslangic=="" or $staj_yeri=="" or $staj_turu=="" or $ogrenci_no=="" or $kabul_gun=="")
{
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
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
mysql_query("UPDATE staj_bilgileri set staj_yeri='".$yer_id."',staj_turu='".$tur_id."',ogrenci_no='".$ogrenci_no."',baslangic='".$baslangic."',bitis='".$bitis."',kabul_gun='".$kabul_gun."',toplam_gun='".$toplam_gun."',aciklama='".$aciklama."',durum='".$durum."',donem='".$donem."' 
where id='".$gecici."' ");
	   echo '<script type="text/javascript">alert("Güncellemeler Gerçekleştirildi");</script>';
echo '<meta http-equiv="refresh" content="0;URL=staj_bilgileri.php">';
}
}
}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>
