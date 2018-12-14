<?php
$conexion = mysql_connect("localhost", "root", "");

if (!$conexion) {
    echo "No pudo conectarse a la BD: " . mysql_error();
    exit;
}

if (!mysql_select_db("trivial")) {
    echo "No ha sido posible seleccionar la BD: " . mysql_error();
    exit;
}

$sql = "SELECT id,pregunta from preguntas order by rand() LIMIT 1";

$resultado = mysql_query($sql);

if (!$resultado) {
    echo "No se pudo ejecutar con exito la consulta ($sql) en la BD: " . mysql_error();
    exit;
}

if (mysql_num_rows($resultado) == 0) {
    echo "No se han encontrado resultados.";
    exit;
}

$fila = mysql_fetch_assoc($resultado);
$data = array();
$fila["pregunta"];
$respuestas = mysql_query("SELECT respuesta from respuestas where id_pregunta = ".$fila['id']);

while ($fila = mysql_fetch_assoc($respuestas)) {
     $data[] = $fila;
}
shuffle($data);
var_dump($data);

mysql_free_result($resultado);
if($_POST){

$pregunta = $_POST['pregunta'];
$respuesta_1 = $_POST['respuesta_1'];
$respuesta_2 = $_POST['respuesta_2'];
$respuesta_3 = $_POST['respuesta_3'];



$sql="INSERT INTO preguntas (pregunta,respuesta_1,respuesta_2,respuesta_3) VALUES ( '$pregunta','$respuesta_1','$respuesta_2', '$respuesta_3')";
echo $sql;
if(mysqli_query($conexion,$sql)){
	echo 'bien';
	}else{
	echo 'mal';
	}
}
?>
<!DOCTYPE html> 
<html>
<head>
	<title>Formulario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
<form method="post"> 

<b>pregunta</b><br>
<input type=text name='pregunta' size='200'><BR><BR>

<b>respuesta_1</b><br>
<input type=text name='respuesta_1' size='100'><BR><BR>

<b>respuesta_2</b><br>
<input type=text name='respuesta_2' size='100'><BR><BR

<b>respuesta_3</b><br>
<input type=text name='respuesta_3' size='100'><BR><BR


<button><input type="submit" value="Enviar" /></button>

</form>


</body>

</html>