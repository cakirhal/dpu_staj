<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$sil =$_SESSION['sil6'] ;
$karar=$_POST['tmp'];
?>
<html> 

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>


<?php
if($karar==1)
{
	$sil2=mysql_query("select * from dokuman where id='".$sil."' ");
				mysql_query("Delete from dokuman where id='".$sil."' ");
				$sil3= mysql_fetch_array($sil2);
				$yol2=$sil3['yol'];
				unlink($yol2);
				echo '<script type="text/javascript">alert("dokuman silindi");</script>';
																			
}
	}
	
else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>
</html>