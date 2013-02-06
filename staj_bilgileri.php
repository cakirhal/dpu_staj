<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{ 
require_once("vtbaglan.php");
//$adim = $_GET['adim'];
if (!isset($_GET['adim2']))
{
//If not isset -> set with dumy value
$_GET['adim2'] = "";
} 
$adim2 = $_GET['adim2'];

if (!isset($_GET['adim3']))
{
//If not isset -> set with dumy value
$_GET['adim3'] = "";
} 
$adim3 = $_GET['adim3'];

if (!isset($_GET['adim4']))
{
//If not isset -> set with dumy value
$_GET['adim4'] = "";
} 
$adim4 = $_GET['adim4'];

if (!isset($_GET['adim5']))
{
//If not isset -> set with dumy value
$_GET['adim5'] = "";
} 
$adim5 = $_GET['adim5'];

if (!isset($_GET['adim7']))
{
//If not isset -> set with dumy value
$_GET['adim7'] = "";
} 
$adim7 = $_GET['adim7'];

if (!isset($_GET['adim8']))
{
//If not isset -> set with dumy value
$_GET['adim8'] = "";
} 
$adim8 = $_GET['adim8'];

if (!isset($_GET['arama_kriteri']))
{
//If not isset -> set with dumy value
$_GET['arama_kriteri'] = "";
} 
$arama=$_GET['arama_kriteri'];

if (!isset($_GET['isim_ara']))
{
//If not isset -> set with dumy value
$_GET['isim_ara'] = "";
} 
$ne_arama=$_GET['isim_ara'];

if (!isset($_SESSION['ogr_no']))
{
//If not isset -> set with dumy value
$_SESSION['ogr_no'] = "";
} 
$giris_adi=$_SESSION['ogr_no'];	

if (!isset($_SESSION['arama']))
{
//If not isset -> set with dumy value
$_SESSION['arama'] = "";
} 	
$_SESSION['arama']=$arama;

if (!isset($_SESSION['ne_arama']))
{
//If not isset -> set with dumy value
$_SESSION['ne_arama'] = "";
} 
$_SESSION['ne_arama']=$ne_arama;

$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
$div_ac=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 

<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>
	<link type="text/css" href="still.css" rel="stylesheet" />
	<script type="text/javascript" src="daha2.js"></script>

</head>
<body>
<div class="bolum_adi">
	<font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;STAJ SİSTEMİ</H1></font>
</div>
<div id="menu">
    <ul class="menu">
		<li class="last"><span><a align="right" href="staj_bilgisi_ekle.php">&nbsp;    STAJ BİLGİSİ EKLE     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="personel.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a href="staj_bilgileri_yazdir.php?arama=<?php echo $arama; ?>?ne_arama=<?php echo $ne_arama; ?>">&nbsp;     YAZDIR     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>

<div class="ara ortak_div_ozellikleri">

<form action="staj_bilgileri.php?adim4=girisonay4&arama=<?php echo $_POST['arama_kriteri']; ?>" method="get">
	
<font color="black" style="font-weight:900; font-size:15px; margin-right:20px;">ARA</font>
	
<select name="arama_kriteri">
<option value="ad_soyad" selected="selected">Ad Soyad</option>
<option value="ogrenci_numarasi">Öğrenci Numarası</option>
<option value="staj_yeri">Staj Yeri</option>
<option value="staj_turu">Staj Türü</option>
<option value="donem">Dönem</option>
</select>

	
	<input name="isim_ara" type="text" class="hide">
	<input type="submit" class="buton" id="ara" style="margin-left:20px;" value="      ara">
</form>	
<form action="staj_bilgileri.php?adim5=girisonay5" method="post">
	<input type="submit" class="buton" id="tumunu_listele" value="Tümünü Listele"> 
</form>	



</div>

	<?php
	
	if($adim7!="")
	{
		$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE ogrenci.ogrenci_no like '%$adim7%'");
		$uyebul = mysql_num_rows($uyeler);
		$div_ac=1;
	}
	else if($_SESSION['son1']==1)
	{$_SESSION['son1']=0;
		$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id)  order by staj_bilgileri.id desc");
		$uyebul = 1;
		$div_ac=1;
	}
	
	
	

	?>


	<?php
	//$arama="Öğrenci Numarası";
	//$uyebul = 0;
	if ($arama!="" or $adim5=="girisonay5")
	{$uyebul = 0;$div_ac=1;
	//$no_ara=$_POST['no_ara'];
	if (!isset($_POST['isim_ara']))
	{
		//If not isset -> set with dumy value
		$_POST['isim_ara'] = "";
	} 
		
	$isim_ara=$_POST['isim_ara'];
	//$arama_kriteri=$_POST['arama_kriteri'];
	if ($ne_arama!="" and $arama!="")
	{
	$_SESSION['listele'] = 0;
		if ($arama=="ad_soyad")
		{
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE ogrenci.ad_soyad like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="ogrenci_numarasi")
		{
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE ogrenci.ogrenci_no like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="staj_yeri")
		{
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE staj_yeri.ad like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="staj_turu")
		{
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE staj_turu.ad like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
		else if ($arama=="donem")
		{
								$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) WHERE staj_bilgileri.donem like '%$ne_arama%'");
								$uyebul = mysql_num_rows($uyeler);
		}
	}
	else if($adim5=="girisonay5")
	{
		$_SESSION['listele'] = 1;
		$uyeler = mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) order by staj_bilgileri.id desc limit 10");
		$uyebul = mysql_num_rows($uyeler);
	}	
}if($div_ac==1){?>
	<div class="staj_bilgileri ortak_div_ozellikleri">
<table align="center" border="1" id="icerik">


	<tr >
	<td width="250"><h4><font color="black">İD</font></h4></td>
	<td width="250"><h4><font color="black">Öğrenci No</font></h4></td>
	<td width="250"><h4><font color="black">Öğrenci Adı</font></h4></td>
	<td width="350"><h4><font color="black">Staj Yeri</font></h4></td>
	<td width="350"><h4><font color="black">Staj Türü</font></h4></td>
	<td width="350"><h4><font color="black">Başlangıç</font></h4></td>
	<td width="350"><h4><font color="black">Bitiş</font></h4></td>
	<td width="350"><h4><font color="black">Kabul Gün</font></h4></td>
	<td width="350"><h4><font color="black">Toplam Gün</font></h4></td>
	<td width="350"><h4><font color="black">Açıklama</font></h4></td>
	<td width="350"><h4><font color="black">Durum</font></h4></td>
	<td width="350"><h4><font color="black">Dönem</font></h4></td>
	<td width="350"><h4><font color="black">Güncelle</font></h4></td>
	<td width="350"><h4><font color="black">Sil</font></h4></td>
	</tr>

<?php
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id = mysql_result($uyeler, $sayac,'staj_bilgileri.id');
		$staj_yeri =  mysql_result($uyeler, $sayac,'staj_yeri.ad');
		$staj_turu   =  mysql_result($uyeler, $sayac,'staj_turu.ad');
		$ogrenci_no = mysql_result($uyeler, $sayac,'staj_bilgileri.ogrenci_no');
		$ogrenci_ad = mysql_result($uyeler, $sayac,'ogrenci.ad_soyad');
		$baslangic   =  mysql_result($uyeler, $sayac,'staj_bilgileri.baslangic');
		$bitis =  mysql_result($uyeler, $sayac,'staj_bilgileri.bitis');
		$kabul_gun   =  mysql_result($uyeler, $sayac,'staj_bilgileri.kabul_gun');
		$toplam_gun = mysql_result($uyeler, $sayac,'staj_bilgileri.toplam_gun');
		$aciklama   =  mysql_result($uyeler, $sayac,'staj_bilgileri.aciklama');
		$durum =  mysql_result($uyeler, $sayac,'staj_bilgileri.durum');
		$donem= mysql_result($uyeler, $sayac,'staj_bilgileri.donem');
	?>
	<tr id="<?php echo $id;?>">
	<td width="350"><?php echo '<h5><font>'.$id.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$ogrenci_no.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$ogrenci_ad.'</font></h5>';?></td>
	<td width="250"><?php echo '<h5><font>'.$staj_yeri.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$staj_turu.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$baslangic.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$bitis.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$kabul_gun.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$toplam_gun.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$aciklama.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$durum.'</font></h5>';?></td>
	<td width="350"><?php echo '<h5><font>'.$donem.'</font></h5>';?></td>
	<form action="staj_bilgileri.php?adim2=<?php echo ''.$id.'';?>" method="post">
	<td width="50"><input type="submit" class="duzenle duzenlemeler" name="düzenle" value=""> </td>
	</form>
	<form action="staj_bilgileri.php?adim3=<?php echo ''.$id.'';?>" method="post">
	<td width="50">
	<input type="submit" name="sil" class="sil duzenlemeler" value="">
	</td>
	</form>
	</tr>
	<?php	
		}
	?>
