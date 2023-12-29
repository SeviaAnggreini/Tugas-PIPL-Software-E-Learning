<?php
	//include '../config/koneksi.php';

	$id = $_GET['id'];

		$query = "DELETE FROM tbl_matakuliah WHERE id_matakuliah = '$id'";
		$sql = $pdo->prepare($query);
		$sql->execute();

		$query2 = "DELETE FROM tbl_dosen_matakuliah WHERE id_matakuliah = '$id'";
		$sql2 = $pdo->prepare($query2);
		$sql2->execute();
		
		if($sql && $sql2){
			?>
			<script type="text/javascript">
				alert('Data telah terhapus');
				setTimeout("location.href='?page=matakuliah&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal terhapus');
				setTimeout("location.href='?page=matakuliah&aksi=aktif'", 1000);
			</script>
			<?php
		}
		
?>