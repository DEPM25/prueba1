<?php
require_once("conex.php");

$total = $_POST['total_Alu'];
$grupo = $_POST['id_grupo'];
$id_docente = $_POST['id_docente'];
$nom_docente = $_POST['nom_docente'];
$id_asignatura = $_POST['id_asignatura'];
$nom_asignatura= $_POST['nom_asignatura'];


$n1 = $_POST['N11'];
$n2 = $_POST['N21'];
$n3 = $_POST['N31'];
$n4 = $_POST['N41'];
$p1 = $_POST['P1'];


echo 'el total es: '.$total.'<br>';
echo 'el gupo es: '.$grupo.'<br>';
echo 'el gupo es: '.$id_docente.'<br>';
echo 'el gupo es: '.$nom_docente.'<br>';
echo 'el gupo es: '.$id_asignatura.'<br>';
echo 'el gupo es: '.$nom_asignatura.'<br><p><p>';

// bucle para recibir todas las variables
for($x =1 ; $x <= $total ; $x++) {
$al = $_POST['NA'.$x];
$n1 = $_POST['N1'.$x];
$n2 = $_POST['N2'.$x];
$n3 = $_POST['N3'.$x];
$n4 = $_POST['N4'.$x];
$p1 = $_POST['P'.$x];

// comprobar que le nota ingresada no tiene menos de dos caracteras
if(strlen((substr((($n1+$n2+$n3+$n4)/4),0,3)))<=1){
$p2=(substr((($n1+$n2+$n3+$n4)/4),0,3)).".0";
}
else{
$p2=substr((($n1+$n2+$n3+$n4)/4),0,3);
}



$query2="INSERT INTO notas SET alu='$al', grupo='$grupo', id_doc='$id_docente', nom_doc='$nom_docente', id_asigna='$id_asignatura',nom_asigna='$nom_asignatura, nota1='$n1', nota2='$n2', nota3='$n3', nota4='$n4', promedio='$p1', promedio2='$p2'";
 echo "<font size='2'>".$query2."</font><br>";

}





?>