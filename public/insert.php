<?php


	//connexión
	 include 'index.php';
     include '../lib/bd.php';

	$mysqli=conecta($dbhost, $dbuser, $dbpasswd, $dbname);
			if ( $mysqli->connect_errno)
			{
				die('Error de connexió');
			}
			//de lo contrario
			else
			{

				if($_POST['email'] && !empty($_POST['email'])  &&  $_POST['passwd'] && !empty($_POST['passwd']))

				{
					$sql="INSERT INTO taskes(email,passwd) VALUES('$_REQUEST[email]','$_REQUEST[passwd]')";

					//Ejecutamos la consulta
					if(!$result=$mysqli->query($sql))
					{
						die("error en insert");
					}

					$mysqli->close;

				}

			}

	?>


	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>TODO List</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>

<nav>
		<div id="navbar">
			<ul>

					<li><a href="../index.html"> Inicio </a></li>
					<li><a href="conect.php"> Contectar-se </a></li>
			</ul>
		</div>
	</nav>
<div>
	<h1>TODO List</h1>
</div>

<div>

<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">

			<p><label for="email">Email</label></p>

			<input class="form-control" type="text" name="email">

			<p><label for="passwd">Contraseña</label></p>

			<input class="form-control" type="password" name="passwd">

			<input value="Registrate" type="submit" name="Insert">

</div>
		<footer></footer>
	</body>
	</html>
