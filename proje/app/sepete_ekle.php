<?php 

$id = get("id");

$db->sql = "select * from urun where urun_id=?";
$db->data=array($id);

$urun = $db->select(1);

$kod = $urun->urun_kod;
$baslik = $urun->urun_baslik;
$detay = $urun->urun_detay;
$fiyat = $urun->urun_fiyat;
$resim = $urun->urun_resim;


if (isset($_SESSION["urun"][$id])) {

	$adet = $_SESSION["urun"][$id]["adet"];
	$adet++;

} else {
	
	$adet =1;
}

if (isset($_SESSION["urun"][$id])) {

	$urun_fiyat = $_SESSION["urun"][$id]["urun_fiyat"];
	$fiyat += $urun_fiyat;
}



$_SESSION["urun"][$id]["urun_kod"]=$kod;
$_SESSION["urun"][$id]["urun_baslik"]=$baslik;
$_SESSION["urun"][$id]["urun_fiyat"]=$fiyat;
$_SESSION["urun"][$id]["urun_detay"]=$detay;
$_SESSION["urun"][$id]["urun_resim"]=$resim;
$_SESSION["urun"][$id]["adet"]=$adet;

// pr($_SESSION["urun"]);

git("index.php");