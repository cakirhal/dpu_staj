<?php
session_start(); //Oturumumuzu baþlatýyoruz
ob_start(); //Sayfanýn daha hýzlý yüklenmesine yardýmcý olur
session_destroy(); //Oturumumuzu sonlandýrýyoruz
echo '<meta http-equiv="refresh" content="0;URL=index.php">'; //Anasayfa yani giriþ formu sayfasýna yönlendiriyoruz
ob_end_flush(); //ob_start() fonksiyonu temizliyoruz
?>


