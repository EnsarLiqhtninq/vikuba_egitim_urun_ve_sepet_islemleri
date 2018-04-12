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
		<h1>Site Anasayfa</h1>

		<fieldset>
			<legend>Tüm Ürünler</legend>
			<div>
				<a href="index.php?url=sepet_goster">Sepetinizde <?php 
				
				$adet = 0;

				if (isset($_SESSION["urun"])){ 

					

					foreach ($_SESSION["urun"] as $u) {
						
						$adet++;

					}

				} 

				echo $adet;
				 ?> adet ürün var.</a>
			</div>
			<div class="row">
				<?php 
				$db->sql = "select * from urun order by urun_id desc";
				$urunler = $db->select();
				if ( $urunler != false ) {

					foreach ($urunler as $urun) {
						?>

						<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
							<img src="public/uploads/<?=$urun->urun_resim;?>" alt="..." class="img-responsive">
								<div class="caption">
									<h3><?=$urun->urun_baslik;?></h3>
									<p><?=$urun->urun_fiyat;?></p>
									<p>
									<a href="index.php?url=sepete_ekle&id=<?=$urun->urun_id;?>" class="btn btn-primary" role="button">Sepete Ekle</a></p>
								</div>
							</div>
						</div>
						<?php
					}

				}
				?>	
			</div>
		</fieldset>

	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</body>
</html>