<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Kelas</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=matakuliah&aksi=simpandata_matakuliah" method="POST">
						<div class="form-group">
							<label>Kode Matakuliah</label>
							<input class="form-control" name="id_matakuliah" required placeholder="Kode Matakuliah" required />
						</div>
						<div class="form-group">
							<label>Matakuliah</label>
							<input class="form-control" name="nama_matakuliah" required placeholder="Matakuliah" required />							
						</div>
						<div class="form-group">
							<label>Nama Dosen</label>
							<select class="form-control" name="nama_dosen">
								<?php
									$query_dosen = "SELECT * FROM tbl_dosen_matakuliah INNER JOIN tbl_dosen ON tbl_dosen_matakuliah.nip = tbl_dosen.nip";
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
							<input class="form-control" name="sks" required placeholder="sks" onkeypress = "return Angkasaja(event)" required />
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
							<label>Hari</label>
							<select class="form-control" name="hari">
								<?php
								$ruang_kelas = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
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