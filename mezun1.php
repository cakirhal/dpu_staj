<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$id =$_SESSION['mezun1'] ;
$karar=$_POST['tmp'];
?>
<html> 

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>


<?php
if($karar==1)
{
	mysql_query("UPDATE ogrenci set mezundur='1' where ogrenci_no='".$id."' ");
	echo '<script type="text/javascript">alert("Bu ogrenci artik, sistemde mezun oldu gozukecektir");</script>';
										
}
	}
	
else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>
</html>