<?php
        session_start();

        include 'index.php';
        require '../lib/bd.php';
        $data = $_SESSION['data'];
        $completed = $_SESSION['completed'];
        $descripcion = $_SESSION['descripcion'];

        //guadaremos como variables los datos

        if (!empty($descripcion)) {
          $db = conecta($dbhost, $dbuser, $dbpasswd, $dbname);
        $sql = 'SELECT users.id FROM users WHERE users.email = "'.$_SESSION['email'].'" LIMIT 1;';



  if ($result = mysqli_query($db, $sql)) {
  if ($row = mysqli_fetch_array($result)) {
  $id = $row[0];

  $sql1 ='INSERT INTO task(id, descripcion, user, data, completed) VALUES("'.NULL.'","'.$descripcion.'","'.$id.'","'.$data.'","'.$completed.'");';

              if($result=$db->query($sql1))
                                                {
                header('Location:list.php');
                        exit();
                                                }
                                        else
                                        {
            echo("error en borrar");
                                          }

                                }
                                else{
                                        echo ("Error en realizar la sentancia");
                                }
                        }
                        else
                        {
                                echo ("No se ha podido entrar en la base de datos");
                        }
        }
        else
        {
                echo ("No se ha insertado descripcion");
        }
 ?>
