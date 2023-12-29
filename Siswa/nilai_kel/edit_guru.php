<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_kinerja_kelompok WHERE nim = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Nilai Kelompok</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Nilai Kelompok</strong></h3>
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
							<label>Keaktifan</label>
							<select class="form-control" name="aktif">
								<option value="1" <?php if ($data['aktif']=="1") { echo "selected='selected'"; }?>>1</option>
								<option value="2" <?php if ($data['aktif']=="2") { echo "selected='selected'"; }?>>2</option>
								<option value="3" <?php if ($data['aktif']=="3") { echo "selected='selected'"; }?>>3</option>
								<option value="4" <?php if ($data['aktif']=="4") { echo "selected='selected'"; }?>>4</option>	
							</select>
						</div>
						<div class="form-group">
							<label>Kontribusi</label>
							<select class="form-control" name="kontribusi">
								<option value="1" <?php if ($data['kontribusi']=="1") { echo "selected='selected'"; }?>>1</option>
								<option value="2" <?php if ($data['kontribusi']=="2") { echo "selected='selected'"; }?>>2</option>
								<option value="3" <?php if ($data['kontribusi']=="3") { echo "selected='selected'"; }?>>3</option>
								<option value="4" <?php if ($data['kontribusi']=="4") { echo "selected='selected'"; }?>>4</option>	
							</select>
						</div>
						<div class="form-group">
							<label>Kolaborasi</label>
							<select class="form-control" name="kolaborasi">
								<option value="1" <?php if ($data['kolaborasi']=="1") { echo "selected='selected'"; }?>>1</option>
								<option value="2" <?php if ($data['kolaborasi']=="2") { echo "selected='selected'"; }?>>2</option>
								<option value="3" <?php if ($data['kolaborasi']=="3") { echo "selected='selected'"; }?>>3</option>
								<option value="4" <?php if ($data['kolaborasi']=="4") { echo "selected='selected'"; }?>>4</option>	
							</select>
						</div>
						<div class="form-group">
							<label>Sikap</label>
							<select class="form-control" name="sikap">
								<option value="1" <?php if ($data['sikap']=="1") { echo "selected='selected'"; }?>>1</option>
								<option value="2" <?php if ($data['sikap']=="2") { echo "selected='selected'"; }?>>2</option>
								<option value="3" <?php if ($data['sikap']=="3") { echo "selected='selected'"; }?>>3</option>
								<option value="4" <?php if ($data['sikap']=="4") { echo "selected='selected'"; }?>>4</option>	
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