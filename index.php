<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator Marsel</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	$hasil = ""; // Default hasil kosong
	$ketika_error = ""; // Pesan error kosong

	if(isset($_POST['hitung'])){
		$bil1 = $_POST['bil1'];
		$bil2 = $_POST['bil2'];
		$operasi = $_POST['operasi'];

		// Validasi input
		if ($bil1 === "" || $bil2 === "") {
			$ketika_error = "Masukkan bilangan";
		} else {
			switch ($operasi) {
				case 'tambah':
					$hasil = $bil1 + $bil2;
					break;
				case 'kurang':
					$hasil = $bil1 - $bil2;
					break;
				case 'kali':
					$hasil = $bil1 * $bil2;
					break;
				case 'bagi':
					if ($bil2 == 0) {
						$ketika_error = "Tidak Bisa";
					} else {
						$hasil = $bil1 / $bil2;
					}
					break;			
			}
		}
	}
	?>
	<div class="kalkulator">
		<h2 class="judul">KALKULATOR</h2>
		<form method="post" action="index.php">			
			<input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Pertama">
			<input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Kedua">
			<select class="opt" name="operasi">
				<option value="tambah">+</option>
				<option value="kurang">-</option>
				<option value="kali">x</option>
				<option value="bagi">/</option>
			</select>
			<input type="submit" name="hitung" value="Hitung" class="tombol">											

			<!-- Tampilkan hasil atau pesan error -->
			<?php if (!empty($ketika_error)): ?>
				<input type="text" value="<?php echo $ketika_error; ?>" class="bil" readonly>
			<?php elseif (isset($_POST['hitung'])): ?>
				<input type="text" value="<?php echo $hasil; ?>" class="bil" readonly>
			<?php else: ?>
				<input type="text" value="0" class="bil" readonly>
			<?php endif; ?>
		</form>
	</div>
</body>
</html>
