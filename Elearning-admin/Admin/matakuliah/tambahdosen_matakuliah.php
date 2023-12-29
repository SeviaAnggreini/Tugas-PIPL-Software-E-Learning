<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Dosen Matakuliah</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=matakuliah&aksi=simpandatadosen_matakuliah" method="POST">
						<div class="form-group">
							<label>Nama Dosen</label>
							<?php $matakuliah = $_GET['id']?>
							<input type="hidden" name="id_matakuliah" value="<?php echo $matakuliah;?>">
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