<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 6; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$query = "SELECT * FROM tbl_kinerja_kelompok LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nilai Kelompok</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Nilai Kinerja</strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Keaktifan</th>
								<th>Kontribusi</th>
								<th>Kolaborasi</th>
								<th>Sikap</th>
								<th colspan="1">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['nim'];?></td>
										<td><?php echo $data['nama_mahasiswa'];?></td>
										<td><?php echo $data['aktif'];?></td>
										<td><?php echo $data['kontribusi'];?></td>
										<td><?php echo $data['kolaborasi'];?></td>
										<td><?php echo $data['sikap'];?></td>
										<td><a class="btn btn-warning" href="?page=nilai_kel&aksi=editdata_guru&id=<?php echo $data['nim'];?>">Edit</a></td>
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