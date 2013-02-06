<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");

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

if (!isset($_GET['adim6']))
{
//If not isset -> set with dumy value
$_GET['adim6'] = "";
} 
$adim6 = $_GET['adim6'];

if (!isset($_GET['adim7']))
{
//If not isset -> set with dumy value
$_GET['adim7'] = "";
} 
$adim7 = $_GET['adim7'];

if (!isset($_SESSION['ogr_no']))
{
//If not isset -> set with dumy value
$_SESSION['ogr_no'] = "";
} 
$giris_adi=$_SESSION['ogr_no'];
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
		<li class="last"><span><a align="right" href="upload.php">&nbsp;    DÖKÜMAN EKLE     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="personel.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a href="whatever.htm" onClick="window.print();return false">&nbsp;    YAZDIR     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />
	<div class="ara dokumanlar_ara ortak_div_ozellikleri">
	<form action="dokumanlar.php?adim5=onay5" method="post"><input type="submit" style="float:left; margin:0 10px;" name="düzenle" class="buton" value="Herkese Açık"></form>
	<form action="dokumanlar.php?adim6=onay6" method="post"><input type="submit" style="float:left; margin:0 10px;" name="düzenle" class="buton" value="Özel"></form>
	<form action="dokumanlar.php?adim7=onay7" method="post"><input type="submit" style="float:left; margin:0 10px;" name="düzenle" class="buton" value="Tümü"></form>
		
	</div>	

	<?php
	$dokumanlar_ac=0;
	
	$uyebul=0;

	if($adim5=="onay5")
	{
		$uyeler = mysql_query("SELECT * FROM dokuman where kullanici_id='0' order by id desc");
		$uyebul = mysql_num_rows($uyeler);
		$dokumanlar_ac=1;
	}
	if($adim6=="onay6")
	{
		$uyeler = mysql_query("SELECT * FROM dokuman where kullanici_id!='0' order by id desc");
		$uyebul = mysql_num_rows($uyeler);
		$dokumanlar_ac=1;
	}
	if($adim7=="onay7")
	{
		$uyeler = mysql_query("SELECT * FROM dokuman order by id desc");
		$uyebul = mysql_num_rows($uyeler);
		$dokumanlar_ac=1;
	}
	if($dokumanlar_ac==1){
	?>
	
	<div class="dokumanlar ortak_div_ozellikleri">
<table border="1" align="center">
	<tr>
		<td width="250"><h2><font color="black">Döküman Adı</font></h2></td>
		<td width="250"><h2><font color="black">Kimler Görebiliyor</font></h2></td>
		<td width="50"><h2><font color="black">Güncelle</font></h2></td>
		<td width="50"><h2><font color="black">Sil</font></h2></td>
	</tr>
	<?php
	for($sayac=0;$sayac<$uyebul;$sayac++)
	{
		$id= mysql_result($uyeler, $sayac,'id');
		$ad = mysql_result($uyeler, $sayac,'ad');
		$yol =  mysql_result($uyeler, $sayac,'yol');
		$kim=mysql_result($uyeler, $sayac,'kullanici_id');
	?>
	

	<tr>
		<td width="350"><?php echo '<h3><font color="red"><a align="left" href="'.$yol.'" target="blank">'.$ad.'</a></font></h3>';?></td>
		<?php
		if( $kim==0){
		
		?><td width="350"><?php echo '<h3><font color="red">herkes görebilir</a></font></h3>';?></td>
		<?php
		}else{
		?><td width="350"><?php echo '<h3><font color="red">'.$kim.'</a></font></h3>';?></td>
		<?php
		}
		?>
		
		<form action="dokumanlar.php?adim2=<?php echo ''.$id.'';?>" method="post">
			<td width="50"><input class="duzenlemeler duzenle" type="submit" name="düzenle" value=""> </td>
		</form>
		<form action="dokumanlar.php?adim3=<?php echo ''.$id.'';?>" method="post">
			<td width="50"><input class="duzenlemeler sil" type="submit" name="sil" value=""> </td>
		</form>
	</tr>
	<?php	
		}}
	?>
</table>
</div>
	<?php
	
		if ($adim2!="")
		{
			$_SESSION['dokuman_duzenle'] = $_GET['adim2'];
			echo '<meta http-equiv="refresh" content="0;URL=dokuman_duzenle.php">';
		}
		if ($adim3!="")
		{
		/*$onay = $_POST["onayk"];
			if($onay)
			{
				$sil2=mysql_query("select * from dokuman where id='".$sil."' ");
				mysql_query("Delete from dokuman where id='".$sil."' ");
				$sil3= mysql_fetch_array($sil2);
				$yol2=$sil3['yol'];
				unlink($yol2);
				echo '<script type="text/javascript">alert("dokuman silindi");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=dokumanlar.php">';
			}
			else
				echo '<script type="text/javascript">alert("onay kutusunu seçin!!!");</script>';
			 */
		
			$sil = $_GET['adim3'];
			$_SESSION['sil6']=$sil;
				 echo '<script type="text/javascript">
				 if (confirm("Silme işlemini onaylıyor musunuz?"))
				 {
				$(document).ready(function() {
var data=1;
$.ajax({
	type: "POST",
	url: "sil6.php",
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
	echo '<meta http-equiv="refresh" content="0;URL=dokumanlar.php">';	
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