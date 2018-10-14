<form method="POST">
	<table>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td><input type="text" name="judul"></td>
		</tr>

		<tr>
			<td>Masukkan Postingan</td>
			<td>:</td>
			<td><textarea name="post" placeholder="Postingkan Sesuatu!"></textarea></td>
		</tr>

		<tr>
			<td>Unggah Gambar</td>
			<td>:</td>
			<td><input type="file" name="gbr"></td>
		</tr>

		<tr>
			<td><a href="halawal.php"> Halaman Awal </a>
				<input type="submit" name="up"></td>
		</tr>
	</table>
</form>


<?php 

error_reporting(0);
session_start();

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM posting WHERE id = '$id'";

	if ($koneksi->query($sql)) {
		$result = $koneksi->query($sql);
		$row = $result->fetch_assoc();
	}
}else{
	if (isset($_POST['up'])) {
		include 'koneksi.php';
		$query=mysqli_query($koneksi, "SELECT nim,nama FROM registrasi WHERE nim ='$_SESSION[nim]");
		$row=mysqli_fetch_Array($query);

			$nim =$row['nim'];
			$nama =$row['nama'];
			$judul =$_POST['judul'];
			$posting =$_POST['post'];
			$gambar -$_FILES["gbr"]["name"];

			if (!empty($judul)){
				if (!empty($posting)){
					if (str_word_count($posting)>=30){
						if (!empty($gambar)){
							$qry=$koneksi->query("INSERT INTO `posting` (`nim`, `nama`, `judul`, `posting`, `gambar`)
														VALUES ('$nim', '$nama', '$judul', '$posting', '$gambar')");

							echo "Berhasil Diupload";
						}else{
							echo "Harap Masukkan Gambar";
						}
					}else{
						echo "Postingan anda harus 30 kara";
					}
				}else{
					echo "Harap Memasukkan Postingan";
				}
			}else{
				echo "Harap Memasukkan Judul Anda";


			}
	}
}

 ?>