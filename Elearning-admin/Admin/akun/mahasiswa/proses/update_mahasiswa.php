<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$prodi = $_POST['prodi'];
	$angkatan = $_POST['angkatan'];

		$query = "UPDATE tbl_mahasiswa SET  
										nama_mahasiswa = '$nama_mahasiswa', 
										jenis_kelamin = '$jenis_kelamin', 
										tempat_lahir = '$tempat_lahir', 
										tanggal_lahir = '$tanggal_lahir', 
										alamat = '$alamat', 
										no_telp = '$no_telp',
										prodi = '$prodi',
										angkatan = '$angkatan'
										WHERE nim = '$nim'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=akun_mahasiswa&aksi=detail_mahasiswa&id=<?php echo $nim;?>'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_mahasiswa&aksi=editdata_mahasiswa&id=<?php echo $nim;?>'", 1000);
			</script>
			<?php
		}	
		
?>