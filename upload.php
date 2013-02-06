<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim2 = @$_GET['adim2'];
$giris_adi=$_SESSION['ogr_no'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
if (!empty($_GET["upload"])) {
	$disim =$_FILES["userfile"]["name"];
	$dtype =$_FILES["userfile"]["type"];
		$dizin = '/home/staj/public_html/d/';
	//	echo ''.$dtype.'';
		if ($dtype=="application/octet-stream")
		{
		echo '<script type="text/javascript">alert("exe uzantılı dosya ekleyemezsin");</script>';	
		}
		else
		{	$ad=$_POST['ad'];
			$ogrenci_no=$_POST['ogrenci_no'];
		if ($ad!="")
		{
			$duzanti=substr($disim,-4);
			$rasgelead=substr(md5(uniqid(rand())),0,3);
			$dyeniad=$rasgelead.$duzanti;
			$dkaydet="d/".$dyeniad;
			$yuklenecek_dosya = $dizin . basename($dyeniad);
			$dyukle=move_uploaded_file($_FILES["userfile"]["tmp_name"], $dkaydet);
		}		
		else
		{echo '<script type="text/javascript">alert("dosya adı girin");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=upload.php">';
}
		print "<pre>";	
			if ($dyukle) 
			{		
			
			mysql_query("INSERT INTO dokuman VALUES ('','".$ad."','".$dkaydet."','".$ogrenci_no."') ");
			echo '<script type="text/javascript">alert("Ekleme Gerçekleştirildi");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=dokumanlar.php">';							
			} 	
			else 
			{		
				echo '<script type="text/javascript">alert("Dosya yüklenemedi. Tekrar deneyiniz");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=upload.php">';
			}
			print "</pre>";
			
			//$yol=;
			//mysql_query("delete from dokuman");
			
		}	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<script type="text/javascript">


function openWin2()

{

myWindow=window.open('upload_ogrenci_sec.php','','width=600,height=400,top=600, left=1200');

}
</script>

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
		<li class="last"><span><a align="right" href="dokumanlar.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
<div class="upload ortak_div_ozellikleri">
<table align="center">
<tr><form enctype="multipart/form-data" action="upload.php?upload=1" method="post"> <input type="hidden" name="MAX_FILE_SIZE" />
<td align="left" width="200"><h4>Döküman Adı</h4></td>
<td align="left" width="250"><input name="ad" type="text"></td>
</tr>

<tr>
<td align="left" width="200"><h4>Dosyayı Seçiniz</h4></td>
<td>	<input name="userfile" class="buton" style="float:left;" type="file"/>
	</td>

</tr>
<tr><td align="left" width="200"><h4>Kullanıcı id (0 girilirse herkes tarafından görülür.)</h4></td>
<td align="left" width="100">
<input type="button" value="Sec" class="buton" style="float:left;" onclick="openWin2()" />
<input name="ogrenci_no" type="text"></td>

<td align="left" width="100">

<input class="buton" style="float:left;" type="submit" value="Yükle" />
</td>
</tr></form>
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