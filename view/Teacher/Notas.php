<?php
require_once("../../php/conex.php");
include_once("../../php/other.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        // funcion para enviar nota desde boton
        // This is the check script

        //total=<?php /* num_rows */ ?>

        function checkit() {
            // In textstring I gather the data that are finally written to the textarea.
            var textstring = '';
            // First of all, have all the text boxes been filled in?
            // This part is treated in the normal page.
            // I put all boxes and their values in textstring

            for (i = 0; i < 5000; i++) {
                var box = document.forms['regNotas'].elements[i];
                if (!box.value) {
                    //	alert('You haven\'t filled in ' + box.name + '!');
                    document.forms['regNotas'].elements[i].value = document.notas.n1.value;
                    box.focus()
                    return;
                }
                textstring += box.name + ': ' + box.value + '\n';
            }




            //	document.forms['regNotas'].output.value = textstring;
        }


        // funcion para enviar nota a promedio

        function sumar1(n1) {
            return parseFloat(n1);
        }

        function sumar2(n2, x1) {
            return Number(n2) + Number(x1);
        }

        function sumar3(n3, x3, y3) {
            return Number(n3) + Number(x3) + Number(y3);
        }

        function sumar4(n4, x4, y4, z4) {
            return Number(n4) + Number(x4) + Number(y4) + Number(z4);
        }



        // -->
    </script>
</head>

<body onload="document.getElementById('N1-1').focus()">

    <!-- formulario lista grados -->
    <form name="f-buscar" method="post" action="">
        <table>
            <tr>
                <td>
                    <select name="selGrupo">
                        <option value="">Seleccione</option>
                        <?php

                        try {
                            $conex = new Database();
                            $qryGrupo = $conex->connect()->prepare("SELECT * FROM tb_grupos WHERE td_Grado_Anio=2016");
                            $qryGrupo->execute();

                            $total_registros = $qryGrupo->rowCount();

                            while ($resGrupo = $qryGrupo->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <option value="<?php echo $resGrupo['td_Cod_Grupo'] ?>"><?php echo $resGrupo['td_Cod_Grupo'] ?> -- <?php echo $resGrupo['td_Nom_Grupo']; ?></option>
                        <?php
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }

                        ?>
                    </select>
                </td>
                <td><input name="Consultar" type="submit" value="Consultar" />
                    <?php
                    echo "Hay un total de grupos: " . $total_registros;
                    ?>
                </td>
            </tr>
        </table>
    </form>



    <!-- formulario llenar notas -->
    <form name="regNotas" method="post" action="../../php/recibe.php">
        <?php
        // paso como parametro de busqueda el grupo para que me imprima solo ese
        $Grupo = $_POST['selGrupo'];
        // consulto la base en las tablas de alumnos y de matricula para el año
        try {
            $conex = new Database();
            $qryInfo1 = $conex->connect()->prepare("SELECT tb_alumnos.td_Id_Alu, td_Ape1_Alu, td_Ape2_Alu, td_Nom1_Alu, td_Nom2_Alu, tb_alumnos_grados.td_Cod_Grupo FROM tb_alumnos INNER JOIN tb_alumnos_grados ON tb_alumnos_grados.td_Id_Alu=tb_alumnos.td_Id_Alu WHERE tb_alumnos_grados.td_Cod_Grupo='$Grupo' AND tb_alumnos_grados.td_Anio_Alu='2016' ORDER BY td_Ape1_Alu, td_Ape2_Alu, td_Nom1_Alu ASC");
            $qryInfo1->execute();

            $result = $qryInfo1->fetchColumn(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        

        ?>


        <table width="820" class="form">
            <tr>
                <td>grado: <input name="id_grupo" type="text" value="<?php echo $Grupo = $_POST['selGrupo'] ?>" id="id_docente" size="5" />
                </td>
                <td><input name="id_docente" type="text" value="10138431" id="id_docente" size="5" />
                </td>
                <td><input name="nom_docente" type="text" value="Memo" id="nom_docente" size="30" />
                </td>
                <td><input name="id_asignatura" type="text" value="6A-01-01" id="id_asignatura" size="5" />
                </td>
                <td><input name="nom_asignatura" type="text" value="CIENCIAS NATURALES" id="nom_asignatura" size="30" />
                </td>
                <td align="center"><input name="total_Alu" type="text" value="<?php echo $result ?>" id="total_Alu" size="10" /></font>
                </td>
            </tr>

            <table width="720" class="form">
                <td width="180" align="center">
                    <font size="2" face="Arial">No.</font>
                </td>
                <td width="500" align="center">
                    <font size="2" face="Arial">Alumno</font>
                </td>
                <td width="40" align="center">
                    <font size="2" face="Arial">Nota 1</font>
                </td>
                <td width="40" align="center">
                    <font size="2" face="Arial">Nota 2</font>
                </td>
                <td width="40" align="center">
                    <font size="2" face="Arial">Nota 3</font>
                </td>
                <td width="40" align="center">
                    <font size="2" face="Arial">Nota 4</font>
                </td>
                <td width="40" align="center">
                    <font size="2" face="Arial">Promedio</font>
                </td>
                </tr>

                <?php

                $a = 0;
                while ($resInfo1 = $qryInfo1->fetch(\PDO::FETCH_ASSOC)) {

                    $a++;
                ?>
                    <tr>
                        <!-- Numero en lista del Alumno -->

                        <td align="left">
                            <font size="2" face="Arial">
                                <input name="NoLista<?php echo $a ?>" type="text" value="<?php echo $a ?>" size="2" />
                                <input name="NA<?php echo $a ?>" type="text" value="<?php echo $resInfo1['td_Id_Alu'] ?>" size="10" />
                            </font>
                        </td>

                        <td align="left">
                            <font size="2" face="Arial">
                                <?php echo $resInfo1['td_Ape1_Alu'] . ' ' . $resInfo1['td_Ape2_Alu'] . ' ' . $resInfo1['td_Nom1_Alu'] . ' ' . $resInfo1['td_Nom2_Alu'] ?>
                            </font>
                        </td>


                        <!-- Nota 1 del Alumno -->
                        <td align="center">
                            <input name="N1<?php echo $a ?>" type="text" id="N1-<?php echo $a ?>" size="2" readonly maxlength="2" onblur="getElementById('P<?php echo $a ?>').value=parseFloat(sumar1(N1<?php echo $a ?>.value));" />
                        </td>

                        <!-- Nota 2 del Alumno -->
                        <td align="center">
                            <input name="N2<?php echo $a ?>" type="text" id="N2-<?php echo $a ?>" size="2" readonly maxlength="2" onblur="getElementById('P<?php echo $a ?>').value=parseFloat((sumar2(N1<?php echo $a ?>.value,N2<?php echo $a ?>.value)/2).toFixed(1));" />
                        </td>

                        <!-- Nota 3 del Alumno -->
                        <td width="40" align="center">
                            <input name="N3<?php echo $a ?>" type="text" id="N3-<?php echo $a ?>" size="2" readonly maxlength="2" onblur="getElementById('P<?php echo $a ?>').value=parseFloat((sumar3(N1<?php echo $a ?>.value,N2<?php echo $a ?>.value,N3<?php echo $a ?>.value)/3).toFixed(1));" />
                        </td>


                        <!-- Nota 4 del Alumno -->
                        <td align="center">
                            <input name="N4<?php echo $a ?>" type="text" id="N4-<?php echo $a ?>" size="2" readonly maxlength="2" onblur="getElementById('P<?php echo $a ?>').value=parseFloat((sumar4(N1<?php echo $a ?>.value,N2<?php echo $a ?>.value,N3<?php echo $a ?>.value,N4<?php echo $a ?>.value)/4).toFixed(1));" />
                        </td>

                        <!-- Promedio del Alumno -->
                        <td align="center">
                            <input name="P<?php echo $a ?>" id="P<?php echo $a ?>" type="text" size="2" readonly value="" class="promedio" />
                        </td>
                    </tr>

                <?php
                }
                ?>
            </table>
            <div id="P2002"><input type="submit" value="enviar"></div>
    </form>


    <p>
    <p>

    <form name="notas">
        <table width=300 border=1 cellpadding=1 cellspacing=1 bgcolor="lightgreen">
            <?php
            $i = 1;
            $z = 5;
            for ($i = 1; $i < 5; $i++) {
            ?>
                <tr>
                    <?php
                    for ($j = 0; $j < 10; $j++) {
                    ?>
                        <td align="right">
                            <input type="radio" name="n1" id="n<?php echo $i ?><?php echo $j ?>" value="<?php echo $i . '.' . $j ?>" oncLICK="checkit(); return false" /><label for="n<?php echo $i ?><?php echo $j ?>"><?php echo $i . '.' . $j ?></label>
                        <?php
                    }
                        ?>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td align="right">
                    <input type="radio" name="n1" id="n50" value="5.0" onclick="checkit(); return false" /><label for="n50">5.0</label>
            </tr>
        </table>
    </form>

</body>

</html>