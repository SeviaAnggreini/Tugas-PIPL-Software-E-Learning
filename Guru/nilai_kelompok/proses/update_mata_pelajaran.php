<?php
	//include '../config/koneksi.php';

	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$no_kelompok = $_POST['no_kelompok'];
	$nilai = $_POST['nilai'];

		$query = "UPDATE tbl_nilai_kel SET  
										nama_mahasiswa = '$nama_mahasiswa', 
										no_kelompok = '$no_kelompok',
										nilai = '$nilai'
										WHERE nama_mahasiswa = '$nama_mahasiswa'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=nilai_kelompok&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=nilai_kelompok&aksi=editdata_mata_pelajaran&id=<?php echo $id_mata_pelajaran;?>'", 1000);
			</script>
			<?php
		}	
		
?>