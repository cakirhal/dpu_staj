<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim2 = @$_GET['adim2'];
$gecici=$_SESSION['dokuman_duzenle'];
$uyeler2 = mysql_query("SELECT * FROM dokuman WHERE id='$gecici'"); 
$uyebul2 = mysql_fetch_array($uyeler2);
$ad3=$uyebul2['ad'];
$yol3=$uyebul2['yol'];
$ogrenci_id3=$uyebul2['kullanici_id'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
$giris_adi=$_SESSION['ogr_no'];
$yeniad=@$_POST['ad'];
			@$ogrenci_no=@$_POST['ogrenci_no'];
?>
<?php
if (!empty($_GET["upload"])) {
	$dyol =$_FILES["userfile"]["tmp_name"];
	$disim =$_FILES["userfile"]["name"];
	$dtype =$_FILES["userfile"]["type"];
		$dizin = '/home/staj/public_html/d/';
		if($dyol=="")
		{
			$yeniad=$_POST['ad'];
			mysql_query("UPDATE dokuman set ad='".$yeniad."',yol='".$dkaydet."',kullanici_id='".$ogrenci_no."' where id='".$gecici."' ");
		
			echo '<script type="text/javascript">alert("düzenleme Gerçekleştirildi");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=dokumanlar.php">';
		}
		else
		{
			if ($dtype=="application/octet-stream")
		{
		print "exe uzantılı dosya ekleyemezsin";	
		}
		else
		{	$ad=$_POST['ad'];
			$duzanti=substr($disim,-4);
			$rasgelead=substr(md5(uniqid(rand())),0,3);
			$dyeniad=$rasgelead.$duzanti;
			$dkaydet='d/'.$dyeniad;
			$yuklenecek_dosya = $dizin . basename($dyeniad);
			$dyukle=move_uploaded_file($_FILES["userfile"]["tmp_name"], $yuklenecek_dosya);
			print "<pre>";	
			if ($dyukle) 
			{						
				echo "Güncelleme gerçekleşti";								
			} 	
			else 
			{			
				print "Dosya güncellenemedi. Tekrar deneyiniz";			
			}
			print "</pre>";
			$sil2=mysql_query("select * from dokuman where id='".$gecici."' ");
			$sil3= mysql_fetch_array($sil2);
			$yol2=$sil3['yol'];
			unlink($yol2);
			
			mysql_query("UPDATE dokuman set ad='".$yeniad."',yol='".$dkaydet."',kullanici_id='".$ogrenci_no."' where id='".$gecici."' ");
		echo '<script type="text/javascript">alert("düzenleme Gerçekleştirildi");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=dokumanlar.php">';
		}	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
	<link type="text/css" href="still.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>
	
	<script type="text/javascript">


function openWin2()

{

myWindow=window.open('upload_ogrenci_sec.php','','width=600,height=400,top=600, left=1200');

}
</script>
</head>

<body>
<div class="bolum_adi">
	<font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
</div>

<div id="menu">
    <ul class="menu">
		<li class="last"><span><a align="right" href="dokumanlar.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<div class="dokuman_duzenle ortak_div_ozellikleri">
<table align="center">
	<tr><form enctype="multipart/form-data" action="dokuman_duzenle.php?upload=1" method="post"> <input type="hidden" name="MAX_FILE_SIZE" />
	<td align="left" width="200"><h4>Döküman Adı</h4></td>
	<td align="left" width="250"><input name="ad" type="text" value="<?php echo ''.$ad3.'';?>"></td>
</tr>


<td align="left" width="200"><h4>Dosya Seçiniz</h4></td>
<td>	
	<input name="userfile" class="buton" type="file" />

</td>

</tr>
<tr><td align="left" width="200"><h4>Kullanıcı id (0 girilirse herkes tarafından görülür.)</h4></td>
<td align="left" width="250">
<input type="button" class="buton"  style="float:left;" value="Sec" onclick="openWin2()" /><input name="ogrenci_no" type="text" value="<?php echo ''.$ogrenci_id3.'';?>">
</td><td>


<input class="buton" style="float:left;" type="submit" value="Yükle" />
</td>
</tr>

</form>

</table>
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