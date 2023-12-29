<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$no_kelompok = $_POST['no_kelompok'];
	$nilai = $_POST['nilai'];

		$query = "UPDATE tbl_nilai_kel SET 
											nama_mahasiswa = '$nama_mahasiswa', 
											no_kelompok = '$no_kelompok', 
											nilai = '$nilai' 
											WHERE nim = '$nim'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=nilai_kel&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_guru&aksi=editdata_guru&id=<?php echo $nip;?>'", 1000);
			</script>
			<?php
		}	
		
?>