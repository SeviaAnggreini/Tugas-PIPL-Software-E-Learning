<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_mata_pelajaran WHERE id_mata_pelajaran = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit MataKuliah</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit MataKuliah</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=mata_pelajaran&aksi=updatedata_mata_pelajaran" method="POST">
						<div class="form-group">
							<label>Nama MataKuliah</label>
							<input type="hidden" class="form-control" name="id_mata_pelajaran" value="<?php echo $data['id_mata_pelajaran'];?>" required placeholder="Nama Mata Pelajaran" required />
							<input class="form-control" name="nama_mata_pelajaran" required placeholder="Nama Mata Pelajaran" value="<?php echo $data['nama_mata_pelajaran'];?>" required />
						</div>
						<div class="form-group">
						<label>SKS</label>
							<input class="form-control" name="jml_jam_mata_pelajaran" required placeholder="Jumlah SKS" onkeypress = "return Angkasaja(event)"  value="<?php echo $data['jml_jam_mata_pelajaran'];?>" required />
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option value="1" <?php if ($data['semester']=="1") { echo "selected='selected'"; }?>>Ganjil</option>
								<option value="2" <?php if ($data['semester']=="2") { echo "selected='selected'"; }?>>Genap</option>	
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
										<option value="<?php echo $data_siswa['kelas']; ?>" <?php if ($data['kelas']==$data_siswa['kelas']) { echo "selected='selected'"; } ?>><?php echo $data_siswa['kelas']; ?></option>
										<?php
									}
								?>
							</select>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=mata_pelajaran&aksi=aktif" style="margin-top:15px">Kembali</a>
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