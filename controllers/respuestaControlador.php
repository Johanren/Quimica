<?php 


class RespuestaControlador {
	
	function cargarRespuestasControlador($id) 	{
		$respuestaModelo = new RespuestaModelo();
		$respuestas = $respuestaModelo->cargarRespuestasModelo($id);
		//print_r($respuestas);
		return $respuestas;
	}


	public function insertarRespuestaControlador($datosRespuesta){
		$respuestaModelo = new RespuestaModelo();
		$respuestaModelo->insertarRespuestasModelo($datosRespuesta);
	}

	function consultarRespuestaControlador($id){
		$consultarRes = new RespuestaModelo();
		$respuestas = $consultarRes->consultarRespuestaModelo($id);
		return $respuestas;
	}

	function eliminarRespuestaControlador(){
		if (isset($_GET['del'])) {
			$dato = $_GET['del'];
			$eliminar = new RespuestaModelo();
			$respuesta = $eliminar-> eliminarRespuestaModelo($dato);
			if ($respuesta == "success") {
				header('location:delRes');
			}
		}
	}

	function ActualizarRespuestasControlador(){
		if (isset($_POST['actvidad'])) {
			foreach ($_POST['idRespuestas'] as $key => $value) {
				$actu = $_POST['idRespuestas'][$key];
				$actuRes = $_POST['editarRes'][$key];
				$actuVerda = $_POST['respuesta'][$key];
				$actuMulti = $_POST['mul'][$key];
				if ($actuVerda != null) {
					$actualizar = new RespuestaModelo();
					$respuestas = $actualizar->ActualizarRespuestasModelo($actu, $actuRes, $actuVerda, $actuMulti);
					if ($respuestas == "success") {
						header('location:oksacac');
					}
				}

			}
			print($respuestas);
		}
	}
}