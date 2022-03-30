<?php
	session_star();
	session_destroy();
	echo "Ha termido la session<hr>">;
	
	header('location: index.php');
?>
