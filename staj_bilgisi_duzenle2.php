<?php
session_start();
require_once("vtbaglan.php");
$adim = $_GET['adim'];
$gecici=$_SESSION['yeni'];
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
switch($adim){
case "":
if($_SESSION['rutbe'] == 2){
?>
<html>
<body>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link type="text/css" href="still.css" rel="stylesheet" />
</head>
<form action="staj_bilgisi_duzenle2.php?adim=girisonay" method="post">
<h6 align="right"><a align="right" href="staj_bilgileri.php">geri</a></h6>
<h6 align="right">çıkış yapmak için<a align="right" href="cikis.php">tıklayın.</a></h6>
<table align="center" border="5">
<tr>
<td align="left" width="200"><h4>Staj Yeri</h4></td>
<td align="left" width="250">
<select name="staj_yeri" width="250">
<?php
$uyeler = mysql_query("SELECT * FROM staj_yeri"); 
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
</tr>
<tr>
<td align="left" width="200"><h4>Staj Türü</h4></td>
<td align="left" width="250">
<select name="staj_turu" width="250" value="<?php echo ''.$ad.''; ?>">
<?php
$uyeler = mysql_query("SELECT * FROM staj_turu"); 
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
</tr>
<tr>
<td align="left" width="200"><h4>Öğrenci No</h4></td>
<td align="left" width="250"><input name="ogrenci_no" type="number" value="<?php echo ''.$ogrenci_no.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Başlangıç</h4></td>
<td align="left" width="250"><input name="baslangic" type="date" value="<?php echo ''.$baslangic.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Bitiş</h4></td>
<td align="left" width="250"><input name="bitis" type="date" value="<?php echo ''.$bitis.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Kabul Gün</h4></td>
<td align="left" width="250"><input name="kabul_gun" type="number" value="<?php echo ''.$kabul_gun.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Toplam Gün</h4></td>
<td align="left" width="250"><input name="toplam_gun" type="number" value="<?php echo ''.$toplam_gun.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Açıklama</h4></td>
<td align="left" width="250"><input name="aciklama" type="text" value="<?php echo ''.$aciklama.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Durum</h4></td>
<td align="left" width="250"><input name="durum" type="text" value="<?php echo ''.$durum.''; ?>"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Dönem</h4></td>
<td align="left" width="250"><input name="donem" type="text" value="<?php echo ''.$donem.''; ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Staj Bilgilerini güncelle"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}
break;
case "girisonay":
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
if ($baslangic=="" or $staj_yeri=="" or $staj_turu=="" or $ogrenci_no=="")
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
break;
}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>
