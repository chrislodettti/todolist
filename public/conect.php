<?php


	include 'index.php';
	include '../lib/bd.php';
	if(!empty($_POST)){
		if(!empty($_POST['email']) && !empty($_POST['passwd'])){
			$email=$_POST['email'];
			$passwd=$_POST['passwd'];

			// comprobamos si nos guardamos el email y la contraseña

			$db=conecta($dbhost, $dbuser, $dbpasswd, $dbname);
			$sql='SELECT * FROM users WHERE email="'.$email.'" AND passwd="'.$passwd.'";';

			// hacemos la consulta y la guardamos
			if($result = mysqli_query($db,$sql)){
				//ejecutamos la consulta y la guardamos en la variable
				if ($row = mysqli_fetch_array($result)) {

					//guardamos en row el array con el resultado
                       $_SESSION['email'] = $email;
                       $_SESSION['passwd'] = $passwd;
                       setcookie('email', $email, time()+1800, '/todo', '');
                       setcookie('passwd', $passwd, time()+1800, '/todo', '');

                       //guardamos la información de las cookies
											  // la cabecera sea list.php
                        header('Location:list.php');
                        exit();
                }
                else{

                    header('Location:index.html');
                    exit();
                 }
			}
			else{

				die('Error de connexió');
				header('Location:index.html');
			}
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
					<li><a href="insert.php"> Registrar-se </a></li>

			</ul>
		</div>
	</nav>
<div>
	<h1>TODO List</h1>
</div>

<div>

<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">

			<p><label for="email">Email</label></p>
			<input type="text" name="email">
			<p><label for="passwd">Contraseña</label></p>
			<input  type="password" name="passwd">
			<input value="Registrate" type="submit" name="Insert">
</div>

		<footer></footer>
	</body>
	</html>
