<?php
session_start(); //Oturumumuzu ba�lat�yoruz
ob_start(); //Sayfan�n daha h�zl� y�klenmesine yard�mc� olur
session_destroy(); //Oturumumuzu sonland�r�yoruz
echo '<meta http-equiv="refresh" content="0;URL=index.php">'; //Anasayfa yani giri� formu sayfas�na y�nlendiriyoruz
ob_end_flush(); //ob_start() fonksiyonu temizliyoruz
?>


