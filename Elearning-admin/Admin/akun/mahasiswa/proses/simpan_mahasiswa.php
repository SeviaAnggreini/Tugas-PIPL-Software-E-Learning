<?php
	//include '../config/koneksi.php';

	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$prodi = $_POST['prodi'];
	$angkatan = $_POST['angkatan'];
	$password = sha1($_POST['password']);
	$k_password = sha1($_POST['k_password']);
	$pass = $_POST['password'];
	$web = "https://akademik.rfpcode.id";
	$hak_akses = "Mahasiswa";

	if ($password == $k_password) {
		$query_mahasiswa = "SELECT * FROM tbl_mahasiswa WHERE nim = '$nim'";
        $sql_mahasiswa = $pdo->prepare($query_mahasiswa);
        $sql_mahasiswa->execute();
        $jml_data = $sql_mahasiswa->rowCount();
        if ($jml_data == 0) {
        	$query = "INSERT INTO tbl_mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telp, prodi, angkatan) VALUES ('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp', '$prodi', '$angkatan')";
			$sql = $pdo->prepare($query);
			$sql->execute();

			$query2 = "INSERT INTO tbl_akun (email, password, hak_akses, nip) VALUES ('$email', '$password', '$hak_akses', '$nim')";
			$sql2 = $pdo->prepare($query2);
			$sql2->execute();
			
			if($sql && $sql2){
				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
					setTimeout("location.href='?page=akun_mahasiswa&aksi=aktif'", 1000);
				</script>
				<?php
			}else{
				echo $query;
				?>
				<script type="text/javascript">
					alert('Data gagal tersimpan');
					setTimeout("location.href='?page=akun_mahasiswa&aksi=tambahdata_smahaiswa'", 1000);
				</script>
				<?php
			}
       	} 

        } else {
		?>
			<script type="text/javascript">
				alert('Password tidak cocok');
				setTimeout("location.href='?page=akun_mahasiswa&aksi=tambahdata_mahasiswa'", 1000);
			</script>
		<?php
	}
	
		
?>