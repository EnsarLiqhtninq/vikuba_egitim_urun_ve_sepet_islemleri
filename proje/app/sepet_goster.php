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
		<h1>Sepetteki Ürünler</h1>

		<fieldset>
			<table class="table table-hover">
				<tr>
					<th>No</th>
					<th>Resim</th>
					<th>Kod</th>
					<th>Başlık</th>
					<th>Fiyat</th>
				</tr>
				<?php 
				$no=1;
				$tfiyat = 0;
				$tadet = 0;
				foreach ($_SESSION["urun"] as $key => $value) {
					
					$tfiyat += $value["urun_fiyat"];
					$tadet += $value["adet"];
					?>
					<tr>
						<td><?=$no++;?></td>
						<td><img src="public/uploads/<?=$value["urun_resim"];?>" alt="" height="80"></td>
						<td><?=$value["urun_kod"];?></td>
						<td><?=$value["urun_baslik"];?></td>
						<td><?=$value["urun_fiyat"];?></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<th></th>
					<th></th>
					<th>Toplam Tutar : <?=$tfiyat;?></th>
					<th>Toplam Adet : <?=$tadet;?></th>
					<th><a href="index.php?url=satin_al" class="btn btn-info">SATIN AL</a></th>
				</tr>
			</table>
		</fieldset>

	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</body>
</html>