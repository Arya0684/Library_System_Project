<?php

	session_start();
	session_unset();
	session_destroy();
	echo "<script>alert('Logout Successfully From Admin Dashboard');document.location.href='login.php';</script>";

?>