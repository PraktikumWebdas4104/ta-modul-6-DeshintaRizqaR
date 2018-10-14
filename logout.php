<?php 

session_start();

unset($_SESSION["nim"]);
unset($_SESSION["pass"]);


session_destroy();
	echo "Berhasil logout,klik <a href= 'login.php'> Login </a>";

 ?>