</table>
<?php
if($adim5=="girisonay5")
	{
?>
<div class="daha">
		<div style="display:none"><img src="yukleniyor.gif" alt=""/></div>
		<span>Daha Fazlasını Göster </span>
	</div>
<?php
	}}
?>
</div>


	
<?php


	
?>
	<?php
	
		if ($adim2!="")
		{
	$_SESSION['staj_duzenle'] = $_GET['adim2'];
	 
	echo '<meta http-equiv="refresh" content="0;URL=staj_bilgisi_duzenle.php">';
	 }
	 if ($adim3!="")
		{
?>
                 <?php 
				 
				 
				 
				 
				 /*$onay = $_POST["onayk"];
				 if($onay){
					mysql_query("Delete from staj_bilgileri where id='".$sil."' ");
					echo '<script type="text/javascript">alert("Silme İşlemi Gerçekleştirildi");</script>';
					echo '<meta http-equiv="refresh" content="0;URL=staj_bilgileri.php">';
				}else echo '<script type="text/javascript">alert("onay kutusunu seçin!!!");</script>';*/
				 $sil = $_GET['adim3'];
				 $_SESSION['id1']=$sil;
				 echo '<script type="text/javascript">
				 if (confirm("Silme işlemini onaylıyor musunuz?"))
				 {
				$(document).ready(function() {
var data=1;
$.ajax({
	type: "POST",
	url: "sil.php",
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
					echo '<meta http-equiv="refresh" content="0;URL=staj_bilgileri.php">'; 		 }
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