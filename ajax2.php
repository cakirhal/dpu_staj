<?php
require_once("vtbaglan.php");
sleep(1);
if ($_POST){
	$id=$_POST["id"];
	$uyeler=mysql_query("SELECT * FROM (((staj_bilgileri inner join ogrenci on staj_bilgileri.ogrenci_no=ogrenci.ogrenci_no ) inner join staj_turu on staj_bilgileri.staj_turu=staj_turu.id) inner join staj_yeri on staj_bilgileri.staj_yeri=staj_yeri.id) where staj_bilgileri.id<$id order by staj_bilgileri.id desc limit 10");
	$uyebul = mysql_num_rows($uyeler);
	if(mysql_affected_rows()){
	for($sayac=0;$sayac<$uyebul;$sayac++){
		$id = mysql_result($uyeler, $sayac,'staj_bilgileri.id');
		$staj_yeri =  mysql_result($uyeler, $sayac,'staj_yeri.ad');
		$staj_turu   =  mysql_result($uyeler, $sayac,'staj_turu.ad');
		$ogrenci_no = mysql_result($uyeler, $sayac,'staj_bilgileri.ogrenci_no');
		$ogrenci_ad = mysql_result($uyeler, $sayac,'ogrenci.ad_soyad');
		$baslangic   =  mysql_result($uyeler, $sayac,'staj_bilgileri.baslangic');
		$bitis =  mysql_result($uyeler, $sayac,'staj_bilgileri.bitis');
		$kabul_gun   =  mysql_result($uyeler, $sayac,'staj_bilgileri.kabul_gun');
		$toplam_gun = mysql_result($uyeler, $sayac,'staj_bilgileri.toplam_gun');
		$aciklama   =  mysql_result($uyeler, $sayac,'staj_bilgileri.aciklama');
		$durum =  mysql_result($uyeler, $sayac,'staj_bilgileri.durum');
		$donem= mysql_result($uyeler, $sayac,'staj_bilgileri.donem');
		echo '
		<tr id="'.$id.'">
	<td  width="350"><h5><font>'.$id.'</font></h5></td>
	<td  width="350"><h5><font>'.$ogrenci_no.'</font></h5></td>
	<td  width="350"><h5><font>'.$ogrenci_ad.'</font></h5></td>
	<td  width="250"><h5><font>'.$staj_yeri.'</font></h5></td>
	<td width="350"><h5><font>'.$staj_turu.'</font></h5></td>
	<td  width="350"><h5><font>'.$baslangic.'</font></h5></td>
	<td width="350"><h5><font>'.$bitis.'</font></h5></td>
	<td width="350"><h5><font>'.$kabul_gun.'</font></h5></td>
	<td width="350"><h5><font>'.$toplam_gun.'</font></h5></td>
	<td width="350"><h5><font>'.$aciklama.'</font></h5></td>
	<td  width="350"><h5><font>'.$durum.'</font></h5></td>
	<td width="350"><h5><font>'.$donem.'</font></h5></td>
	<form action="staj_bilgileri.php?adim2='.$id.'" method="post">
	<td  width="50"><input type="submit" class="duzenle duzenlemeler" name="düzenle" value=""> </td>
	</form>
	<form action="staj_bilgileri.php?adim3='.$id.'" method="post">
	<td  width="50">
	<input type="submit" name="sil" class="sil duzenlemeler" value="">
	</td>
	</form>
	</tr>
		
		';
	}
	}
	else{
	echo "yok";
	}
}

?>