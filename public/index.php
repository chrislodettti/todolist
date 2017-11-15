<?php

	if(!isset($_SESSION))
	{
		session_start();
	}
//guardamos en el dominio
	$domain = $_SERVER['HTTP_HOST'];

	if($domain=="clodetti.cesnuria.com")

	{
		include '../lib/config.ini';
	}

	else{
		 //incluir info de localhost
		 include '../lib/config.dev.ini';
	}



?>
