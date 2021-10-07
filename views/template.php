<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="views/css/main.css">
	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="icon" href="views/img/fondo3.jpg">
	<link href="views/css/carousel.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="views/css/jquery-ui.css">


	<title>Quimica</title>
	

</head>
<body>
	<!--<div id="contenedor_carga">
        <div id="carga">
            
        </div>
    </div>-->
    <!--<div class="contenedor_carga">
        <div class="carga">
            
        </div>
    </div>-->
	<?php

	$ctrl = new LoginControlador();
	$ctrl->ingresarLoginControlador();


	?>
	<header>
		<?php include("views/modules/navegacion.php"); ?>
	</header>
	
	<section>
		<?php
		$mvc = new Controlador();
		$mvc->enlacesPaginasControlador();
		?>
	</section>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/function.js"></script>
	<script src="views/js/jquery-3.6.0.min.js"></script>
	
	<script src="views/js/jquery.js"></script>
	<script src="views/js/jquery-ui.js"></script>
	<script src="views/js/ajax.js"></script>
	<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
	<!--<script src="views/js/validacion.js"></script>-->
	<script>
    window.onload = function(){
        var contenedor = document.getElementById('contenedor_carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
    }
</script>
</body>

</html>