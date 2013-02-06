<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
if (!isset($_GET['adim']))
{

$_GET['adim'] = "";
} 
$adim = $_GET['adim'];

if (!isset($_GET['adim2']))
{

$_GET['adim2'] = "";
} 
$adim2 = $_GET['adim2'];

if (!isset($_GET['adim3']))
{

$_GET['adim3'] = "";
} 
$adim3 = $_GET['adim3'];

if (!isset($_GET['adim4']))
{

$_GET['adim4'] = "";
} 
$adim4 = $_GET['adim4'];

if (!isset($_GET['adim5']))
{

$_GET['adim5'] = "";
} 
$adim5 = $_GET['adim5'];

if (!isset($_GET['adim6']))
{
$_GET['adim6'] = "";
} 
$adim6 = $_GET['adim6'];

if (!isset($_GET['arama_kriteri']))
{
$_GET['arama_kriteri'] = "";
} 
$arama=$_GET['arama_kriteri'];

if (!isset($_GET['isim_ara']))
{

$_GET['isim_ara'] = "";
} 
$ne_arama=$_GET['isim_ara'];

if (!isset($_SESSION['ogr_no']))
{

$_SESSION['ogr_no'] = "";
} 
$giris_adi=$_SESSION['ogr_no'];

		$_SESSION['ogrenci_no']="";
		$_SESSION['tc_no']="";
		$_SESSION['ad_soyad']="";
		$_SESSION['cep_telefonu']="";
		$_SESSION['e_posta']="";
$_SESSION['arama']=$arama;
			$_SESSION['ne_arama']=$ne_arama;
			$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
$a="mehmet";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
	<link type="text/css" href="still.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>
	
	<script type="text/javascript" src="daha.js"></script>
	<link type="text/css" href="stil.css" rel="stylesheet" />
</head>
<body>
<div class="bolum_adi">
	<font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
</div>
<div id="menu">
    <ul class="menu">
		<li class="last"><span><a align="right" href="ogrenci_ekle.php">&nbsp;   ÖGRENCİ EKLE     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="personel.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a href="ogrenci_bilgileri_yazdir.php?arama=<?php echo $arama; ?>?ne_arama=<?php echo $ne_arama; ?>">&nbsp;    YAZDIR      &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<div class="ara ortak_div_ozellikleri">

	<form action="ogrenci_bilgileri.php?adim=girisonay&arama=<?php echo $_POST['arama_kriteri']; ?>" method="get">
<font color="black" style="font-weight:900; font-size:15px; margin-right:20px;">ARA</font>
	
		<select name="arama_kriteri" width="150">
		<option value="ad_soyad" selected="selected">Adı Soyadı</option>
		<option value="tc_no">Tc No</option>
		<option value="ogrenci_numarasi">Ögrenci Numarası</option>		
		</select>
	<input name="isim_ara" type="text" class="hide">
	<input type="submit" class="buton" id="ara" style="margin-left:20px;" value="      ara">
	</form>
	<form action="ogrenci_bilgileri.php?adim6=girisonay6" method="post">
	<input type="submit" class="buton" id="tumunu_listele" value="Tümünü Listele"> 
	</form>	

