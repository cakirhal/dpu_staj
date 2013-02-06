<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");

if (!isset($_GET['adim']))
{
//If not isset -> set with dumy value
$_GET['adim'] = "";
} 
$adim = $_GET['adim'];
		$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link type="text/css" href="still.css" rel="stylesheet" />
</head>
<body>
<div class="staj_bilgileri_yer_ekle ortak_div_ozellikleri">
<form action="staj_bilgileri_yer_ekle.php?adim=girisonay" method="post">
<table align="center" border="5">

<tr>
<td align="left" width="200"><h4>Staj Yeri Adı</h4></td>
<td align="left" width="250"><input name="ad" type="text"></td>
</tr>
<tr>
<td align="left" width="200"><h4>Staj Yeri Adresi</h4></td>
<td align="left" width="250"><input name="adress" type="text"></td>
</tr>

<td></td>
<td><input type="submit" class="buton" value="Staj Yeri Ekle"></td>
</tr>
</table>

</form>
</div>
</body>
</html>
<?php
if($adim=="girisonay")
{
//$id   = $_POST['id'];
$ad = $_POST['ad'];
$adress   = $_POST['adress'];

if ($ad=="" or $adress=="")
{
echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
echo '<meta http-equiv="refresh" content="0;URL=staj_bilgileri_yer_ekle.php">';
}
else
{
		
		
		$uyeler = mysql_query("SELECT * FROM staj_yeri where ad='$ad'"); 
	$uyebul = mysql_num_rows($uyeler);
	if ($uyebul>0)
	{
		echo '<script type="text/javascript">alert("aynı isimde staj yeri var");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=staj_bilgileri_yer_ekle.php">';
	}
	else
	{
	mysql_query("INSERT INTO staj_yeri VALUES ('','".$ad."','".$adress."')");
		echo '<script type="text/javascript">alert("Ekleme Gerçekleştirildi"); opener.location.reload(); window.close();</script>';
	}

}
}

}

else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>