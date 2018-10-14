<form method="POST">

	<table>
		<tr>
			<td>Nim</td>
			<td>:</td>
			<td><input type="number" name="nim" length="10"></td>
		</tr>

		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="pass"></td>
		</tr>

		<tr>
			<td><input type="submit" name="kirim" value="kirim"></td>
		</tr>

	</table>
</form>

<?php 
error_reporting(0);
	if (isset($_POST['kirim'])) {
		session_start();
		include 'koneksi.php';

		$nim = $_POST['nim'];
		$pass = $_POST['pass'];

		$que = "SELECT nim,password FROM registrasi WHERE nim = '$nim'";
		$qry = mysqli_query($conn , $que);
		$row = mysqli_fetch_array($qry);

		if ($nim == $row['nim'] && $pass == $row['password']) {
			$_SESSION["nim"]=$row['nim'];
			$_SESSION["password"]=$row['password'];

			header("location:halawal.php");
		}else{

			echo "Password/NIM salah";
		}

}
 ?>