</div>
	
	<?php
	if ($arama!="" or $adim6=="girisonay6")
	{
		if (!isset($_POST['isim_ara']))
		{
		
			$_POST['isim_ara'] = "";
		} 
		
		$isim_ara=$_POST['isim_ara'];

	?>
	
<div class="ogrenci_bilgileri ortak_div_ozellikleri">
	<table align="center" border="1" id="icerik">

	
	<tr>
	<td  width="250"><h4><font color="black">Öğrenci No</font></h4></td>
	<td  width="250"><h4><font color="black">TC No</font></h4></td>
	<td  width="350"><h4><font color="black">Ad Soyad</font></h4></td>
	<td  width="350"><h4><font color="black">Cep Telefonu</font></h4></td>
	<td  width="350"><h4><font color="black">E posta</font></h4></td>

	<td  width="350"><h4><font color="black">Güncelle</font></h4></td>
	<td  width="350"><h4><font color="black">Sil</font></h4></td>
	<td  width="350"><h4><font color="black">Staj Ekle</font></h4></td>	
	</tr>

	<?php
	if ($ne_arama!="" and $arama!="")
	{
		$_SESSION['listele1'] = 0;
		if ( $arama=="tc_no")
		{
		$uyeler = mysql_query("SELECT * FROM ogrenci where tc_no like '%$ne_arama%' order by ogrenci_no desc limit 10"); 
		$uyebul = mysql_num_rows($uyeler);
		}
		else if ( $arama=="ogrenci_numarasi")
		{
		$uyeler = mysql_query("SELECT * FROM ogrenci where ogrenci_no like '%$ne_arama%' order by ogrenci_no desc limit 10"); 
		$uyebul = mysql_num_rows($uyeler);
		}
		else if ( $arama=="ad_soyad")
		{
		$uyeler = mysql_query("SELECT * FROM ogrenci where ad_soyad like '%$ne_arama%' order by ogrenci_no desc limit 10"); 
		$uyebul = mysql_num_rows($uyeler);
		}
	}
	else if($adim6=="girisonay6")
	{
		$_SESSION['listele1'] = 1;
		$uyeler = mysql_query("SELECT * FROM ogrenci order by ogrenci_no desc limit 10"); 
		$uyebul = mysql_num_rows($uyeler);
	}
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$ogrenci_no = mysql_result($uyeler, $sayac,'ogrenci_no');
		$tc_no =  mysql_result($uyeler, $sayac,'tc_no');
		$ad_soyad   =  mysql_result($uyeler, $sayac,'ad_soyad');
		$cep_telefonu = mysql_result($uyeler, $sayac,'cep_telefonu');
		$e_posta = mysql_result($uyeler, $sayac,'e_posta');
	//	$sifre   =  mysql_result($uyeler, $sayac,'sifre');
	?>
	<tr id="<?php echo $ogrenci_no;?>">
	<td width="350"><?php echo '<h3><font >'.$ogrenci_no.'</font></h3>';?></td>
	<td width="350"><?php echo '<h3><font style="font-size:8px;">'.$tc_no.'</font></h3>';?></td>
	<td width="250"><?php echo '<h3><font >'.$ad_soyad.'</font></h3>';?></td>
	<td width="350"><?php echo '<h3><font >'.$cep_telefonu.'</font></h3>';?></td>
	<td width="350"><?php echo '<h3><font style="font-size:8px;">'.$e_posta .'</font></h3>';?></td>
	<form action="ogrenci_bilgileri.php?adim2=<?php echo ''.$ogrenci_no.'';?>" method="post">
	<td width="50"><input type="submit" class="duzenle duzenlemeler" name="duzenle" value=""> </td>
	</form>
	<form action="ogrenci_bilgileri.php?adim3=<?php echo ''.$ogrenci_no.'';?>" method="post">
	<td width="50"><input type="submit" class="sil duzenlemeler" name="sil" value=""> </td>
	</form>
	<form action="ogrenci_bilgileri.php?adim5=<?php echo ''.$ogrenci_no.'';?>" method="post">
	<td  width="50"><input type="submit" class="buton" name="staj_ekle" value="Staj Ekle"> </td>
	</form>
	</tr>
	<?php	
		}
	
	?>
</table>

<?php
if($adim6=="girisonay6")
	{
?>
<div class="daha">
		<div style="display:none"><img src="yukleniyor.gif" alt=""/></div>
		<span>Daha Fazlasını Göster </span>
	</div>
	<?php
	}
?></div>
<?php

}

?>
	<?php
	
		if ($adim2!="")
		{
	$_SESSION['ogrenci_duzenle'] = $_GET['adim2'];
	 
	echo '<meta http-equiv="refresh" content="0;URL=ogrenci_duzenle.php">';
	 }
	 if ($adim3!="")
		{
	$sil = $_GET['adim3'];
	 $_SESSION['id1']=$sil;
				 echo '<script type="text/javascript">
				 if (confirm("Silme işlemini onaylıyor musunuz?"))
				 {
				$(document).ready(function() {
var data=1;
$.ajax({
	type: "POST",
	url: "sil1.php",
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
echo '<meta http-equiv="refresh" content="0;URL=ogrenci_bilgileri.php">';
	 }
	 if ($adim5!="")
		{
	$_SESSION['staj_ekle'] = $_GET['adim5'];
	echo '<meta http-equiv="refresh" content="0;URL=staj_bilgisi_ekle.php">';
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