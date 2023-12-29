<?php 
	// menghubungkan dengan library excel reader
	require "../Config/vendor/autoload.php";

	// Include librari PhpSpreadsheet
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

	// upload file xls
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$target = "excel/".$_FILES['file']['name'].".".$ext;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);

	echo $target."<BR>";


	// mengambil isi file xls
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$spreadsheet = $reader->load($target); // Load file yang tadi diupload ke folder tmp
	$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	// jumlah default data yang berhasil di import
	$berhasil = 0;
	$jumlah_baris = 0;

	foreach ($sheet as $data){
		if($data['A'] != "" && $data['B'] != "" && $data['C'] != "" && $data['D'] != "" && $data['E'] != "" && $data['F'] != "" && $data['G'] != "" && $data['H'] != "" && $data['I'] != ""){
			$jumlah_baris++;
		}
	}

	$jumlah_baris = $jumlah_baris - 1;

	foreach ($sheet as $data){

		// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
		$nim 			= $data['A'];
		$nama_mahasiswa	= $data['B'];
		$jenis_kelamin	= $data['C'];
		$tempat_lahir	= $data['D'];
		$tanggal_lahir	= $data['E'];
		$alamat			= $data['F'];
		$no_telp		= $data['G'];
		$email			= $data['H'];
		$prodi			= $data['I'];
		$password		= sha1("mahasiswaskr76");
		$pass = "mahasiswaskr76";
		$web = "https://akademik.rfpcode.id";
		$hak_akses		= "Mahasiswa";

		if($nim == "NIS" && $nama_mahasiswa == "Nama Mahasiswa" && $jenis_kelamin == "Jenis Kelamin" && $tempat_lahir == "Tempat Lahir" && $tanggal_lahir == "Tanggal Lahir" && $alamat == "Alamat" && $no_telp == "No Telp" && $email == "Email" && $prodi == "Kelas"){
			continue;
		} else if($nim != "" && $nama_mahasiswa != "" && $jenis_kelamin != "" && $tempat_lahir != "" && $tanggal_lahir != "" && $alamat != "" && $no_telp != "" && $email != "" && $prodi != ""){
			// input data ke database (table data_pegawai)
			$query = "INSERT INTO tbl_mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telp, prodi) VALUES ('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp', '$prodi')";
			$sql = $pdo->prepare($query);
			$sql->execute();

			$query2 = "INSERT INTO tbl_akun (email, password, hak_akses, nip) VALUES ('$email', '$password', '$hak_akses', '$nim')";
			$sql2 = $pdo->prepare($query2);
			$sql2->execute();
			
			$berhasil++;

			$judul = "Akun E-Learning Akademik";
			$pesan = "<H4>Akun E-Learning Akademik</H4><br>Telah terdaftar Akun Baru dengan : <br>NIS : ".$nim."<br>Nama Lengkap : ".$nama_mahasiswa."<br>Kelas : ".$prodi."<br>Username : ".$email."<br>Password : ".$pass."<br>Website : ".$web."<br><br>Silahkan digunakan untuk masuk ke Website.<br>Terimakasih.<br><br>TTD<br>E-Learning Akademik APLIKASI PENDIDIKAN";
			kirim_email($email, $nama_mahasiswa, $judul, $pesan);
		}
	}

	echo "Jumlah Baris : ".$jumlah_baris."<br>Berhasil : ".$berhasil;
	// hapus kembali file .xls yang di upload tadi
	unlink($target);

	if($berhasil == $jumlah_baris){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan');
				setTimeout("location.href='?page=akun_mahasiswa&aksi=aktif'", 1000);
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=akun_mahasiswa&aksi=import_mahasiswa'", 1000);
			</script>
			<?php
		}
?>