<?php
//session_start();
class PerfilControlador
{


		public function perfilUsuario()
		{
			$id = $_SESSION['idPersonas'];
		//print "xxxx" . $id;
			$consultarLogin = new LoginModelo();
			$login = $consultarLogin->consultarLoginIdModel($id);
			$consultarPersona = new UsuariosModel();
			$respuesta = $consultarPersona->consultarUsuariosIdModel($id, 'personas');

			print '
			<input type="hidden" name="id" value="' . $respuesta['idPersonas'] . '">
			<div class="row">
			<div class="col-4">
			
			</div>
			<div class="col-4">
			<form method="post" class="form-signin">
			<div class="row">
			<div class="col">
			<h6>Nombre Usuario</h6>
			<input type="text" class="form-control" name="nombreEditar" value="'.$respuesta['nombre'].'" placeholder="Nombre Usuario" required="">
			</div>
			
			</div>
			
			<div class="row">
			<div class="col">
			<h6>Apellido</h6>			<input type="text" class="form-control" name="apellidoEditar" value="'.$respuesta['apellido'].'" placeholder="Telefono" required="">
			</div>
			
			<div class="col">
			<h6>Tipo Documento</h6>
			<input type="text" class="form-control" name="Editar" value="'.$respuesta['documentoIdentidad'].'" placeholder="Tipo_Documento" required="">
			</div>
			</div>
			
			<div class="row">
			<div class="col">
			<h6>Numero Documento</h6>
			<input type="text" class="form-control" name="n_dEditar" value="'.$respuesta['numeroDocumento'].'" placeholder="Numero" required="">
			</div>
			
			<div class="col">
			<h6>Fecha Nacimiento</h6>
			<input type="date" class="form-control" name="fNEditar" value="'.$respuesta['fechaNacimiento'].'" placeholder="fechaNacimiento" required="">
			</div>
			</div>
			
			<div class="row">
			<div class="col">
			<h6>E-mail</h6>
			<input type="email" class="form-control" name="emailEditar" value="'.$login['email'].'" placeholder="E-mail" required="">
			</div>
			
			<div class="col">
			<h6>Contraseña</h6>
			<input type="password" class="form-control" name="claveEditar" value="'.$login['password'].'" placeholder="Contraseña" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
			</div>
			</div>
			<br><br>
			<input type="submit" class="btn btn-primary mb-2" class="form-control" name="enviar" value="Actualizar">
			</form>
			</div>
			
			</div>	     
			';
		}

		public function actualizarPerfilControlador()
		{
			if (isset($_POST['nombreEditar'])) {
				$datos = array(
					'id' => $_POST['id'],
					'nombre' => $_POST['nombreEditar'],
					'email' => $_POST['emailEditar'],
					'claves' => $_POST['claveEditar'],
					'apellido' => $_POST['apellidoEditar'],
				//'t_d' => $_POST['t_dEditar'],
				//'n_d' => $_POST['n_dEditar'],
					'fN' => $_POST['fNEditar']
				);
				$actPerfil = new UsuariosModel();
				$respuesta = $actPerfil-> actualizarPerfilModel($datos, 'personas');

				if ($respuesta == "success") {
					header('location:chang');
				} else {
					print "Error";
				}
			}
		}
	}
