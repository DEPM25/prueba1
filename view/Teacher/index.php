<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/navigation.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/styleT.css">

    <script src="https://kit.fontawesome.com/cefde82d95.js" crossorigin="anonymous"></script>
    <title>Docente</title>
</head>

<body>



    <div class="container">
        <div class="navigation">
            <div class="logo_content">
                <div class="logo">
                    <i class="fas fa-atom"></i>
                    <div class="logo_name">Deogracias Cardona</div>
                </div>
                <i class="fas fa-bars" id="btn_menu"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a type="button" href="#" id="alumnos" onclick="loadDoc()">
                        <i class="fas fa-users"></i>
                        <span class="links_name">Alumnos</span>
                    </a>
                    <span class="tooltip">Alumnos</span>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-shapes"></i>
                        <span class="links_name">I. Desempeño</span>
                    </a>
                    <span class="tooltip">I. Desempeño</span>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-percent"></i>
                        <span class="links_name">Porcentajes</span>
                    </a>
                    <span class="tooltip">Porcentajes</span>
                </li>
                <li>
                    <a type="button" href="#" onclick="loadGrades()">
                        <i class="fas fa-calculator"></i>
                        <span class="links_name">Notas</span>
                    </a>
                    <span class="tooltip">Notas</span>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-user-tie"></i>
                        <span class="links_name">Usuario</span>
                    </a>
                    <span class="tooltip">Usuario</span>
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="../../img/user.png" alt="">
                        <div class="name_job">
                            <div class="name">Dimitri Perez</div>
                            <div class="job">Docente</div>
                        </div>
                    </div>
                    <i class="fas fa-sign-out-alt" id="log_out"></i>
                </div>
            </div>
        </div>

        <header class="header">
            <h2>Bienvenido Profesor</h2>
        </header>

        <main class="content">
            <iframe id="notas" src="Notas.php" height="500" width="1000" style="display: none;"></iframe>
        </main>
    </div>

    <script src="../../js/mystyle.js"></script>
    <script>
        let btn = document.querySelector("#btn_menu");
        let sidebar = document.querySelector(".navigation");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }

        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                document.querySelector(".content").innerHTML = this.responseText;
            }
            xhttp.open("GET", "alumnos.html", true);
            xhttp.send();
        }

        function loadGrades() {
            document.getElementById('notas').style.display = 'block';
        }

        /* const dt = new DataTable('#datatable', [
            {
                id: 'btn_add',
                Text: 'agregar',
                icon: 'fas fa-plus-circle',
                action: function() {
                    //codigo callback
                }
            }
        ]);
        dt.parse(); */
    </script>
</body>

</html>