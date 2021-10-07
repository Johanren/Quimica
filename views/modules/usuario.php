
<script>
	$('#myModal').on('shown.bs.modal', function() {
		$('#myInput').trigger('focus')
	})
</script>

<?php
if (isset($_GET['action'])) {
	if ($_GET['action'] ==  "change") {
		print '<p class="alert alert-success" role="alert">Usuario Actualizado Correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}
}
if (isset($_GET['action'])) {
	if ($_GET['action'] ==  "rolokss") {
		print '<p class="alert alert-success" role="alert">Rol actualizado<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}
}
?>
<?php

//session_start();

if ($_SESSION['Roles'] != "Administrador") {
	header('location:index.php?action=usuario');
	if ($_SESSION['Roles'] == "Administrador") {
		header('location:index.php?action=usuario');
	}


	if ($_SESSION['Roles'] == "Docente") {
		header('location:index.php?action=inicio');
	}

	if ($_SESSION['Roles'] == "Estudiante") {
		header('location:index.php?action=inicio');
	}
}


?>
<?php  
$ctrl = new UsuarioControlador();
$ctrl1 = $ctrl->listarRolesControlador();
$ctrl2 = $ctrl->listarPersonasControlador();
#$ctrl->registrarPersonasRolesControlador();
$ctrl->eliminarUsuarioControlador();

?>
<br>
<h2 class="msg" class="h3 mb-3 font-weight-normal">Usuario: <?php print $_SESSION['email']; ?></h2>
<div class="col-sm" class="col-md" class="col-lg" class="col-xl">

	<h1 class="h3 mb-3 font-weight-normal">Buscar Usuario o Agregar Rol</h1>
	<br><br>
	<div class="row">
		<div class="col-2">
			
		</div>
		<div class="col-2">
			<!--<form method="post">
				<label>Usuario</label>
				<select class="form-control" name="personas">
					<option >Seleccione un usuario</option>
					<?php  
					foreach ($ctrl2 as $key => $value) {
						print '<option value="'.$value[0].'">'.$value[4].' '.$value[1].'  '.$value[2].'</option>}
						option';
					}
					?>
				</select>
				<label>Rol</label>
				<select class="form-control" name="rol">
					<option >Seleccione un rol</option>
					<?php  
					foreach ($ctrl1 as $key => $value) {
						print '<option value="'.$value[0].'">'.$value[1].'</option>}
						option';
					}
					?>
				</select>
				<br>
				<button type="submit" class="btn btn-primary mb-2">Asignar Rol</button>
				<?php  
				$rol = new UsuarioControlador();
				#$rol->registrarPersonasRolesControlador();
				?>
			</form>-->
			
		</div>
		<div class="col-4">
			<br>
			<form action="" method="post" class="form-inline" class="formulario">
				<div class="form-group mx-sm-3 mb-2">
					<input class="form-control me-2" type="text" name="campbuscar" require>
				</div>
				<button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
				<div class="row">
					<div class="col-4">
						<input type="radio" name="camBuscar" value="nombre" required> nombre
					</div>
					<div class="col-4">
						<input type="radio" name="camBuscar" value="numeroDocumento" required> NumeroDocumento
					</div>
					<div class="col-4">
						<input type="radio" name="camBuscar" value="fechaNacimeinto" required> fechaNacimeinto
					</div>
				</div>
				<?php
				$ctrl = new UsuarioControlador();
				$resultado = $ctrl->BuscarUsuarios();

				?>
			</form>
		</div>
	</div>

	<br>
	<?php

	if (isset($resultado)) {


		?>

	</div>
	<div class="row">
		<div class="col-1">
			
		</div>
		<div class="col-8">
			<table class="table table-striped table-dark" border="1">
				<thead>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">email</th>
					<th scope="col">tipoDocumento</th>
					<th scope="col">numeroDocumento</th>
					<th scope="col">fechaNacimeinto</th>
					<th scope="col">Rol</th>
					<th scope="col">Editar</th>
					<th scope="col">Eliminar</th>
				</thead>
				<tbody>
					<?php
					foreach ($resultado as $key => $value) {
						print '
						<tr>
						<td>' . $value['nombre'] . '</td>
						<td>' . $value['apellido'] . '</td>
						<td>' . $value['email'] . '</td>
						<td>' . $value['documentoIdentidad'] . '</td>
						<td>' . $value['numeroDocumento'] . '</td>
						<td>' . $value['fechaNacimiento'] . '</td>
						<td>'.$value['Roles'].'</td>
						<td><a href="index.php?action=editarRol&id=' . $value['idPersonas'] . '"><button class="btn btn-primary mb-2"><img src="https://image.flaticon.com/icons/png/128/1160/1160758.png" width="20"></button>
						</a>
						</td>
						<td><a href="index.php?action=usuario&del=' . $value['idPersonas'] . '"><button class="btn btn-primary mb-2"><img src="https://image.flaticon.com/icons/png/128/3496/3496416.png" width="20"></button>
						</a>
						</td>
						</tr>
						';
					}

					?>
				</tbody>
			</table>
			<?php
		}
		?>
		<br><br>
		
	</div>
</div>
<div class="row">

	<div class="col-2">

	</div>
	<div class="col-8">

		<table border="1" class="table table-striped table-dark">
			<thead>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Tipo-Documento</th>
				<th>Numero-Documento</th>
				<th>FechaNacimiento</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
			<tbody>

				<?php
				$ctrl = new UsuarioControlador();
				$ctrl->listarUsuarioControlador();
				?>
			</tbody>
			<tbody>

			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="usuari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="UsuarioControlador.php" method="post">
					<?php
					$editar = new UsuarioControlador();
					$editar->consultarUsuarioIdControlador();
					$editar->actualizarUsuarioControlador();
					?>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>