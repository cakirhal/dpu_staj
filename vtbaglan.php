<?php
##################################################
#           Veritabanı Ayarları
#
#   $vt_host      = Veritabanı Hostu
#   $vt_kullanici = Veritabanı Kullanıcı Adı
#   $vt_sifre     = Veritabanı Şifresi
#   $vt_adi       = Veritabanı Adı
#
##################################################
 
$vt_host       = "localhost";
$vt_kullanici  = "stajbilgisayar";
$vt_sifre      = "stajbilgisayar2013";
$vt_adi        = "stajv1.1";
 
//Veritabanı bağlantısını yapıyoruz
$vtbaglan = @mysql_connect($vt_host,$vt_kullanici,$vt_sifre) or die("Veritabanı bağlantısı sağlanamadı!");
mysql_select_db($vt_adi,$vtbaglan) or die("Veritabanı bulunamadı!");
mysql_query("SET CHARACTER SET utf8");
?>


