<?php
	//include '../config/koneksi.php';

	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$no_kelompok = $_POST['no_kelompok'];
	$nilai = $_POST['nilai'];

	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kode, 3, 5);
	 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
	 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "MP-";
	$nama_mahasiswa = $huruf . sprintf("%05s", $urutan);

		$query = "INSERT INTO tbl_nilai_kel (nama_mahasiswa, no_kelompok, nilai) VALUES ('$nama_mahasiswa', '$no_kelompok', '$nilai')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			$query_guru = "INSERT INTO tbl_guru_mapel (id_mata_pelajaran, nip) VALUES ('$id_mata_pelajaran', '$nip')";
			$sql2 = $pdo->prepare($query_guru);
			$sql2->execute();
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=mata_pelajaran&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=nilai_kelompok&aksi=aktif'", 1000);
			</script>
			<?php
		}		
?>