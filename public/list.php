<?php
        include 'index.php';
        include '../lib/bd.php';
        if(isset($_SESSION['email']) && isset($_SESSION['passwd']))
        {
        $email = $_SESSION['email'];
        $passwd = $_SESSION['passwd'];
      }
        if (!empty($_POST['eliminar'])) {

                $_SESSION['id'] = $_POST['id'];

                header('Location:borrar.php');

                exit();
        }
        if (!empty($_POST['agregar'])) {

                $_SESSION['data'] = $_POST['data'];
                $_SESSION['completed'] = $_POST['completed'];
                $_SESSION['descripcion'] = $_POST['descripcion'];
                $_SESSION['email'] = $email;

                header('Location:agregar.php');
                exit();
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Llistar</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
        <div>
                <nav>
                        <form method="POST" action="../index.html">
                        <input type="submit" name="logout" value="logout">
                        </form>
                </nav>
        </div>
        <div>

        <div>
                <form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
          <label>Eliminar </label><input type="text" name="id" placeholder='"num de id"'>
          <input type="submit" name="eliminar" value="Eliminar">
          <br>
            <label>Fecha </label><input type="text" name="data">
            <br>
            <label>Completado </label><input type="text" name="completed">
            <br>
            <label>Tarea </label><input type="text" name="descripcion" placeholder='"descripcion"'>
            <br>
            <input type="submit" name="agregar" value="agregar">
                </form>
        </div>
        </div>

        <div>

                 <ul>
                <?php

                $db = conecta($dbhost, $dbuser, $dbpasswd, $dbname);

                $sql = 'SELECT * FROM taskes INNER JOIN task ON users.id = task.user WHERE email="'.$email.'" AND passwd="'.$passwd.'";';

                $result=$db->query($sql);

                if(!$result=$db->query($sql))
                                        {
                                                die("error en listar");
                                        }
                while($rec=$result->fetch_array())
                                        {
                                                if($rec['completed']==1){
                                                        echo "<li><strike>".$rec['id'].".".$rec['descripcion']."</strike></li>";


                                                }
                                                else
                                                        echo "<li>".$rec['id'].".".$rec['descripcion']."</li>";

                                        }

                        $db->close();
        ?>
</ul>
        </div>


</body>
</html>
