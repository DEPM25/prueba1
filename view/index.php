<?php
$useragent = $_SERVER['HTTP_USER_AGENT'];
echo '<b>Tu navegador es</b>: ' . $useragent;

$ip = $_SERVER['REMOTE_ADDR'];
echo '<b/><b>Tu IP es </b>: ' . $ip;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/general.css"> -->
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <img class="wave" src="../img/wave.svg">
    <div class="container">
        <div class="img">
            <img class="img" src="../img/img_login.svg" alt="">
        </div>
        <div class="login-container">
            <form class="sign-in" action="../php/login.php" method="POST">
                <!-- <img src="" alt=""> -->
                <h2>Bienvenido</h2>
                <div class="input-div one">
                    <div class="i">
                        <ion-icon name="person"></ion-icon>
                    </div>
                    <div>
                        <h5 class="label">Usuario</h5>
                        <input class="input" name="usuario" type="text">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <ion-icon name="lock-closed"></ion-icon>
                    </div>
                    <div>
                        <h5 class="label">Contraseña</h5>
                        <input class="input" name="password" type="password">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

    <script src="../js/mystyle.js"></script>

    <!-- IONICONS 5 FRAMEWORK -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>