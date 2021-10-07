<?php

session_start();
//print $_SESSION['id'];
?>

<?php
//print $_SESSION['rol'];


if (isset($_SESSION['Roles'])) {

	if ($_SESSION['Roles'] == "Administrador") {
		print /*'<nav>
		<ul>
		<li><a href="index.php?action=inicio">Inicio</a></li>
		<li><a href="index.php?action=usuario">Usuarios</a></li>
		<li><a href="index.php?action=registrar">Registrar</a></li>
		<li><a href="index.php?action=perfil">Perfil</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>
		
		
		</ul>

		</nav>'*/

			'
		<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="inicio"><img src="https://image.flaticon.com/icons/png/128/69/69524.png" width="30"></a>
		<a class="navbar-brand" href="usuario">Usuarios</a>
		<!--<a class="navbar-brand" href="registrar">Registrar</a>-->
		<a class="navbar-brand" href="perfil"><img src="https://image.flaticon.com/icons/png/128/3135/3135715.png" width="30"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample01">
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Despegable</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
		<!--<a class="dropdown-item" href="usuario">Usuarios</a>
		<a class="dropdown-item" href="registrar">Registrar</a>-->
		<!--<a class="dropdown-item" href="perfil">Perfil</a>-->
		<a class="dropdown-item" href="actividad">RegistrarActividades</a>
		<a class="dropdown-item" href="actividadVista">Actividades</a>
		<a class="dropdown-item" href="personasGrado">Grado</a>
		<a class="dropdown-item" href="curso">Cursos</a>
		<a class="dropdown-item" href="conPreguntas">Ver Preguntas</a>
		<a class="dropdown-item" href="notas">Notas</a>
		<a class="dropdown-item" href="salir">Salir</a>
		</div>
		</li>
		</ul>
		</div>
		</nav>';
	} elseif ($_SESSION['Roles'] == "Docente") {
		print /*'<nav>
		<ul>
		<li><a href="index.php?action=inicio">Inicio</a></li>
		<li><a href="index.php?action=perfil">Perfil</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>
		</ul>
		</nav>'*/
			'<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="inicio"><img src="https://image.flaticon.com/icons/png/128/69/69524.png" width="30"></a>
		<a class="navbar-brand" href="actividad">RegistrarActividades</a>
		<a class="navbar-brand" href="actividadVista">Actividades</a>
		<a class="navbar-brand" href="personasGrado">Grado</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample01">
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Despegable</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
		<a class="dropdown-item" href="perfil">Perfil</a>
		<a class="dropdown-item" href="notas">Notas</a>
		<a class="dropdown-item" href="curso">Cursos</a>
		<a class="dropdown-item" href="conPreguntas">Ver Preguntas</a>
		<!--<a class="dropdown-item" href="actividad">RegistrarActividades</a>
		<a class="dropdown-item" href="actividadVista">Actividades</a>-->
		<a class="dropdown-item" href="salir">Salir</a>
		</div>
		</li>
		</ul>
		</div>
		</nav>';
	} elseif ($_SESSION['Roles'] == "Estudiante") {
		print /*'	<nav>
		<ul>
		<li><a href="index.php?action=inicio">Inicio</a></li>
		<li><a href="index.php?action=perfil">Perfil</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>
		</ul>
		</nav>'*/
			'<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="inicio"><img src="https://image.flaticon.com/icons/png/128/69/69524.png" width="30"></a>
		<a class="navbar-brand" href="perfil"><img src="https://image.flaticon.com/icons/png/128/3135/3135715.png" width="30"></a>
		<a class="navbar-brand" href="notas">Notas</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample01">
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Despegable</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
		<!--<a class="dropdown-item" href="perfil">Perfil</a>-->
		<a class="dropdown-item" href="actividadVista">Actividades</a>
		<a class="dropdown-item" href="salir">Salir</a>
		</div>
		</li>
		</ul>
		</div>
		</nav>';
	}
}


?>
