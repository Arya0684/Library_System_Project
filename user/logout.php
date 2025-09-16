<?php

	session_start();
	session_unset();
	session_destroy();
	echo "<script>alert('Logout Successfully from Member Dashboard');document.location.href='login.php';</script>";

?>