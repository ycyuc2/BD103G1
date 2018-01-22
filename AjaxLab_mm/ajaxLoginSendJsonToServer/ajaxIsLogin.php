<?php
	ob_start();
	session_start();
	if ( isset($_SESSION['memName']) === true) {
		echo $_SESSION['memName'];
	}else{
		echo "@@@no@@@";
	}
?>