<?php  

class LoginControlador {

	function ingresarLoginControlador(){
		if (isset($_POST['enviarAcceso'])) {

			$datos = array(
				'email' => $_POST['emailIngreso'],
				'clave' => $_POST['claveIngreso']
			);


			$ingresarLogin = new LoginModelo();
			$respuesta = $ingresarLogin->ingresarLoginModelo($datos);

			var_dump($respuesta);

			if ($respuesta['email'] == $_POST['emailIngreso'] &&
				$respuesta['password'] == $_POST['claveIngreso']) {


				session_start();
			$_SESSION['idPersonas'] = $respuesta['idPersonas'];
			$_SESSION['validar'] = true;
			$_SESSION['email'] = $respuesta['email'];
			$_SESSION['Roles'] = $respuesta['Roles'];

			if ($_SESSION['Roles'] == "Administrador") {
				header('location:usuario');
			} else {
				header('location:usuario');
			}
		} else {
			header('location:falla');
		}
	}
}

function eliminarUsuarioRolControlador(){
	if (isset($_GET['delrol'])) {
		$id = $_GET['delrol'];
		$modelo = new LoginModelo();
		$respuesta = $modelo->eliminarUsuarioRolModelo($id);
		if ($respuesta) {
			header('location:oksRolLogin');
		}
	}
}


function actualizarRolControlador(){
	if (isset($_POST['enviar'])) {
		$datosEditar = array('idPersona' => $_POST['id'],
			'email' => $_POST['emailEditar'],
			'clave' => $_POST['claveEditar']);
		$editarRol = new LoginModelo();
		$respuesta = $editarRol->actualizarRolModelo($datosEditar);
		if ($respuesta == "success") {
			print '<p class="alert alert-success" role="alert"><a href="usuario">Usuario Actualizado Correctamente</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></p>';
		}

	}
}

function actualizarRolControlador1(){
	if (isset($_POST['enviar'])) {
		$datosEditar1 = array('idPersona' => $_POST['id'],
			'email' => $_POST['emailEditar'],
			'clave' => $_POST['claveEditar'],
			'idRol' => $_POST['rolEditar']);
			#var_dump($datosEditar1);
		$editarRol1 = new LoginModelo();
		$respuesta = $editarRol1->actualizarRolModelo1($datosEditar1);
		if ($respuesta) {
			print '<p class="alert alert-success" role="alert"><a href="usuario">Usuario Actualizado Correctamente</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></p>';
		}
	}
}
}