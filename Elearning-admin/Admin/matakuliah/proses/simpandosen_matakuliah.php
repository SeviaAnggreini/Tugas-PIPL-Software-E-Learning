<?php
	//include '../config/koneksi.php';

	$nip = $_POST['nip'];
	$id_matakuliah = $_POST['id_matakuliah'];


		$query_dosen = "INSERT INTO tbl_dosen_matakuliah (id_matakuliah, nip) VALUES ('$id_matakuliah', '$nip')";
		$sql = $pdo->prepare($query_dosen);
		$sql->execute();
		
		if($sql){
			
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=matakuliah&aksi=dosen_matakuliah&id=<?php echo $id_matakuliah;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=matakuliah&aksi=tambahdatadosen_matakuliah&id=<?php echo $id_matakuliah;?>'", 1000);
			</script>
			<?php
		}		
?>