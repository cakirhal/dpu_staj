<?php
session_start();
require_once("vtbaglan.php");
$adim = $_GET['adim'];
$adim2 = $_GET['adim2'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
	?>
	<html>
	<body>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link type="text/css" href="still.css" rel="stylesheet" />
	</head>
	<h6 align="right"><a align="right" href="staj_bilgileri.php">geri</a></h6>
	<h6 align="right">çıkış yapmak için<a align="right" href="cikis.php">tıklayın.</a></h6>
	<form action="staj_bilgisi_duzenle.php?adim=girisonay" method="post">
	<table border="1">
	<tr>
	<td align="center" width="250"><h4><font color="black">Bilgilerini Düzenlemek istediğiniz öğrencinin numarasını giriniz.</font></h4></td>
	<td align="center" width="350"><h2><input name="ara" type="text" class="hide"><input type="submit" value="ara"></h2></td>
	</tr>
	</table>
	</form>
	<?php
	switch($adim){
case "":
	break;
	case "girisonay":
	$ara=$_POST['ara'];
	if ($ara=="")
	 echo 'boş değer girdiniz';
	 else{
	?>
	<table border="1">
	<tr>
	<td align="center" width="250"><h2><font color="black">Öğrenci No</font></h2></td>
	<td align="center" width="350"><h2><font color="black">staj yeri</font></h2></td>
	<td align="center" width="350"><h2><font color="black">staj turu</font></h2></td>
	<td align="center" width="350"><h2><font color="black">başlangıç</font></h2></td>
	<td align="center" width="350"><h2><font color="black">bitiş</font></h2></td>
	<td align="center" width="350"><h2><font color="black">kabul gün</font></h2></td>
	<td align="center" width="350"><h2><font color="black">toplam gün</font></h2></td>
	<td align="center" width="350"><h2><font color="black">açıklama</font></h2></td>
	<td align="center" width="350"><h2><font color="black">durum</font></h2></td>
	<td align="center" width="350"><h2><font color="black">dönem</font></h2></td>
	<td align="center" width="50">Güncelle</td>
	<td align="center" width="50">Sil</td>
	</tr>
<form action="staj_bilgisi_duzenle.php?adim2=girisonay2" method="post">
	<?php
	$uyeler = mysql_query("SELECT * FROM staj_bilgileri where ogrenci_no='$ara'"); 
	//staj_bilgileri,ogrenci,staj_yeri,staj_turu");
	$uyebul = mysql_num_rows($uyeler);
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id = mysql_result($uyeler, $sayac,'id');
		$staj_yeri =  mysql_result($uyeler, $sayac,'staj_yeri');
		$staj_turu   =  mysql_result($uyeler, $sayac,'staj_turu');
		$ogrenci_no = mysql_result($uyeler, $sayac,'ogrenci_no');
		$baslangic   =  mysql_result($uyeler, $sayac,'baslangic');
		$bitis =  mysql_result($uyeler, $sayac,'bitis');
		$kabul_gun   =  mysql_result($uyeler, $sayac,'kabul_gun');
		$toplam_gun = mysql_result($uyeler, $sayac,'toplam_gun');
		$aciklama   =  mysql_result($uyeler, $sayac,'aciklama');
		$durum =  mysql_result($uyeler, $sayac,'durum');
		$donem= mysql_result($uyeler, $sayac,'donem');
	?>
	<tr>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$ogrenci_no.'</font></h3>';?></td>
	<td align="center" width="250"><?php echo '<h3><font color="red">'.$staj_yeri.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$staj_turu.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$baslangic.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$bitis.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$kabul_gun.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$toplam_gun.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$aciklama.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$durum.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$donem.'</font></h3>';?></td>
	<td align="center" width="50"><input type="submit" name="düzenle" value="<?php echo ''.$id.'';?>"> </td>
	</tr>
	<?php	
		}
	?>

	
	
	
	</table>
</form>
<?php
}
break;
}
?>
	<?php
	
		if ($adim2=="girisonay2")
		{
	$_SESSION['yeni'] = $_REQUEST['düzenle'];
	 
	echo '<meta http-equiv="refresh" content="0;URL=staj_bilgisi_duzenle2.php">';
	 }
	?>	
	</body>
</html>


