<!DOCTYPE html>
<html>
<head>
	<title>Tambah Program Studi</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Program Studi</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=matakuliah&aksi=simpandata_matakuliah" method="POST">
						<div class="form-group">
							<label>Prodi</label>
							<input class="form-control" name="prodi" required placeholder="Program Studi" required />
						</div>
						<div class="form-group">
							<label>Tahun</label>
							<input class="form-control" name="tahun" required placeholder="Tahun Periode" required />							
						</div>
						<div class="form-group">
							<label>Semester</label>
							<input class="form-control" name="semester" required placeholder="Semester" required />
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