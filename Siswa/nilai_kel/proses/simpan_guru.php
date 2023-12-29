<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$aktif = $_POST['aktif'];
	$kolaborasi = $_POST['kolaborasi'];
	$kontribusi = $_POST['kontribusi'];
	$sikap = $_POST['sikap'];

		$query = "INSERT INTO tbl_kinerja_kelompok (nim, nama_mahasiswa, aktif, kolaborasi, kontribusi, sikap) VALUES ('$nim', '$nama_mahasiswa', '$aktif', '$kolaborasi','$kontribusi', '$sikap')";
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
				setTimeout("location.href='?page=mata_pelajaran&aksi=tambahdata_mata_pelajaran'", 1000);
			</script>
			<?php
		}		
?>