<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id = $_GET['id'];
	$query = "SELECT * FROM tbl_siswa WHERE nis = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pribadi</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
				<h3>
					<strong>Data Pribadi</strong>
				</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama Siswa</th>
								<th>Jenis Kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th colspan="1">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['nis'];?></td>
										<td><?php echo $data['nama_siswa'];?></td>
										<td><?php echo $data['jenis_kelamin'];?></td>
										<td><?php echo $data['tempat_lahir'];?></td>
										<td><?php echo $data['tanggal_lahir'];?></td>
										<td><?php echo $data['alamat'];?></td>
										<td><?php echo $data['no_telp'];?></td>
										<td><a class="btn btn-warning" href="?page=akun_siswa&aksi=editdata_siswa&id=<?php echo $data['nis'];?>">Edit</a></td>
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