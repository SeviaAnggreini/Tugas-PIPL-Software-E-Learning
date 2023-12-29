<?php
	$query = "SELECT * FROM tbl_prodi";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Prodi</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Prodi</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=matakuliah&aksi=updatedata_matakuliah" method="POST">
						<div class="form-group">
							<label>Prodi</label>
							<input type="hidden" class="form-control" name="prodi" value=prodi"<?php echo $data['prodi'];?>" required placeholder="Program Studi" required />
							<input class="form-control" name="prodi" required placeholder="Program Studi" value="<?php echo $data['prodi'];?>" required />
						</div>
						<div class="form-group">
						<label>Tahun</label>
							<input class="form-control" name="tahun" required placeholder="Periode Tahun" value="<?php echo $data['tahun'];?>" required />
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option value="Ganjil" <?php if ($data['semester']=="Ganjil") {echo "selected='selected'";}?>>Ganjil</option>
								<option value="Genap" <?php if ($data['semester']=="Genap") {echo "selected='selected'";}?>>Genap</option>								
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