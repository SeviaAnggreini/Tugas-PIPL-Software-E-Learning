<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Matakuliah</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=matakuliah&aksi=simpandata_matakuliah" method="POST">
						<div class="form-group">
							<label>Matakuliah</label>
							<input class="form-control" name="nama_matakuliah" required placeholder="Matakuliah" required />
						</div>
						<div class="form-group">
							<label>Nama Dosen</label>
							<select class="form-control" name="nip">
								<?php
									$query_dosen = "SELECT * FROM tbl_dosen";
									$sql_dosen = $pdo->prepare($query_dosen);
									$sql_dosen->execute();
									while ($data_dosen = $sql_dosen->fetch()) {
								?>
								<option value="<?php echo $data_dosen['nip'];?>"><?php echo $data_dosen['nama_dosen'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>SKS</label>
							<input class="form-control" name="jml_jam_matakuliah" required placeholder="sks" onkeypress = "return Angkasaja(event)" required />
						</div>
						<div class="form-group">
							<label>Jenis</label>
							<select class="form-control" name="kelompok_matakuliah">
								<option value="Kompetensi Utama">Kompetensi Utama</option>
								<option value="Kopetensi Pendukung">Kompetensi Pendukung</option>	
								<option value="Pilihan Keahlian">Pilihan Keahlian</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<?php
								$ruang_kelas = ["Ruang 1", "Ruang 2", "Ruang 3", "Ruang 4", "Ruang 5"];
								foreach ($ruang_kelas as $ruang) {
									// Mengecek apakah ini adalah opsi yang dipilih sebelumnya
									$selected = ($data['kelas'] == $ruang) ? "selected='selected'" : "";
									echo "<option value='$ruang' $selected>$ruang</option>";
								}
								?>
							</select>
						</div>

					
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<?php
									$query = "SELECT DISTINCT kelas FROM tbl_siswa";
									$sql = $pdo->prepare($query);
									$sql->execute();

									while ($data_siswa=$sql->fetch()) {
										?>
										<option value="<?php echo $data_siswa['kelas']; ?>"><?php echo $data_siswa['kelas']; ?></option>
										<?php
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