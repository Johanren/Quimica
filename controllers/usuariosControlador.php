<?php
class UsuarioControlador
{
	//METODO PARA REGISTRAR LOS USURARIOS:
	public function registrarUsuariosControlador()
	{
		if (isset($_POST['enviars'])) {
			$datos = array(
				'nombre' => $_POST['nombreRegistro'],
				'apellido' => $_POST['apellidoRegistro'],
				't_d' => $_POST['t_dRegistro'],
				'n_d' => $_POST['n_dRegistro'],
				'fn' => $_POST['fnRegistro']
			);
			$registrarUsuario = new UsuariosModel();
			$respuesta = $registrarUsuario->registarUsuariosModelo($datos);
			if ($respuesta) {
				$idPersona = $registrarUsuario->optenerUltimoIdModelo();
				$ultimoId = $idPersona[0]['id'];
			}
			if (isset($_POST['enviars'])) {
				$datosLogin = array('email' => $_POST['emailRegistro'],
					'clave' => $_POST['numeroRegistro'],
					'idPersona' => $ultimoId,
					'idRol' => 2);
				$registarLogin = new LoginModelo();
				$respuesta = $registarLogin->registrarLoginModelo($datosLogin);
				if ($respuesta == 'success') {
					header('location:ingresar');
				} else {
					print "Usuario no Registrado";
				}
			}
			
		}
	}

	/*public function registrarPersonasRolesControlador(){
		if (isset($_POST['personas'])) {
			$datos = array('persona' => $_POST['personas'],
				'rol' => $_POST['rol']);
			$respuesta = UsuariosModel::registrarPersonasRolesModelo($datos, 'personasrol');
			//print $respuesta;
			//print_r($datos);
			if ($respuesta == 'success') {
				header('location:rolokss');
			}else{
				print '<p class="alert alert-success" role="alert">Rol no Registrado <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></p>';
			}
		}
	}*/


	
	public function listarUsuarioControlador()
	{
		$respuesta = UsuariosModel::listarUsuariosModel('personas');
		//var_dump($respuesta);
		foreach ($respuesta as $row => $valor) {
			print "
			<tr>
			<td>{$valor['nombre']}</td>
			<td>{$valor['apellido']}</td>
			<td>{$valor['documentoIdentidad']}</td>
			<td>{$valor['numeroDocumento']}</td>
			<td>{$valor['fechaNacimiento']}</td>
			<td><a href='index.php?action=editar&id={$valor['idPersonas']}'><button class='btn btn-primary mb-2'><img src='https://image.flaticon.com/icons/png/128/1160/1160758.png' width='20'></button>
			</a>
			</td>
			<td><a href='index.php?action=usuario&del={$valor['idPersonas']}'><button class='btn btn-primary mb-2'><img src='https://image.flaticon.com/icons/png/128/3496/3496416.png' width='20'></button>
			</a>
			</td>
			</tr>"
			;
		}
	}

	public function listarRolesControlador(){
		$respuesta = UsuariosModel::listarRolesModel('rol');
		//print_r ($respuesta);
		return $respuesta;
	}
	public function listarPersonasControlador(){
		$respuesta = UsuariosModel::listarUsuariosModel('personas');
		return $respuesta;
		//print_r($respuesta);
	}
	//Administrador
	public function consultarUsuarioIdControlador()
	{
		$id = $_GET['id'];
		$consultarPersonas = new UsuariosModel();
		$respuesta = $consultarPersonas->consultarUsuariosIdModel($id);
		return $respuesta;
		
	}
	//Usuarios

	function consultarPersonaControlador(){
		$id = $_GET['id'];

		$consultarPersonas = new UsuariosModel();
		$respuesta2 = $consultarPersonas->consultarPersonasRolModel($id);
		return $respuesta2;
	}

	public function actualizarUsuarioControlador()
	{
		if (isset($_POST['enviar'])) {
			$datos = array(
				'id' => $_POST['id'],
				'nombre' => $_POST['nombreEditar'],
				'apellido' => $_POST['apellidoEditar'],
				't_d' => $_POST['t_dEditar'],
				'n_d' => $_POST['n_dEditar'],
				'fN' => $_POST['fNEditar']
			);
			var_dump($datos);
			$respuesta = UsuariosModel::actualizarUsuarioModel($datos);

			if ($respuesta = "success") {
				header('location:change');
			}
		}
	}



	public function eliminarUsuarioControlador()
	{
		if (isset($_GET['del'])) {
			$dato = $_GET['del'];
			$respuesta = UsuariosModel::eliminarUsuarioModel($dato, 'personas');

			if ($respuesta == "success") {
				print '<p class="alert alert-success" role="alert">Usuario Eliminado <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></p>';
				//header('location:usuario');
			}
		}
	}

	public function BuscarUsuarios(){
		if(isset($_POST['buscar'])){
			switch($_POST['camBuscar']){
				case 'nombre':
				$campo = "nombre";
				break;
				case 'email':
				$campo = "email";
				break;
				case 'tipoDocumento':
				$campo = "tipoDocumento";
				break;
				case 'numeroDocumento':
				$campo = "numeroDocumento";
				break;
				case 'numero':
				$campo = "numero";
				break;
				case 'fechaNacimiento':
				$campo = "fechaNacimeinto";
				break;
				default:
				$campo = "";
				break;
			}
			if(isset($_POST['campbuscar'])){
				$dato = $_POST['campbuscar'];
			}else{
				$dato = "";
			}
			$buscarUsuario = new UsuariosModel();
			$usuario = $buscarUsuario ->buscarDatos($campo, $dato);
			return $usuario;
		}
		
	}

	function consultarPersonaAjaxControlador($dato){
		$consultar = new UsuariosModel();
		$respuesta = $consultar->consultarPersonaAjaxModelo($dato);
		return $respuesta;
	}
}
