<?php
require_once 'clases/trivial.class.php';
if(!isset($_SESSION['nombre'])){
	header("Location: index.php");
}
$trivial = new Trivial();
//obtnemos un pregunta
$pregunta = $trivial->get_preguntas();
//obtenemos las posibles respuestas de la pregunta
$respuestas = $trivial->get_respuestas($pregunta['id']);
//las desordenamos
shuffle($respuestas);
?>
<!DOCTYPE html> 
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Juego de trivial</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
</head> 
<body> 

	<div data-role="page">
		<?php
		if(isset($_SESSION['respuesta']))
		{
		 echo $_SESSION['respuesta'];
		}
		?>
		<h2>Hola <?php echo $_SESSION['nombre'] ?>&nbsp;&nbsp;Tus puntos: <?php echo $_SESSION['puntos']?></h2>
		<p><label><b><?=$pregunta['pregunta']?></b></label></p>
		<form method="post" id="form_responder" action="instancias/respuestas.php" accept-charset="utf-8" data-ajax="false">
			<!--id de la respuesta-->
			<input type="hidden" name="correcta" value="<?=$pregunta['correcta']?>" />  
				
			<?php $i = 1;
			foreach ($respuestas as $respuesta) { ?>
				<input type="radio" name="respuesta" id="radio-choice-<?=$i?>" value="<?=$respuesta['id']?>" />
				<label for="radio-choice-<?=$i?>"><?=$respuesta['respuesta']?></label>
			<?php $i++; } ?>
			<button type="submit" data-theme="b">Responder</button>	
		</form>
		<a href="ranking.php" data-role="button" data-theme="a" data-ajax="false">Ver ranking</a>  
		<a href="instancias/logout.php" data-role="button" data-theme="a" data-ajax="false">Salir</a>  

	</div>
	
</body>
</html>

