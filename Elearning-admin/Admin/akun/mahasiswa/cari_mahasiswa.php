<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

    $cari = $_POST['nama_mahasiswa'];

	$query = "SELECT * FROM tbl_akun INNER JOIN tbl_mahasiswa ON tbl_akun.nip = tbl_mahasiswa.nim WHERE tbl_akun.hak_akses = 'Mahasiswa' AND tbl_mahasiswa.nama_mahasiswa LIKE '%$cari%' ORDER BY tbl_mahasiswa.prodi ASC, tbl_mahasiswa.nim ASC";
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
				<h3>
					<strong>Data Mahasiswa</strong>
					<a class="btn btn-primary" href="?page=akun_mahasiswa&aksi=tambahdata_mahasiswa">Tambah Data</a>
					<a class="btn btn-danger" href="?page=akun_mahasiswa&aksi=hapussemua_akun" onclick="return confirm('Anda akan menghapus semua data ini?')">Hapus Semua Data</a>
					<div class="pull-right">
						<form action="?page=akun_mahasiswa&aksi=cari_mahasiswa" method="POST">
							<div class="input-group input-group-sm">
							<input type="search" name="nama_mahasiswa" required placeholder="Nama Mahasiswa" style="height:30px; width:200px; box-sizing: border-box; border-radius: 4px;">
							<span class="input-group-append">
								<button type="button" name="cari" class="btn btn-info btn-flat">Cari</button>
							</span>
							</div>
						</form>
					</div>
				</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
							<table id="cari" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Email</th>
								<th>Nama Mahasiswa</th>
								<th>Hak Akses</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['email'];?></td>
										<td><?php echo $data['nama_mahasiswa'];?></td>
										<td><?php echo $data['hak_akses'];?></td>
										<td><a class="btn btn-warning" href="?page=akun_mahasiswa&aksi=detail_mahasiswa&id=<?php echo $data['nip'];?>">Detail</a> | <a onclick="return confirm('Anda akan mengganti password akun ini?')" class="btn btn-danger" href="?page=akun_mahasiswa&aksi=editpassword_mahasiswa&id=<?php echo $data['email'];?>">Ganti Sandi</a></td>
									</tr>
								</tbody>
								<?php
							}
						?>	

						</table>	
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>