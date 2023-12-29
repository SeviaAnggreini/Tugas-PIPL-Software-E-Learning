<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 6; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$query = "SELECT * FROM tbl_nilai_akhir LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mata Kuliah</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Nilai Akhir</strong>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>Nama Mata Kuliah</th>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>nilai</th>
								<th>Sks</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['nama_mata_pelajaran'];?></td>
										<td><?php echo $data['nim'];?></td>
										<td><?php echo $data['nama_mahasiswa'];?></td>
										<td><?php echo $data['nilai'];?></td>
										<td><?php echo $data['jml_jam_mata_pelajaran'];?></td>
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