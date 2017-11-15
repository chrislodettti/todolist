<?php
        session_start();

                include '../lib/config.php';
                require '../lib/bd.php';

        if (!empty($_SESSION['id'])) {

                $id = $_SESSION['id'];
                $db = conecta($dbhost, $dbuser, $dbpasswd, $dbname);

                $sql ='DELETE FROM task WHERE id = "'.$id.'";';
                //ejecutará la sentencia sql para borrar la tarea
                if($result=$db->query($sql))
                        {
                                header('Location:list.php');
                                exit();
                        }
                else
                        {
                                die("error en borrar");
                        }
        }
        else
        {
                header('Location:list.php');
                exit();
        }
        $db->close();
 ?>
