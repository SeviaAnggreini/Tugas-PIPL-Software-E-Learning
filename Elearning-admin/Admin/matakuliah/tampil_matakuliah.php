<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$query = "SELECT * FROM tbl_matakuliah LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kelas</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Data Kelas</strong>
			<a class="btn btn-primary" href="?page=matakuliah&aksi=tambahdata_matakuliah">Tambah Data</a>
			<a class="btn btn-danger" href="?page=matakuliah&aksi=hapussemua_matakuliah" onclick="return confirm('Anda akan menghapus semua data ini?')">Hapus Semua Data</a>
		</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped">
						<thead>
							<tr>
								<th>Kode Matakuliah</th>
								<th>Matakuliah</th>
								<th>Nama Dosen</th>
								<th>SKS</th>
								<th>Semester</th>
								<th>Ruang</th>
								<th>Hari</th>
								<th colspan="4">Aksi</th>
							</tr>
						</thead>
						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<td><?php echo $data['id_matakuliah'];?></td>
										<td><?php echo $data['nama_matakuliah'];?></td>
										<td>
											<?php 
												$id_matakuliah = $data['id_matakuliah'];
												$query_matakuliah = "SELECT * FROM tbl_dosen_matakuliah WHERE id_matakuliah = '$id_matakuliah'";
												$sql_matakuliah = $pdo->prepare($query_matakuliah);
												$sql_matakuliah->execute();
												$jml = $sql_matakuliah->rowCount();
												$no = 0;
												while($data_matakuliah = $sql_matakuliah->fetch()){
													$nip = $data_matakuliah['nip'];
													$query_dosen = "SELECT * FROM tbl_dosen WHERE nip = $nip";
													$sql_dosen = $pdo->prepare($query_dosen);
													$sql_dosen->execute();
													$data_dosen = $sql_dosen->fetch();
													if ($no == 0) {
														echo $data_dosen['nama_dosen'];
														$no++;
													} else if ($no < $jml) {
														echo " - ".$data_dosen['nama_dosen'];
														$no++;
													} else {
														echo " - ".$data_dosen['nama_dosen'];
														$no++;
													}
												}
											?>
										</td>
										<td><?php echo $data['sks'];?></td>
										<td><?php echo $data['semester'];?></td>
										<td><?php echo $data['kelas'];?></td>
										<td><?php echo $data['hari'];?></td>
										<td><a class="btn btn-success" href="?page=matakuliah&aksi=dosen_matakuliah&id=<?php echo $data['id_matakuliah'];?>">Lihat Daftar Dosen</a></td>										
										<td><a class="btn btn-warning" href="?page=matakuliah&aksi=editdata_matakuliah&id=<?php echo $data['id_matakuliah'];?>">Edit</a></td>
										<td><a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=matakuliah&aksi=hapusdata_matakuliah&id=<?php echo $data['id_matakuliah'];?>">Delete</a></td>
									</tr>
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