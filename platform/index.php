<!DOCTYPE html> 
<html>
<head>
	<title>Interact&uacute;a con el saber</title>
	<link href="../img/icono_interactua.png" rel="icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/main.css">
	<script type="text/javascript">
	//VALIDAMOS SI HAN INTRODUCIDO UN NOMBRE EN EL FORMULARIO DE INICIO-->
		$(document).ready(function(){
            $("#form").live('submit',function(){        
                if($("#nombre").val() == "")
                {
                    alert("Introduce tu nombre"); return false;
     			}else{
     				$("#form").submit();
     			}
            })              
        });
	</script>
</head>

<body>
<div data-role="page">
	<div data-role="header" data-position="fixed"><h1>Trivial</h1></div>
	<div data-role="content">
	<!--AL PULSAR APARECE UN DIALOG PARA EMPEZAR A JUGAR-->
    <a href="dialog.php" data-role="button" data-rel="dialog" data-transition="slidedown" data-theme="b">Empezar a jugar</a>
    </div>
    	<div class="wrapper">
			<div class="roulette" align="button" style="margin-bottom: 10px;">
				<canvas id="wheelcanvas" width="543" height="656"></canvas>
				<div id="roulette_arrow">&nbsp;</div>
				<div id="roulette_axis">&nbsp;</div>
				<div class="hidden">
					<img src="img/materias/ingles.png" id="nutrisnacks" height="120px" width="120px" alt="nutrisnacks" class="provider" />
					<img src="img/materias/quimica.png" id="tena" height="120px" width="120px" alt="tena" class="provider" />
					<img src="img/materias/filosofia.png" id="clorox" height="120px" width="120px" alt="clorox" class="provider" />
					<img src="img/materias/matematicas.png" id="pozuelo" height="120px" width="120px" alt="pozuelo" class="provider" />
					<img src="img/materias/comprension_lectora.png" id="kotex" height="120px" width="120px" alt="kotex" class="provider" />
					<img src="img/materias/sociales.png" id="jacks" height="100px" width="100px" alt="jacks" class="provider" />
					<img src="img/materias/biologia.png" id="none" height="150px" width="150px" alt="none" class="provider" />
					<img src="img/materias/fisica.png" id="numar" height="120px" width="120px" alt="numar" class="provider" />	
				</div>
			</div>
			<div class="rotateButton ir" onclick="roulette.spin();">Gire aqu&iacute;</div>
		</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
		</script>
		<script src="js/main.js"></script>	

	<!--data-position="fixed"- Codigo que se coloca despues de data-role para que quede fijo a la parte de abajo-->
	<div data-role="footer" ><h6>Juega al trivial</h6></div>
</div>

</body>
</html>
