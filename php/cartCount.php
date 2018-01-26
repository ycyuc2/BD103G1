<?php
ob_start();
session_start(); 
if($_REQUEST["action"] == 'add'){
	$_SESSION["cartCount"]++;
}elseif ($_REQUEST["action"] == 'minus') {
	$_SESSION["cartCount"]--;
} ?>