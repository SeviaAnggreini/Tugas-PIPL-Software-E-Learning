<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_mahasiswa WHERE nim = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Mahasiswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><strong>Edit Mahasiswa</strong></h3>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6" >
					<form action="?page=akun_mahasiswa&aksi=updatedata_mahasiswa" method="POST">
						<div class="form-group">
							<label>Nama Mahasiswa</label>
							<input type="hidden" class="form-control" name="nim" value="<?php echo $data['nim'];?>" required placeholder="NIM Mahasiswa"/>
							<input class="form-control" name="nama_mahasiswa" value="<?php echo $data['nama_mahasiswa'];?>" required placeholder="Nama Mahasiswa"/>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?php if($data['jenis_kelamin']=="L"){ echo "checked"; }?>>
								<label class="form-check-label">Laki - laki</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?php if($data['jenis_kelamin']=="P"){ echo "checked"; }?>>
								<label class="form-check-label">Perempuan</label>
							</div>
						</div>
						<div class="form-group">
							<label>Tempat Lahir</label>
							<input class="form-control" name="tempat_lahir"  value="<?php echo $data['tempat_lahir'];?>"  required placeholder="tempat_lahir"/>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input class="form-control" type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>" required placeholder="tanggal_lahir"/>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" required placeholder="alamat"><?php echo $data['alamat'];?></textarea>
						</div>
						<div class="form-group">
							<label>No Telp</label>
							<input class="form-control" name="no_telp" required placeholder="no_telp" value="<?php echo $data['no_telp'];?>"  onkeypress = "return Angkasaja(event)"/>
						</div>
						<div class="form-group">
							<label>Program Studi</label>
							<?php if($data['prodi']=="Teknik Informatika"){ ?>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="prodi" value="Teknik Informatika" checked>
								<label class="form-check-label">TI</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="prodi" value="Teknik Elektro">
								<label class="form-check-label">TE</label>
							</div>
							<div class="form-check">
									<input class="form-check-input" type="radio" name="prodi" value="Teknik Perkapalan">
									<label class="form-check-label">TP</label>
								</div>
								<?php
							} else{
								?>
								<div class="form-check">
										<input class="form-check-input" type="radio" name="prodi" value="Teknik Informatika">
										<label class="form-check-label">TI</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="prodi" value="Teknik Elektro" checked>
										<label class="form-check-label">TE</label>
									</div>
								<div class="form-check">
											<input class="form-check-input" type="radio" name="prodi" value="Teknik Perkapalan" checked>
											<label class="form-check-label">TP</label>
										</div>
									<?php
								}
									?>
						</div>
						<div class="form-group">
							<label>Angkatan</label>
							<input class="form-control" name="angkatan"  value="<?php echo $data['angkatan'];?>"  required placeholder="angkatan"/>
						</div>

						<input type="submit" name="update" value="Update" class="btn btn-primary" style="margin-top:15px">
						<a class="btn btn-default" href="?page=akun_mahasiswa&aksi=detail_mahasiswa" style="margin-top:15px">Kembali</a>
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