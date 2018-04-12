<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<h1>Admin Anasayfa</h1>

		

		<fieldset>
			<legend>Ürün Ekle</legend>
		
			<?php 

			if (pisset()) {
				
				$kod = post("kod");
				$baslik = post("baslik");
				$fiyat = post("fiyat");
				$detay = post("detay");

				if ( $kod == "" or $baslik == "" ) {
					
					echo '<div class="alert alert-warning"><strong>Uyarı</strong> Ürün Başlık ve Kod Gerekli</div>';

				} else {
					

					$resim_ad = "";

					if ( isset( $_FILES["resim"]['name'] )) {
					

						$upload = new MUpload($_FILES["resim"]);
						if( $upload->yukle("../public/uploads/")==true){

							$resim_ad = $upload->yuklenen;

						}
					} 


					$db->sql = "insert into urun set urun_kod=?,
														urun_baslik=?,
															urun_fiyat=?,
																urun_detay=?,
																	urun_resim=?";
					$db->data =array($kod,$baslik,$fiyat,$detay,$resim_ad);

					$kaydet = $db->insert();

					if ( $kaydet ) {

						echo '<div class="alert alert-success"><strong>Başarılı</strong> Bilgiler Kaydedildi</div>';

					} else {

						echo '<div class="alert alert-danger"><strong>Başarısız</strong> Bilgiler Kaydedilemedi</div>';

					}
				
				}
				
			}
			
			?>

			
			
			

			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Kod</label>
					<input type="text" name="kod" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Başlık</label>
					<input type="text" name="baslik" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Fiyat</label>
					<input type="text" name="fiyat" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Detay</label>
					<textarea name="detay" id="" rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="">Resim</label>
					<input type="file" name="resim" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="Ekle" class="btn btn-info">
				</div>
			</form>
		</fieldset>

	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</body>
</html>