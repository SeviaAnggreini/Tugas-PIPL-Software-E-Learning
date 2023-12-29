<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_matakuliah WHERE id_matakuliah = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Matakuliah</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=matakuliah&aksi=updatedata_matakuliah" method="POST">
						<div class="form-group">
							<label>Nama Matakuliah</label>
							<input type="hidden" class="form-control" name="id_matakuliah" value="<?php echo $data['id_matakuliah'];?>" required placeholder="Nama Mata Pelajaran" required />
							<input class="form-control" name="nama_matakuliah" required placeholder="Nama Mata Pelajaran" value="<?php echo $data['nama_matakuliah'];?>" required />
						</div>
						<div class="form-group">
						<label>SKS</label>
							<input class="form-control" name="sks" required placeholder="Jumlah SKS" onkeypress = "return Angkasaja(event)"  value="<?php echo $data['sks'];?>" required />
						</div>
						<div class="form-group">
							<label>Jenis</label>
							<select class="form-control" name="kelompok_matakuliah">
								<option value="Kompetensi Utama" <?php if ($data['kelompok_matakuliah']=="Kompetensi Utama") {echo "selected='selected'";}?>>Kompetensi Utama</option>
								<option value="Pilihan Keahlian" <?php if ($data['kelompok_matakuliah']=="Pilihan Keahlian") {echo "selected='selected'";}?>>Pilihan Keahlian</option>	
								<option value="Kompetensi Pendukung" <?php if ($data['kelompok_matakuliah']=="Kompetensi Pendukung") {echo "selected='selected'";}?>>Kompetensi Pendukung</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<?php
								$ruang_kelas = ["Ruang 1", "Ruang 2", "Ruang 3", "Ruang 4", "Ruang 5"];
								$sql = $pdo->prepare($query);
								$sql->execute();
								foreach ($ruang_kelas as $ruang) {
									// Mengecek apakah ini adalah opsi yang dipilih sebelumnya
									$selected = ($data['kelas'] == $ruang) ? "selected='selected'" : "";
									echo "<option value='$ruang' $selected>$ruang</option>";
								}
								?>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=matakuliah&aksi=aktif" style="margin-top:15px">Kembali</a>
					</form>
				</div>
			</div>
		</div>
</div>
</body>
</html>

<script type="text/javascript">
	function Angkasaja(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>