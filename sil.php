<?php
session_start();
if($_SESSION['rutbe'] ==10)
{
require_once("vtbaglan.php");
$id =$_SESSION['id1'] ;
$karar=$_POST['tmp'];
?>
<html> 

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>


<?php
if($karar==1)
{
	mysql_query("Delete from staj_bilgileri where id='".$id."' ");
	echo '<script type="text/javascript">alert("Silme Islemi Gerceklestirildi");</script>';
}
	}
	
else
{
echo '<script type="text/javascript">alert("oturum açmanız gerekmektedir \nAna sayfaya yönlendirileceksiniz");</script>';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>
</html>