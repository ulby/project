<?php
session_start();
    if ($_SESSION['loggedin'] != 1) {
        header("Location: login.php");
        exit;
    }
	include("inc/connect.php");
	include("inc/head.php");
	include("inc/body.php");
	include("inc/footer.php"); 
?>
