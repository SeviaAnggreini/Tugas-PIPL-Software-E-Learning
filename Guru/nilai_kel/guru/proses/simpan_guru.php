<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$no_kelompok = $_POST['no_kelompok'];
	$nilai = $_POST['nilai'];

		$query = "INSERT INTO tbl_nilai_kel (nim, nama_mahasiswa, no_kelompok, nilai) VALUES ('$nim', '$nama_mahasiswa', '$no_kelompok', '$nilai')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
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
				setTimeout("location.href='?page=mata_pelajaran&aksi=tambahdata_mata_pelajaran'", 1000);
			</script>
			<?php
		}		
?>