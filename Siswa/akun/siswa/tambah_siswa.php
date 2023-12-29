<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Siswa</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_siswa&aksi=simpandata_siswa" method="POST">
						<div class="form-group">
							<label>NIS</label>
							<input class="form-control" name="nis" autofocus="" required placeholder="NIS" onkeypress = "return Angkasaja(event)"/>
						</div>
						<div class="form-group">
							<label>Nama Siswa</label>
							<input class="form-control" name="nama_siswa" required placeholder="Nama Siswa"  required />
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<div class="form-check">
	                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="L">
	                          <label class="form-check-label">Laki - laki</label>
	                        </div>
	                        <div class="form-check">
	                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
	                          <label class="form-check-label">Perempuan</label>
	                        </div>
						</div>
						<div class="form-group">
							<label>Tempat Lahir</label>
							<input class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir"/>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="date" class="form-control" name="tanggal_lahir" required placeholder="Tanggal Lahir"/>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" required placeholder="alamat"></textarea>
						</div>
						<div class="form-group">
							<label>No Telp</label>
							<input class="form-control" name="no_telp" required placeholder="No Telp" onkeypress = "return Angkasaja(event)"/>
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
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" required placeholder="Email"/>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" required placeholder="Password"/>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password</label>
							<input type="password" class="form-control" name="k_password" required placeholder="Konfirmasi Password"/>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=akun_siswa&aksi=aktif" style="margin-top:15px">Kembali</a>
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