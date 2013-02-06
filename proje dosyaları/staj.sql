-- Veritabaný Oluþturulur.
CREATE DATABASE staj;

-- Oluþan veritabanýný kullanalým.
USE staj;

-- Döküman ID 0-255 arasýnda deðer alacaktýr, þimdilik yeterli.
CREATE TABLE dokuman(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
ad VARCHAR(50) NOT NULL, yol VARCHAR(100) NOT NULL, PRIMARY KEY(id) );

-- Öðrenci No zorunlu olarak 12 karakter.
CREATE TABLE ogrenci(ogrenci_no CHAR(12) NOT NULL, tc_no VARCHAR(11), 
ad_soyad VARCHAR(50) NOT NULL, cep_telefonu VARCHAR(15), 
e_posta VARCHAR(50), sifre VARCHAR(32) NOT NULL, PRIMARY KEY(ogrenci_no));

-- Staj yerleri mümkün olduðunca çok olabilir. 
CREATE TABLE staj_yeri(id INT NOT NULL AUTO_INCREMENT, ad VARCHAR(150) NOT NULL, 
adres VARCHAR(250), PRIMARY KEY(id));

-- Staj türleri iki elin parmaðýný geçmez.
CREATE TABLE staj_turu(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
ad VARCHAR(25) NOT NULL, PRIMARY KEY(id));

-- 3 adet foreign key baðlantýlar kurulur.
CREATE TABLE staj_bilgileri(id INT NOT NULL AUTO_INCREMENT, 
staj_yeri INT NOT NULL, staj_turu TINYINT UNSIGNED NOT NULL, 
ogrenci_no CHAR(12) NOT NULL, baslangic DATE NOT NULL, bitis DATE NOT NULL, 
kabul_gun TINYINT DEFAULT 0, toplam_gun TINYINT NOT NULL, aciklama VARCHAR(100), 
durum VARCHAR(20), donem VARCHAR(20),
CONSTRAINT ogrenci_staj_bilgisi FOREIGN KEY(ogrenci_no) REFERENCES staj.ogrenci(ogrenci_no)
ON DELETE NO ACTION ON UPDATE NO ACTION, 
CONSTRAINT staj_yeri_bilgisi FOREIGN KEY(staj_yeri) REFERENCES staj.staj_yeri(id)
ON DELETE NO ACTION ON UPDATE NO ACTION, 
CONSTRAINT staj_turu_bilgisi FOREIGN KEY(staj_turu) REFERENCES staj.staj_turu(id)
ON DELETE NO ACTION ON UPDATE NO ACTION, PRIMARY KEY(id));

-- Personel Bilgileri
-- Þifre 32 karakter çünkü MD5 ile þifreleme
CREATE TABLE personel(kullanici_adi CHAR(12) NOT NULL, 
ad_soyad VARCHAR(50) NOT NULL, sifre VARCHAR(32) NOT NULL, PRIMARY KEY(kullanici_adi) );