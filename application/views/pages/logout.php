<?php

	include('config/base_url.php');

	session_start();
	session_destroy();
	header("Location: ".$base_url."login");

?>