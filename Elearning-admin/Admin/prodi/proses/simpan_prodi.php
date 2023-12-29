<?php
	//include '../config/koneksi.php';

	$nip = $_POST['nip'];
	$nama_matakuliah = $_POST['nama_matakuliah'];
	$jml_jam_matakuliah = $_POST['jml_jam_matakuliah'];
	$kelompok_matakuliah = $_POST['kelompok_matakuliah'];
	$semester = $_POST['semester'];
	$kelas = $_POST['kelas'];

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(id_matakuliah) as kodeTerbesar FROM tbl_matakuliah";
	$sql_id = $pdo->prepare($query_id);
	$sql_id->execute();
	$data = $sql_id->fetch();
	$kode = $data['kodeTerbesar'];
	 
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
	$id_matakuliah = $huruf . sprintf("%05s", $urutan);

		$query = "INSERT INTO tbl_matakuliah (id_matakuliah, nama_matakuliah, jml_jam_matakuliah, kelompok_matakuliah, semester, kelas) VALUES ('$id_matakuliah', '$nama_matakuliah', '$jml_jam_matakuliah', '$kelompok_matakuliah', '$semester', '$kelas')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			$query_dosen = "INSERT INTO tbl_dosen_matakuliah (id_matakuliah, nip) VALUES ('$id_matakuliah', '$nip')";
			$sql2 = $pdo->prepare($query_dosen);
			$sql2->execute();
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=matakuliah&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=matakuliah&aksi=tambahdata_matakuliah'", 1000);
			</script>
			<?php
		}		
?>