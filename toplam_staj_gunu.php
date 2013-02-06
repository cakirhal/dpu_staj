<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim = @$_GET['adim'];
$uyeler2 = mysql_query("SELECT * FROM toplam_staj"); 
$uyebul2 = mysql_fetch_array($uyeler2);
$staj_toplam = $uyebul2['staj_toplam'];
$bolum_adi = $uyebul2['bolum_adi'];
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
	<li class="last"><span><a align="right" href="personel.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />




<div class="toplam_staj_gunu ortak_div_ozellikleri">
<form action="toplam_staj_gunu.php?adim=girisonay" method="post">
<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Toplam Staj Günü</h4></td>
<td align="left" width="250"><input name="staj_toplam" type="text" class="toplam_staj_text" value="<?php echo ''.$staj_toplam.'';?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>

<tr>
<td align="left" width="200"><h4>Bölümün Adı</h4></td>
<td align="left" width="250"><input name="bolum_adi" type="text" class="toplam_staj_text" value="<?php echo ''.$bolum_adi.'';?>"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>


</table>

<input type="submit" class="buton" style="float:right; margin-top:10px;" value="Staj Toplam Günü Güncelle">

</form>
</div>
</body>
</html>
<?php
if($adim=="girisonay")
{
$staj_toplam = $_POST['staj_toplam'];
$bolum_adi = $_POST['bolum_adi'];
if ($staj_toplam=="" and $bolum_adi=="")
{
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=toplam_staj_gunu.php">';
}
else
{
		mysql_query("UPDATE toplam_staj set staj_toplam='".$staj_toplam."',bolum_adi='".$bolum_adi."'");
		echo '<script type="text/javascript">alert("Güncelleme Gerçekleştirildi");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=personel.php">';

}
}

}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>