<?php 
/////////////////////
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim2 = @$_GET['adim2'];
$adim3 = @$_GET['adim3'];
$adim4 = @$_GET['adim4'];
$adim6 = @$_GET['adim6'];
$giris_adi=@$_SESSION['ogr_no'];
	$isim_ara=@$_POST['isim_ara'];
		$_SESSION['isim_ara']=$isim_ara;
		$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
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
	<li class="last"><span><a align="right" href="staj_turu_ekle.php">&nbsp;    STAJ TÜRÜ EKLE     &nbsp;</a></span></li>
	<li class="last"><span><a align="right" href="personel.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a href="staj_turleri_yazdir.php?isim_ara=<?php echo $isim_ara; ?>">&nbsp;    YAZDIR     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />


<div class="ara staj_turleri_ara ortak_div_ozellikleri">
<form action="staj_turleri.php?adim4=girisonay4" method="post">
	<font color="black" style="font-weight:900; font-size:15px; margin-right:20px;">ARA (ad soyad)</font>
	<input name="isim_ara" type="text" class="hide"><input type="submit" class="buton" id="ara" style="margin-left:20px;" value="      ara">
	</form>
	<form action="staj_turleri.php?adim6=girisonay6" method="post">
	<input type="submit" class="buton" id="tumunu_listele" value="Tümünü Listele">
	</form>
	</tr>
	
	
</div>


	
	
	<?php
	if ($adim4=="girisonay4" or $adim6=="girisonay6")
	{
	?>
<div class="staj_turleri ortak_div_ozellikleri">
	<table align="center" border="1">

	<tr>
	<td  align="center" width="250"><h2><font color="black">Staj Türü Adı</font></h2></td>
	<td  align="center" width="250"><h2><font color="black">En AZ</font></h2></td>
	<td  align="center" width="250"><h2><font color="black">Güncelle</font></h2></td>
	<td  align="center" width="250"><h2><font color="black">Sil</font></h2></td>
	</tr>

	<?php
	if ( $adim4=="girisonay4" and $isim_ara!="")
	{$_SESSION['listele4'] = 0;
	$uyeler = mysql_query("SELECT * FROM staj_turu where ad like '%$isim_ara%'"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	else if ($adim6=="girisonay6")
	{$_SESSION['listele4'] = 1;
	$uyeler = mysql_query("SELECT * FROM staj_turu"); 
	$uyebul = mysql_num_rows($uyeler);
	}
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id = mysql_result($uyeler, $sayac,'id');
		$ad =  mysql_result($uyeler, $sayac,'ad');
		$en_az =  mysql_result($uyeler, $sayac,'en_az');
	?>
	<tr>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$ad.'</font></h3>';?></td>
	<td align="center" width="350"><?php echo '<h3><font color="red">'.$en_az.'</font></h3>';?></td>
	<form action="staj_turleri.php?adim2=<?php echo ''.$id.'';?>" method="post">
	<td align="center" width="50"><input type="submit" class="duzenle duzenlemeler" name="duzenle" value=""> </td>
	</form>
	<form action="staj_turleri.php?adim3=<?php echo ''.$id.'';?>" method="post">
	<td align="center" width="50"><input type="submit" class="sil duzenlemeler" name="sil" value=""> </td>
	</form>
	</tr>
	<?php	
		}
	?>
</table>
</div>
<?php

}

?>
	<?php
	
		if ($adim2!="")
		{
	$_SESSION['staj_turu_duzenle'] = $_GET['adim2'];
	 
	echo '<meta http-equiv="refresh" content="0;URL=staj_turu_duzenle.php">';
	 }
	 if ($adim3!="")
		{
		/*$onay = $_POST["onayk"];
	 if($onay){
						mysql_query("Delete from staj_turu where id='".$sil."' ");
						echo '<script type="text/javascript">alert("staj turu bilgisi silindi ama staj bilgilerinde bu türde çalışan öğrenciler olabilir");</script>';
						echo '<meta http-equiv="refresh" content="0;URL=staj_turleri.php">';
				}else echo '<script type="text/javascript">alert("onay kutusunu seçin!!!");</script>';
	*/
	$sil = $_GET['adim3'];
		 $_SESSION['sil5']=$sil;
				 echo '<script type="text/javascript">
				 if (confirm("Silme işlemini onaylıyor musunuz?"))
				 {
				$(document).ready(function() {
var data=1;
$.ajax({
	type: "POST",
	url: "sil5.php",
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
		echo '<meta http-equiv="refresh" content="0;URL=staj_turleri.php">';

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