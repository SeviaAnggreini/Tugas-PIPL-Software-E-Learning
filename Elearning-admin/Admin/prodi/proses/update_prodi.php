<?php
	//include '../config/koneksi.php';

	$id_matakuliah = $_POST['id_matakuliah'];
	$nama_matakuliah = $_POST['nama_matakuliah'];
	$jml_jam_matakuliah = $_POST['jml_jam_matakuliah'];
	$kelompok_matakuliah = $_POST['kelompok_matakuliah'];
	$semester = $_POST['semester'];
	$kelas = $_POST['kelas'];

		$query = "UPDATE tbl_matakuliah SET  
										nama_matakuliah = '$nama_matakuliah', 
										jml_jam_matakuliah = '$jml_jam_matakuliah', 
										kelompok_matakuliah = '$kelompok_matakuliah', 
										semester = '$semester', 
										kelas = '$kelas'
										WHERE id_matakuliah = '$id_matakuliah'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
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
				setTimeout("location.href='?page=matakuliah&aksi=editdata_matakuliah&id=<?php echo $id_matakuliah;?>'", 1000);
			</script>
			<?php
		}	
		
?>