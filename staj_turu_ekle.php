<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$adim = @$_GET['adim'];
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
	<li class="last"><span><a align="right" href="staj_turleri.php">&nbsp;    GERİ DÖN     &nbsp;</a></span></li>
		<li class="last"><span><a align="right" href="cikis.php">&nbsp;    OTURUMU KAPAT      &nbsp;</a></span></li>	
	</ul>
</div>
<div id="copyright"><font color="#09C"></font><a href="http://apycom.com/"></a></div>
<br />


<div class="staj_turu_ekle ortak_div_ozellikleri">
<form action="staj_turu_ekle.php?adim=girisonay" method="post">
<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Staj Türü Adı</h4></td>
<td align="left" width="150"><input name="ad" type="text"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>
<tr>
<td align="left" width="200"><h4>En Az</h4></td>
<td align="left" width="150"><input name="en_az" type="text"></td>
<td><h5><font color="red">*Boş Bırakılamaz</font></h5></td>
</tr>

<td>&nbsp;  </td>
<td><input type="submit" class="buton" value="Staj Türü Ekle"></td>
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
$ad = $_POST['ad'];
$en_az = $_POST['en_az'];
if ($ad=="")
{
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=staj_turu_ekle.php">';
}
else
{
		mysql_query("INSERT INTO staj_turu VALUES ('','".$ad."','".$en_az."')");
		echo '<script type="text/javascript">alert("Ekleme Gerçekleştirildi");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=staj_turleri.php">';

}
}

}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>