<?php
	//include '../config/koneksi.php';

	//$id = $_GET['id'];

		$query = "
					DELETE FROM tbl_matakuliah;
					DELETE FROM tbl_dosen_matakuliah;
					DELETE FROM tbl_tugas_matakuliah;
					DELETE FROM tbl_kumpul_tugas;
					DELETE FROM tbl_materi_matakuliah;
					DELETE FROM tbl_absensi_matakuliah;
					DELETE FROM tbl_nilai_matakuliah;
					DELETE FROM tbl_lembar_ujian;
					DELETE FROM tbl_lk_matakuliah;
					DELETE FROM tbl_bank_soal;
					DELETE FROM tbl_jadwal_ujian;
					DELETE FROM tbl_jawaban_ujian;
				";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
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