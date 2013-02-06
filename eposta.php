<?php
session_start();
require_once("vtbaglan.php");
require_once('phpmailer/smtpmailler.php');


$baslik="DPÜ Bilgisayar Müh. Staj Sistemi";
$yeni_Sifre=substr(md5(uniqid(rand())),0,8);
$mesaj="Geçici Şifreniz ".$yeni_Sifre;


$alt_yazi="altyazi";

$kimden="dpu.bil.muh@gmail.com";
$kimden_ad="bilgisayar müh. staj sistemi";

$kime=$_SESSION['sifremi_unuttum_e_mail'];
$kime_ad=$_SESSION['sifremi_unuttum_adi'];

$sifreli=md5($yeni_Sifre);
mysql_query("UPDATE ogrenci set sifre='".$sifreli."' where ogrenci_no='".$_SESSION['sifremi_unuttum_ogrenci_no']."' ");
		



smtpmail($baslik, $mesaj, $kimden, $kimden_ad, $kime, $kime_ad);

?>