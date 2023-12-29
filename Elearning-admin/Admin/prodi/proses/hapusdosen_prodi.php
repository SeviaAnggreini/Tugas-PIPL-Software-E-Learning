<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];
	$matakuliah = $_GET['matakuliah'];

		$query = "DELETE FROM tbl_dosen_matakuliah WHERE id_dosen_matakuliah = '$id'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=matakuliah&aksi=dosen_matakuliah&id=<?php echo $matakuliah;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=matakuliah&aksi=dosen_matakuliah&id=<?php echo $matakuliah;?>'", 1000);
			</script>
			<?php
		}
		
?>