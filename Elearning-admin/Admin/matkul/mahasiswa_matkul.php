<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$id_matakuliah = $_GET['id'];

	$query = "SELECT * FROM tbl_matakuliah INNER JOIN tbl_mahasiswa_matakuliah ON tbl_matakuliah.id_matakuliah = tbl_mahasiswa_matakuliah.id_matakuliah INNER JOIN tbl_mahasiswa ON tbl_mahasiswa_matakulah.nim = tbl_mahasiswa_nim LIMIT ".$limit_start.",".$limit;
	$sql = $pdo->prepare($query);
	$sql->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pribadi Mahasiswa</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
				<h3>
					<strong>Data Pribadi Mahasiswa</strong>
					<a class="btn btn-primary" href="?page=matkul&aksi=tambahdata_matkul">Tambah Data</a>
					<a class="btn btn-danger" href="?page=matkul&aksi=hapussemua_matkul" onclick="return confirm('Anda akan menghapus semua data ini?')">Hapus Semua Data</a>
				</h3>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
							<table id="cari" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Kode Matakuliah</th>
								<th>Nama Matakuliah</th>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Aksi</th>
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
												$nim = $data['nim'];
												$query_matakuliah = "SELECT * FROM tbl_mahasiswa_matakuliah WHERE nim = '$nim'";
												$sql_matakuliah = $pdo->prepare($query_matakuliah);
												$sql_matakuliah->execute();
												$data_matakuliah = $sql_matakuliah->fetch();
												echo $data_matakuliah['nim'];
											?>
										</td>
										<td>
											<?php 
												$nim = $data['mim'];
												$query_matakuliah = "SELECT * FROM tbl_mahasiswa WHERE nim = '$nim'";
												$sql_matakuliah = $pdo->prepare($query_matakuliah);
												$sql_matakuliah->execute();
												$data_matakuliah = $sql_matakuliah->fetch();
												echo $data_matakuliah['nama_mahasiswa'];
											?>
										</td>
										<td><a class="btn btn-warning" href="?page=mahasiswa_matkul&aksi=mahasiswa_matkul&id=id_matakuliah<?php echo $data['id_matakuliah'];?>">Detail</a> | <a onclick="return confirm('Anda akan mengganti password akun ini?')" class="btn btn-danger" href="?page=matkul&aksi=editpassword_mahasiswa&id=<?php echo $data['email'];?>">Ganti Sandi</a></td>
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
					<li class="page-item"><a class="page-link" href="?page=matkul&aksi=aktif&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=matkul=aktif&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_mahasiswa_matakuliah");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=matkul&aksi=aktif&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=matkul&aksi=aktif&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=amatkul&aksi=aktif&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>