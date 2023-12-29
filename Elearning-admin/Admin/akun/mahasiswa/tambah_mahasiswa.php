<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mahasiswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Tambah Mahasiswa</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_mahasiswa&aksi=simpandata_mahasiswa" method="POST">
						<div class="form-group">
							<label>NIM</label>
							<input class="form-control" name="nim" autofocus="" required placeholder="NIM" onkeypress = "return Angkasaja(event)"/>
						</div>
						<div class="form-group">
							<label>Nama Mahasiswa</label>
							<input class="form-control" name="nama_mahasiswa" required placeholder="Nama Mahasiswa"  required />
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
						<label>Program Studi</label>
						<select class="form-control" name="prodi">
							<?php
							$ruang_kelas = ["Teknik Informatika", "Teknik Elektro", "Teknik Perkapalan"];
							foreach ($ruang_kelas as $ruang) {
								// Mengecek apakah ini adalah opsi yang dipilih sebelumnya
								$selected = ($data['prodi'] == $ruang) ? "selected='selected'" : "";
								echo "<option value='$ruang' $selected>$ruang</option>";
							}
							?>
						</select>
						</div>
						<div class="form-group">
							<label>Angkatan</label>
							<input class="form-control" name="angkatan" required placeholder="Angkatan"  required />
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
						<a class="btn btn-default" href="?page=akun_mahasiswa&aksi=aktif" style="margin-top:15px">Kembali</a>
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