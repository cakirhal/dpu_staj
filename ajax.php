<?php
require_once("vtbaglan.php");
sleep(1);
if ($_POST){
	$id=$_POST["id"];
	$query=mysql_query("SELECT * FROM ogrenci where ogrenci_no<$id order by ogrenci_no desc limit 10");
	if(mysql_affected_rows()){
	while($row=mysql_fetch_array($query)){
	
		echo '
		<tr id="'.$row["ogrenci_no"].'">
	<td width="350"><h3><font >'.$row["ogrenci_no"].'</font></h3></td>
	<td width="350"><h3><font  style="font-size:8px;">'.$row["tc_no"].'</font></h3></td>
	<td  width="250"><h3><font >'.$row["ad_soyad"].'</font></h3></td>
	<td width="350"><h3><font >'.$row["cep_telefonu"].'</font></h3></td>
	<td  width="350"><h3><font  style="font-size:8px;">'.$row["e_posta"].'</font></h3></td>
	<form action="ogrenci_bilgileri.php?adim2='.$row["ogrenci_no"].'" method="post">
	<td  width="50"><input type="submit" class="duzenle duzenlemeler" name="duzenle" value=""> </td>
	</form>
	<form action="ogrenci_bilgileri.php?adim3='.$row["ogrenci_no"].'" method="post">
	<td  width="50"><input type="submit" class="sil duzenlemeler" name="sil" value=""> </td>
	</form>
	<form action="ogrenci_bilgileri.php?adim5='.$row["ogrenci_no"].'" method="post">
	<td  width="50"><input type="submit" class="buton" name="staj_ekle" value="Staj Ekle"> </td>
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