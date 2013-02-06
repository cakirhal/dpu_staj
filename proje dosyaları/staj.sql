-- Veritaban� Olu�turulur.
CREATE DATABASE staj;

-- Olu�an veritaban�n� kullanal�m.
USE staj;

-- D�k�man ID 0-255 aras�nda de�er alacakt�r, �imdilik yeterli.
CREATE TABLE dokuman(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
ad VARCHAR(50) NOT NULL, yol VARCHAR(100) NOT NULL, PRIMARY KEY(id) );

-- ��renci No zorunlu olarak 12 karakter.
CREATE TABLE ogrenci(ogrenci_no CHAR(12) NOT NULL, tc_no VARCHAR(11), 
ad_soyad VARCHAR(50) NOT NULL, cep_telefonu VARCHAR(15), 
e_posta VARCHAR(50), sifre VARCHAR(32) NOT NULL, PRIMARY KEY(ogrenci_no));

-- Staj yerleri m�mk�n oldu�unca �ok olabilir. 
CREATE TABLE staj_yeri(id INT NOT NULL AUTO_INCREMENT, ad VARCHAR(150) NOT NULL, 
adres VARCHAR(250), PRIMARY KEY(id));

-- Staj t�rleri iki elin parma��n� ge�mez.
CREATE TABLE staj_turu(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
ad VARCHAR(25) NOT NULL, PRIMARY KEY(id));

-- 3 adet foreign key ba�lant�lar kurulur.
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
-- �ifre 32 karakter ��nk� MD5 ile �ifreleme
CREATE TABLE personel(kullanici_adi CHAR(12) NOT NULL, 
ad_soyad VARCHAR(50) NOT NULL, sifre VARCHAR(32) NOT NULL, PRIMARY KEY(kullanici_adi) );