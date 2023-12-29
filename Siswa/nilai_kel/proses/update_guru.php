<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$aktif = $_POST['aktif'];
	$kolaborasi = $_POST['kolaborasi'];
	$kontribusi = $_POST['kontribusi'];
	$sikap = $_POST['sikap'];

		$query = "UPDATE tbl_kinerja_kelompok SET 
											nama_mahasiswa = '$nama_mahasiswa', 
											aktif = '$aktif',
											kolaborasi = '$kolaborasi',
											kontribusi = '$kontribusi',
											sikap = '$sikap'
											WHERE nim = '$nim'";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=nilai_kel&aksi=tampil_kinerja'", 1000);
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