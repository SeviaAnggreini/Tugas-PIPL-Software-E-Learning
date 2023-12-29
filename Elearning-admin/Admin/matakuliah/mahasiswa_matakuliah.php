<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$nim = $_GET['nim'];

	$query = "SELECT * FROM tbl_matakuliah INNER JOIN tbl_mahasiswa_matakuliah ON tbl_matakuliah.id_matakuliah = tbl_mahasiswa_matakuliah.id_matakuliah INNER JOIN tbl_mahasiswa ON tbl_mahasiswa_matakuliah.nim = tbl_mahasiswa.nim LIMIT ".$limit_start.",".$limit;
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
										<td><?php echo $data['nim'];?></td>
										<td><?php echo $data['nama_mahasiswa'];?></td>
										<td><a class="btn btn-warning" href="?page=akun_mahasiswa&aksi=detail_mahasiswa&id=<?php echo $data['nim'];?>">Detail</a> | <a onclick="return confirm('Anda akan mengganti password akun ini?')" class="btn btn-danger" href="?page=akun_mahasiswa&aksi=editpassword_mahasiswa&id=<?php echo $data['email'];?>">Ganti Sandi</a></td>
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
					<li class="page-item"><a class="page-link" href="?page=akun_mahasiswa&aksi=aktif&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=akun_mahasiswa&aksi=aktif&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tbl_akun INNER JOIN tbl_mahasiswa ON tbl_akun.nip = tbl_mahasiswa.nim WHERE tbl_akun.hak_akses = 'Mahasiswa' ORDER BY tbl_mahasiswa.nim ASC, tbl_mahasiswa.prodi ASC");
				$sql2->execute(); // Eksekusi querynya
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=akun_mahasiswa&aksi=aktif&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
					<li class="page-item"><a class="page-link" href="?page=akun_mahasiswa&aksi=aktif&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=akun_mahasiswa&aksi=aktif&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>