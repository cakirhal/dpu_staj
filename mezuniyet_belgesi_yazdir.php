<?php 
session_start();
if($_SESSION['rutbe'] ==10)
{ 
require_once("vtbaglan.php");
$no=$_GET['no'];
$ad=$_GET['ad'];
$uyel = mysql_query("SELECT * FROM toplam_staj"); 
$uyeb= mysql_fetch_array($uyel);
$bolum_adi=$uyeb['bolum_adi'];
$giris_adi=$_SESSION['pers_no'];
 $bilgi=mysql_fetch_row(mysql_query("SELECT * FROM personel WHERE kullanici_adi='$giris_adi'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="refresh" content="0; url=mezunlar.php">
<script language="Javascript">

  window.print();

</script>

</head>

<body>
<br /><br /><br /><br />

</style><font color="#000000" align="center"><H1 align="center">T.C.</H1></font>
</style><font color="#000000" align="center"><H1 align="center">DUMLUPINAR ÜNİVERSİTESİ</H1></font>
</style><font color="#000000" align="center"><H1 align="center">MÜHENDİSLİK FAKÜLTESİ</H1></font>
</style><font color="#000000" align="center"><H1 align="center"><?php echo $bolum_adi;?>&nbsp;BÖLÜM BAŞKANLIĞINA</H1></font>
<br /><br /><br /><br />
<p>
<H2 align="LEFT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bölümünüz <?php echo $no;?> numaralı <?php echo $ad;?> 
isimli öğrencisi zorunlu stajını
tamamlamıştır.<br /></p></H2>
<H2 align="LEFT">Mezun olmasında herhangi bir sakınca yoktur.<br /><br /></H2>
<p>
<H2 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gereğini bilgilerinize arz ederim.<br /><br /><br /><br /><br /></H2>
</p></H2>
<H2 align="right"><?php echo $bilgi[1];?>&nbsp;&nbsp;&nbsp;<br /></p></H2>
<H2 align="right"><?php echo date("d-m-Y");;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /></p></H2>
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