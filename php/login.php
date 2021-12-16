<?php
    include_once './conex.php';
    session_start();

/*     if (isset($_POST['usuario']) && isset($_POST['password']))
    { */
        $username = $_POST['usuario'];
        $password = $_POST['password'];

        $conex = new Database();
        $login = $conex->connect()->prepare("SELECT * FROM tb_usuarios WHERE td_usuario= '$username 'AND td_password =' $password'");
        $login->execute();

        $row = $login->fetch(PDO::FETCH_ASSOC);

        if ($row > 0) {
            header('Location: http://www.prueba1.co/view/Student/');
        }

    /* } */