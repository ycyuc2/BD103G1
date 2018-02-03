<?php
ob_start();
session_start();

	if($_REQUEST["mem_acc"] == 'master' && $_REQUEST["mem_psw"] == 'zxc987'){
		$_SESSION["bkLogin"] = true;
		echo "true";
	}
?>