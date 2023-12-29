<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id_prodi = $_GET['id'];

	$query = "SELECT * FROM tbl_mahasiswa INNER JOIN tbl_mahasiswa_prodi ON tbl_mahasiswa.nim = tbl_mahasiswa_prodi.nim INNER JOIN tbl_prodi ON tbl_mahasiswa_prodi.id_prodi = tbl_prodi.id_prodi WHERE tbl_mahasiswa_prodi.semester = 'Ganjil' LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mata Pelajaran</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Prodi Mahasiswa</strong>
			<!-- <a class="btn btn-primary" href="?page=matakuliah&aksi=tambahdatamahasiswa_prodi&id=<?php echo $id_prodi;?>">Tambah Data</a> -->
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
								<th>Program Studi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<td><?php echo $data['nim'];?></td>
									<td><?php echo $data['nama_mahasiswa'];?></td>
									<td>
										<?php 
											$id_prodi = $data['id_prodi'];
											$query_prodi = "SELECT * FROM tbl_prodi WHERE id_prodi = '$id_prodi'";
											$sql_prodi = $pdo->prepare($query_prodi);
											$sql_prodi->execute();
											$data_prodi = $sql_prodi->fetch();
											echo $data_prodi['prodi'];
										?></td>
									<td>								
								</tbody>
								<?php
							}
						?>	

						</table>	
				</div>
			</div>
		</div>
		<ul class="pagination pagination-sm m-0 float-right">
				<!-- LINK FIRST AND PREV -->
				<?php
				if($hal == 1){ // Jika hal adalah hal ke 1, maka disable link PREV
				?>
					<li class="page-item" class="disabled"><a class="page-link" href="#">First</a></li>
					<li class="page-item" class="disabled"><a class="page-link" href="#">&laquo;</a></li>
				<?php
				}else{ // Jika hal bukan hal ke 1
					$link_prev = ($hal > 1)? $hal - 1 : 1;
				?>
					<li class="page-item"><a class="page-link" href="?page=matakuliah&aksi=aktif&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=matakuliah&aksi=aktif&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_matakuliah");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=matakuliah&aksi=aktif&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php
				}
				?>
				
				<!-- LINK NEXT AND LAST -->
				<?php
				// Jika hal sama dengan jumlah hal, maka disable link NEXT nya
				// Artinya hal tersebut adalah hal terakhir 
				if($hal == $jumlah_hal){ // Jika hal terakhir
				?>
					<li class="disabled"><a class="page-link" href="#">&raquo;</a></li>
					<li class="disabled"><a class="page-link" href="#">Last</a></li>
				<?php
				}else{ // Jika Bukan hal terakhir
					$link_next = ($hal < $jumlah_hal)? $hal + 1 : $jumlah_hal;
				?>
					<li class="page-item"><a class="page-link" href="?page=matakuliah&aksi=aktif&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=matakuliah&aksi=aktif&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>