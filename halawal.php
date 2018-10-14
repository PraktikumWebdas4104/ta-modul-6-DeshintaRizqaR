<?php 
include 'koneksi.php';
	session_start();

	if (isset($_SESSION["nim"]) && isset($_SESSION["password"])) {

		$que2 = "SELECT nama, nim, kelas, jeniskl, hobi, fakultas, alamat FROM registrasi WHERE nim ='$_SESSION[nim]'";
		$qry2 = mysqli_query($conn,$que2);
		$row2 = mysqli_fetch_array($qry2);

			echo "<table>
					<tr>
						<th>Nama</th>
						<th>Nim</th>
						<th>kelas</th>
						<th>jeniskl</th>
						<th>hobi</th>
						<th>fakultas</th>
						<th>alamat</th>
					</tr>

					<tr>
						<td>".$row2[0]."</td>
						<td>".$row2[1]."</td>
						<td>".$row2[2]."</td>
						<td>".$row2[3]."</td>
						<td>".$row2[4]."</td>
						<td>".$row2[5]."</td>
						<td>".$row2[6]."</td>
					</tr>
				</table>";
		
			echo "<table>
					<tr>
						<td><a herf='editprofil.php'>Edit</a></td>
						<td><a href='posting.php'>Posting</a></td>
						<td><a href='logout.php'>Logout</a></td>
					</tr>
				</table>";
	}else{
		echo "Login gagal,klik <a href='login.php'>Login</a> kembali";
	}


 ?>