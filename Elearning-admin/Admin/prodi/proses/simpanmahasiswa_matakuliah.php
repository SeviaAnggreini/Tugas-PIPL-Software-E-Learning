<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$id_prodi = $_POST['id_prodi'];


		$query_mahasiswa = "INSERT INTO tbl_mahasiswa_prodi (id_prodi, nim) VALUES ('$id_prodi', '$nim')";
		$sql = $pdo->prepare($query_mahasiswa);
		$sql->execute();
		
		if($sql){
			
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=prodi&aksi=mahasiswa_prodi&id=<?php echo $id_prodi;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=prodi&aksi=tambahdatamahasiswa_prodi&id=<?php echo $id_prodi;?>'", 1000);
			</script>
			<?php
		}		
?>