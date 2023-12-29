<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_nilai_kel WHERE nim = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Nilai Akhir</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Nilai Akhir</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=nilai_kel&aksi=updatedata_guru" method="POST">
					<div class="form-group">
							<label>NIM</label>
							<input type="hidden" class="form-control" name="nim" value="<?php echo $data['nim'];?>" required placeholder="NIM" required />
							<input class="form-control" name="nim" required placeholder="NIM" value="<?php echo $data['nim'];?>" required />
						</div>
						<div class="form-group">
							<label>Nama Mahasiswa</label>
							<input type="hidden" class="form-control" name="nama_mahasiswa" value="<?php echo $data['nama_mahasiswa'];?>" required placeholder="Nama Mahasiswa" required />
							<input class="form-control" name="nama_mahasiswa" required placeholder="Nama Mahasiswa" value="<?php echo $data['nama_mahasiswa'];?>" required />
						</div>
						<div class="form-group">
							<label>No. kelompok</label>
							<select class="form-control" name="no_kelompok">
								<option value="1" <?php if ($data['no_kelompok']=="1") { echo "selected='selected'"; }?>>1</option>
								<option value="2" <?php if ($data['no_kelompok']=="2") { echo "selected='selected'"; }?>>2</option>
								<option value="3" <?php if ($data['no_kelompok']=="3") { echo "selected='selected'"; }?>>3</option>	
							</select>
						</div>
						<div class="form-group">
							<label>Nilai</label>
							<select class="form-control" name="nilai">
								<option value="A" <?php if ($data['nilai']=="A") { echo "selected='selected'"; }?>>A</option>
								<option value="B" <?php if ($data['nilai']=="B") { echo "selected='selected'"; }?>>B</option>
								<option value="C" <?php if ($data['nilai']=="C") { echo "selected='selected'"; }?>>C</option>
								<option value="D" <?php if ($data['nilai']=="D") { echo "selected='selected'"; }?>>D</option>
								<option value="E" <?php if ($data['nilai']=="E") { echo "selected='selected'"; }?>>E</option>	
							</select>
						</div>
					
						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=nilai_kel&aksi=aktif" style="margin-top:15px">Kembali</a>
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