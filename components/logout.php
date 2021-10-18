<?php
	
	if (session_start()) {
		
	session_unset();
	session_destroy();

	if(isset($_COOKIE['email']))
	{
		setcookie('email','',time()-3600);
	}
	
	echo "<script>alert('You are logout')</script>";
	echo '<script>location.href="../index.php"</script>';

	}
?>