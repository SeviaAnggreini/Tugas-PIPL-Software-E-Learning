<?php
	//include '../config/koneksi.php';

	$id_matakuliah = $_POST['id_matakuliah'];
	$nama_matakuliah = $_POST['nama_matakuliah'];
	$sks = $_POST['sks'];
	$semester = $_POST['semester'];
	$kelas = $_POST['kelas'];
	$hari = $_POST['hari'];

		$query = "UPDATE tbl_matakuliah SET  
										nama_matakuliah = '$nama_matakuliah', 
										sks = '$sks', 
										semester = '$semester', 
										kelas = '$kelas',
										hari = '$hari'
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